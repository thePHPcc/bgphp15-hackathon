<?php

namespace bgphp\nameless;

class ContainerTrackingWriterTest extends \PHPUnit_Framework_TestCase
{
    public function testContainerRegistrationAssignsTrackingNumber()
    {
        $tracker = new ContainerTrackingWriter;

        $this->assertInstanceOf(ContainerTrackingNumber::class, $tracker->registerContainer());
    }
}
