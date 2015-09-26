<?php

namespace bgphp15\nameless;

/**
* Value object for coordinates.
*/
class Location
{
    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @param  float $latitude
     * @param  float $longitude
     * @return self
     * @throws InvalidArgumentException
     * @throws OutOfBoundsException
     */
    public static function fromCoordinates($latitude, $longitude)
    {
        if (!is_float($latitude) || !is_float($longitude)) {
            throw new InvalidArgumentException();
        }

        if ($latitude < -90 || $latitude > 90) {
            throw new OutOfBoundsException();
        }

        if ($longitude < -180 || $longitude > 180) {
            throw new OutOfBoundsException();
        }

        return new self($latitude, $longitude);
    }
        
    /**
     * @param float $latitude
     * @param float $longitude
     */
    private function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
}
