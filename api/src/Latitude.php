<?php

namespace bgphp15\nameless;

/**
* Value object for latitude.
*/
class Latitude 
{
    /**
     * @var float
     */
    private $latitude;

    /**
     * @param  float $latitude
     * @return self
     * @throws InvalidArgumentException
     * @throws OutOfBoundsException
     */
    public static function fromFloat($latitude)
    {
        if (!is_float($latitude)) {
            throw new InvalidArgumentException();
        }

        if ($latitude < -90 || $latitude > 90) {
            throw new OutOfBoundsException();
        }

        return new self($latitude);
    }
        
    /**
     * @param float $latitude
     */
    private function __construct($longitude)
    {
        $this->latitude = $latitude;
    }
}
