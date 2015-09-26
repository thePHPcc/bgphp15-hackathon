<?php

namespace bgphp15\nameless;

class ApiTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Api
     */
    private $api;

    private $reader;

    private $writer;

    protected function setUp()
    {
        $this->reader = $this->getMock(ContainerTrackingReadApi::class);
        $this->writer = $this->getMock(ContainerTrackingWriteApi::class);

        $this->api = new Api($this->reader, $this->writer);
    }

    public function testHandlesPostRequestToRegisterContainer()
    {
        $request = $this->getMockBuilder(HttpRequest::class)->disableOriginalConstructor()->getMock();
        $requestUrl = $this->getMockBuilder(HttpRequestUrl::class)->disableOriginalConstructor()->getMock();

        $requestUrl->method('getFirstComponent')->willReturn('containers');

        $request->method('isPost')->willReturn(true);
        $request->method('getUrl')->willReturn($requestUrl);

        $this->writer->expects($this->once())->method('registerContainer');

        $result = $this->api->handle($request);
    }

    public function testHandlesGetRequestToLocateContainer()
    {
        $request = $this->getMockBuilder(HttpRequest::class)->disableOriginalConstructor()->getMock();
        $requestUrl = $this->getMockBuilder(HttpRequestUrl::class)->disableOriginalConstructor()->getMock();

        $requestUrl->method('getFirstComponent')->willReturn('containers');
        $requestUrl->method('getSecondComponent')->willReturn('the-tracking-number');

        $request->method('isGet')->willReturn(true);
        $request->method('getUrl')->willReturn($requestUrl);

        $trackingNumber = ContainerTrackingNumber::fromString('the-tracking-number');
        $location = $this->getMockBuilder(Location::class)->disableOriginalConstructor()->getMock();

        $this->reader->expects($this->once())->method('locateContainer')->with($trackingNumber)->willReturn($location);

        $result = $this->api->handle($request);
    }
}
