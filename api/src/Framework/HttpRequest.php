<?php

namespace bgphp15\nameless;

class HttpRequest
{
    private $method;
    private $url;

    public static function fromParameters($method, HttpRequestUrl $url)
    {
        return new self($method, $url);
    }

    public static function fromSuperglobals()
    {
        return new self($_SERVER['REQUEST_METHOD'], HttpRequestUrl::fromSuperglobals());
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
