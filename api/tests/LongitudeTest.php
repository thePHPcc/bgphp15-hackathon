<?php

namespace bgphp15\nameless;

class LongitudeTest extends \PHPUnit_Framework_TestCase
{
	public function testCanBeCreatedFromFloat()
	{
		$longitude = Longitude::fromFloat(0.0);

		$this->assertInstanceOf(Longitude::class, $longitude);
	}	
}