<?php

namespace bgphp\nameless;

class ContainerTrackingWriterTest extends \PHPUnit_Framework_TestCase
{
    public function testContainerCanBeCreated()
    {
        $tracker = new ContainerTrackingWriter;

        $this->assertInstanceOf(ContainerTrackingNumber::class, $tracker->registerContainer());
    }
}
