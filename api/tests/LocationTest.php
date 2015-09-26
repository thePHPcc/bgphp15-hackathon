<?php

namespace bgphp15\nameless;

class LocationTest extends \PHPUnit_Framework_TestCase
{
	public function testCanBeCreatedFromCoordinates()
	{
		$location = Location::fromCoordinates(0.0, 0.0);

		$this->assertInstanceOf(Location::class, $location);
	}	

	/**
	 * @expectedException Exception
	 * @dataProvider invalidCoordinates
	 */
	public function testCannotBeCreatedFromInvalidArguments($latitude, $longitude)
	{
		Location::fromCoordinates($latitude, $longitude);
	}

	public function invalidCoordinates()
	{
		return [
			[null, null],
			[-91, 0],
			[0, -181]
		];	
	}
}