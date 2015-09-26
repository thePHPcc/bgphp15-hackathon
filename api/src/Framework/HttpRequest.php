<?php

namespace bgphp15\nameless;

class HttpRequest
{
    public static function fromParameters(RequestUrl $url)
    {
        return self($url);
    }
}

