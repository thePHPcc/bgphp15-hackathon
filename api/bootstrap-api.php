<?php

namespace bgphp15\nameless;

require __DIR__ . '/src/autoload.php';

header('Content-type: application/json; charset=utf-8');
$api = new Api(new ContainerTrackingReader, new ContainerTrackingWriter);
$api->handle(HttpRequest::fromSuperglobals());
