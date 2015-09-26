<?php

namespace bgphp15\nameless;

class HttpRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testUrlCanBeRetrieved()
    {
        $url = $this->getMockBuilder(HttpRequestUrl::class)->disableOriginalConstructor()->getMock();

        $request = HttpRequest::fromParameters('POST', $url);

        $this->assertEquals($url, $request->getUrl());
    }

    public function testGetRequestIsGetRequest()
    {
        $url = $this->getMockBuilder(HttpRequestUrl::class)->disableOriginalConstructor()->getMock();

        $request = HttpRequest::fromParameters('GET', $url);

        $this->assertTrue($request->isGet());
    }

    public function testPostRequestIsNoGetRequest()
    {
        $url = $this->getMockBuilder(HttpRequestUrl::class)->disableOriginalConstructor()->getMock();

        $request = HttpRequest::fromParameters('POST', $url);

        $this->assertFalse($request->isGet());
    }
}
