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
        $url = (isset($_SERVER['HTTPS']) ? 'https' : 'http')
             . '://' . $_SERVER['HTTP_HOST']
             . ($_SERVER['SERVER_PORT'] == '80' ? '' : ':' . $_SERVER['SERVER_PORT'])
             . $_SERVER['REQUEST_URI'];
             
        return new self($url);
    }

    private function __construct($url)
    {
        $this->ensureProtocolIsHttp($url);

        $this->url = $url;
    }

    public function getFirstComponent()
    {
        return $this->getComponent(1);
    }

    public function getSecondComponent()
    {
        return $this->getComponent(2);
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

    private function getComponent($index)
    {
        $parts = parse_url($this->url);
        
        if (!isset($parts['path'])) {
            throw new OutOfBoundsException;
        }
        
        $components = explode('/', $parts['path']);

        if (!isset($components[$index])) {
            throw new OutOfBoundsException;
        }

        return $components[$index];
    }
}
