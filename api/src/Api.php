<?php

namespace bgphp15\nameless;

class Api
{
    /**
     * @var ContainerTrackingReadApi
     */
    private $reader;

    /**
     * @var ContainerTrackingWriteApi
     */
    private $writer;

    /**
     * @param ContainerTrackingReadApi  $reader
     * @param ContainerTrackingWriteApi $writer
     */
    public function __construct(ContainerTrackingReadApi $reader, ContainerTrackingWriteApi $writer)
    {
        $this->reader = $reader;
        $this->writer = $writer;
    }

    /**
     * @param HttpRequest $request
     */
    public function handle(HttpRequest $request)
    {
        if ($request->isPost() && $request->getUrl()->getFirstComponent() == 'containers') {
            return $this->writer->registerContainer();
        }

        if ($request->isGet() && $request->getUrl()->getFirstComponent() == 'containers') {

            $location = $this->reader->locateContainer(
                    ContainerTrackingNumber::fromString($request->getUrl()->getSecondComponent())
            );

            $jsonLocation = JsonLocation::fromLocation($location);
            return $jsonLocation->json();
        }
    }
}
