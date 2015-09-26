<?php

namespace bgphp15\nameless;

class JsonContainerTrackingNumberTest extends \PHPUnit_Framework_TestCase
{
	public function testCanBeCreatedFromTrackingNumber()
	{
		$number = ContainerTrackingNumber::fromString('test');
		$jsonNumber = JsonContainerTrackingNumber::fromNumber($number);

		$this->assertInstanceOf(JsonContainerTrackingNumber::class, $jsonNumber);

		return $jsonNumber;
	}	

	/**
	 * @depends testCanBeCreatedFromTrackingNumber
	 */
	public function testCanBeFormattedCorrectly(JsonContainerTrackingNumber $jsonNumber)
	{
		$this->assertEquals('{"id":"test"}', $jsonNumber->json());
	}
}
