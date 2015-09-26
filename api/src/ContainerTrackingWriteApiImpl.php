<?php

namespace bgphp\nameless;

class ContainerTrackingWriter implements ContainerTrackingWriteApi
{
    public function registerContainer()
    {
        return ContainerTrackingNumber::generate();
    }
}
