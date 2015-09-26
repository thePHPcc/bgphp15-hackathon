<?php

namespace bgphp\nameless;

interface ContainerTrackingWriteApi
{
    /**
     * @return ContainerTrackingNumber
     */
    public function registerContainer();
}
