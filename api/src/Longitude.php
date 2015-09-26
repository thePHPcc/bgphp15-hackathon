<?php

namespace bgphp15\nameless;

/**
* Value object for latitude.
*/
class Longitude 
{
    /**
     * @var float
     */
    private $longitude;

    /**
     * @param  float $longitude
     * @return self
     * @throws InvalidArgumentException
     * @throws OutOfBoundsException
     */
    public static function fromFloat($longitude)
    {
        if (!is_float($longitude)) {
            throw new InvalidArgumentException();
        }

        if ($longitude < -180 || $longitude > 180) {
            throw new OutOfBoundsException();
        }

        return new self($longitude);
    }
        
    /**
     * @param float $longitude
     */
    private function __construct($longitude)
    {
        $this->longitude = $longitude;
    }
}
