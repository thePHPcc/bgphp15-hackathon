<?php

namespace bgphp15\nameless;

class ContainerTrackingNumber
{
    /**
     * @var string
     */
    private $id;

    /**
     * @return ContainerTrackingNumber
     */
    public static function generate()
    {
        return new self(self::generateTrackingNumber());
    }

    /**
     * @param string $trackingNumber
     *
     * @return ContainerTrackingNumber
     */
    public static function fromString($trackingNumber)
    {
        return new self($trackingNumber);
    }

    /**
     * @return string
     */
    private static function generateTrackingNumber()
    {
        return uniqid('tracking_', true);
    }

    /**
     * @param string $trackingNumber
     */
    private function __construct($trackingNumber)
    {
        $this->ensureTrackingNumberIsNotEmpty($trackingNumber);

        $this->id = $trackingNumber;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->id;
    }

    private function ensureTrackingNumberIsNotEmpty($trackingNumber)
    {
        if ($trackingNumber == '') {
            throw new InvalidArgumentException();
        }
    }
}
