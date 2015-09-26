<?php

namespace bgphp15\nameless;

class ApiTest extends \PHPUnit_Framework_TestCase
{
    public function testHandlesPostRequestToRegisterContainer()
    {
        $reader = $this->getMock(ContainerTrackingReadApi::class);
        $writer = $this->getMock(ContainerTrackingWriteApi::class);

        $request = $this->getMockBuilder(HttpRequest::class)->disableOriginalConstructor()->getMock();
        $requestUrl = $this->getMockBuilder(HttpRequestUrl::class)->disableOriginalConstructor()->getMock();

        $requestUrl->method('getFirstComponent')->willReturn('container');

        $request->method('isPost')->willReturn(true);
        $request->method('getUrl')->willReturn($requestUrl);

        $writer->expects($this->once())->method('registerContainer');

        $api = new Api($reader, $writer);
        $result = $api->handle($request);
    }
}
