<?php

namespace bgphp\nameless;

interface ContainerTrackingReadApi
{
    /**
     * @param ContainerTrackingNumber $id
     *
     * @return GpsCoordinates
     */
    public function findContainer(ContainerTrackingNumber $id);
}
