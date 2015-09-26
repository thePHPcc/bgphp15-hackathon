<?php

namespace bgphp15\nameless;

class JsonContainerTrackingNumber
{
    /**
     * @var ContainerTrackingNumber 
     */
    private $number;

    /**
     * @param ContainerTrackingNumber $number
     * @return self
     */
    public static function fromNumber(ContainerTrackingNumber $number)
    {
        return new self($number);
    }
        
    /**
     * @param ContainerTrackingNumber $number
     */
    private function __construct(ContainerTrackingNumber $number)
    {
        $this->number = $number;
    }

    public function json()
    {
        return json_encode(
            [
                "id" => (string) $this->number
            ]
        );  
    }
}
