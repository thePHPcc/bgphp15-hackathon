<?php

namespace bgphp15\nameless;

interface ContainerTrackingWriteApi
{
    /**
     * @return ContainerTrackingNumber
     */
    public function registerContainer();
}
