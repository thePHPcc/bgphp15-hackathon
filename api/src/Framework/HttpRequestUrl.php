<?php

namespace bgphp15\nameless;

class HttpRequestUrl
{
    private $url;

    public static function fromString($url)
    {
        return new self($url);
    }

    public static function fromSuperglobals()
    {
        return new self('lazy developer @todo');
    }

    private function __construct($url)
    {
        $this->ensureProtocolIsHttp($url);

        $this->url = $url;
    }

    public function firstComponent()
    {
        $parts = parse_url($this->url);
        $components = explode('/', $parts['path']);

        if (!isset($components[1])) {
            throw new OutOfBoundsException;
        }

        return $components[1];
    }

    public function __toString()
    {
        return (string) $this->url;
    }

    private function ensureProtocolIsHttp($url)
    {
        if (parse_url($url, \PHP_URL_SCHEME) != 'http') {
            throw new InvalidArgumentException;
        }
    }
}
