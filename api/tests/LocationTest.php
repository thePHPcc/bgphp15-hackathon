<?php

namespace bgphp15\nameless;

class LocationTest extends \PHPUnit_Framework_TestCase
{
	public function testCanBeCreatedFromCoordinates()
	{
		$location = Location::fromCoordinates(Latitude::fromFloat(0.0), Longitude::fromFloat(0.0));

		$this->assertInstanceOf(Location::class, $location);
	}	
}