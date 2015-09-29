<?php

namespace bgphp15\nameless;

require __DIR__ . '/../src/autoload.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT, GET, POST, PATCH, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept');

header('Content-type: application/json; charset=utf-8');
$api = new Api(new ContainerTrackingReader, new ContainerTrackingWriter);
echo $api->handle(HttpRequest::fromSuperglobals());
