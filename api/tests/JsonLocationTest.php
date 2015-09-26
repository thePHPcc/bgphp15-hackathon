<?php

namespace bgphp15\nameless;

class JsonLocationTest extends \PHPUnit_Framework_TestCase
{
	public function testCanBeCreatedFromLocation()
	{
		$location = Location::fromCoordinates(Latitude::fromFloat(10.0), Longitude::fromFloat(10.0));
		$jsonLocation = JsonLocation::fromLocation($location);

		$this->assertInstanceOf(JsonLocation::class, $jsonLocation);

		return $jsonLocation;
	}	

	/**
	 * @depends testCanBeCreatedFromLocation
	 */
	public function testCanBeFormattedCorrectly(JsonLocation $jsonLocation)
	{
		$this->assertEquals('{"latitude":10,"longitude":10}', $jsonLocation->json());
	}
}
