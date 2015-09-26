<?php

namespace bgphp15\nameless;

class ContainerTrackingNumberTest extends \PHPUnit_Framework_TestCase
{
    public function testCanBeCreatedFromString()
    {
        $id = 'the-container-id';
        $containerId = ContainerTrackingNumber::fromString($id);
        $this->assertInstanceOf(ContainerTrackingNumber::class, $containerId);
    }

    public function testCanBeGenerated()
    {
        $containerId = ContainerTrackingNumber::generate();
        $this->assertNotNull((string) $containerId);
    }

    public function testCanBeConvertedToString()
    {
        $id = 'the-container-id';
        $containerId = ContainerTrackingNumber::fromString($id);
        $this->assertEquals($id, (string) $containerId);
    }

    /**
     * @expectedException \bgphp15\nameless\InvalidArgumentException
     */
    public function testCannotBeCreatedFromEmptyString()
    {
        ContainerTrackingNumber::fromString('');
    }
}
