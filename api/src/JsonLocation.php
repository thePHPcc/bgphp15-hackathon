<?php

namespace bgphp15\nameless;

class JsonLocation
{
    /**
     * @var Location 
     */
    private $location;

    /**
     * @param  Location $location
     * @return self
     */
    public static function fromLocation(Location $location)
    {
        return new self($location);
    }
        
    /**
     * @param Location $location
     */
    private function __construct(Location $location)
    {
        $this->location = $location;
    }

    public function json()
    {
        return json_encode(
            [
                "latitude" => $this->location->latitude()->asFloat(),
                "longitude" => $this->location->longitude()->asFloat()
            ]
        );  
    }
}
