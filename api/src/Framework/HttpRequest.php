<?php

namespace bgphp15\nameless;

class HttpRequest
{
    private $method;
    private $url;

    public static function fromParameters($method, HttpRequestUrl $url)
    {
        return self($method, $url);
    }

    private function __construct($type, HttpRequestUrl $url)
    {
        $this->ensureMethodIsSupported($type);

        $this->method = $type;
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function isPost()
    {
        return $this->method === 'POST';
    }

    public function isGet()
    {
        return $this->method === 'GET';
    }

    private function ensureMethodIsSupported($method)
    {
        if ($method != 'POST' && $method != 'GET') {
            throw new OutOfBoundsException;
        }
    }
}
