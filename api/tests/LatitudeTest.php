<?php

namespace bgphp15\nameless;

class LatitudeTest extends \PHPUnit_Framework_TestCase
{
	public function testCanBeCreatedFromFloat()
	{
		$latitude = Latitude::fromFloat(0.0);

		$this->assertInstanceOf(Latitude::class, $latitude);
	}	

	/**
	 * @expectedException Exception
	 * @dataProvider invalidCoordinates
	 */
	public function testCannotBeCreatedFromInvalidArguments($latitude)
	{
		Latitude::fromFloat($latitude);
	}

	public function invalidCoordinates()
	{
		return [
			[null],
			[-91]
		];	
	}
}