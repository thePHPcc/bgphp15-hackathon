<?php

namespace bgphp15\nameless;

interface ContainerTrackingReadApi
{
    /**
     * @param ContainerTrackingNumber $id
     *
     * @return Location
     */
    public function locateContainer(ContainerTrackingNumber $id);
}
