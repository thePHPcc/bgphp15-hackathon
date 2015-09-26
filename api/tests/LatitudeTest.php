<?php

namespace bgphp15\nameless;

class LatitudeTest extends \PHPUnit_Framework_TestCase
{
	public function testCanBeCreatedFromFloat()
	{
		$latitude = Latitude::fromFloat(0.0);

		$this->assertInstanceOf(Latitude::class, $latitude);
	}	
}