<?php

namespace bgphp15\nameless;

class HttpRequestUrlTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \bgphp15\nameless\InvalidArgumentException
     */
    public function testCannotBeCreatedForNonHttpUrl()
    {
        HttpRequestUrl::fromString('ftp://example.com');
    }

    public function testFirstComponentCanBeRetrieved()
    {
        $url = HttpRequestUrl::fromString('http://example.com/first/component');

        $this->assertEquals('first', $url->getFirstComponent());
    }

    public function testSecondComponentCanBeRetrieved()
    {
        $url = HttpRequestUrl::fromString('http://example.com/first/component');

        $this->assertEquals('component', $url->getSecondComponent());
    }

    /**
     * @expectedException \bgphp15\nameless\OutOfBoundsException
     */
    public function testComponentCannotBeRetrievedWhenNoPath()
    {
        $url = HttpRequestUrl::fromString('http://example.com');

        $url->getFirstComponent();
    }
    
    /**
     * @expectedException \bgphp15\nameless\OutOfBoundsException
     */
    public function testNonExistingComponentCannotBeRetrieved()
    {
        $url = HttpRequestUrl::fromString('http://example.com/first');

        $url->getSecondComponent();
    }
}
