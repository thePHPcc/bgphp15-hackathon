<?php

namespace bgphp15\nameless;

class ContainerTrackingReaderTest extends \PHPUnit_Framework_TestCase
{
    public function testLocationCanBeRetrieved()
    {
        $trackingNumber = ContainerTrackingNumber::generate();
        $tracker = new ContainerTrackingReader;

        $this->assertInstanceOf(Location::class, $tracker->locateContainer($trackingNumber));
    }
}
