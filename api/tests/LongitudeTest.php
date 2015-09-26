<?php

namespace bgphp15\nameless;

class LongitudeTest extends \PHPUnit_Framework_TestCase
{
	public function testCanBeCreatedFromFloat()
	{
		$longitude = Longitude::fromFloat(0.0);

		$this->assertInstanceOf(Longitude::class, $longitude);
	}	

	/**
	 * @expectedException Exception
	 * @dataProvider invalidCoordinates
	 */
	public function testCannotBeCreatedFromInvalidArguments($longitude)
	{
		Longitude::fromFloat($longitude);
	}

	public function invalidCoordinates()
	{
		return [
			[null],
			[-181]
		];	
	}
}