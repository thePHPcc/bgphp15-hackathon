<?php

namespace bgphp15\nameless;

/**
* Value object for coordinates.
*/
class Location
{
    /**
     * @var Latitude
     */
    private $latitude;

    /**
     * @var Longitude
     */
    private $longitude;

    /**
     * @param  Latitude $latitude
     * @param  Longitude $longitude
     * @return self
     * @throws InvalidArgumentException
     * @throws OutOfBoundsException
     */
    public static function fromCoordinates(Latitude $latitude, Longitude $longitude)
    {
        return new self($latitude, $longitude);
    }
        
    /**
     * @param Latitude $latitude
     * @param Longitude $longitude
     */
    private function __construct(Latitude $latitude, Longitude $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
}
