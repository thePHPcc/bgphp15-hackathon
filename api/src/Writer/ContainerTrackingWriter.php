<?php

namespace bgphp15\nameless;

class ContainerTrackingWriter implements ContainerTrackingWriteApi
{
    public function registerContainer()
    {
        return ContainerTrackingNumber::generate();
    }
}
