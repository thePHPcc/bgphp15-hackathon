<?php

namespace bgphp15\nameless;

class ContainerTrackingReader implements ContainerTrackingReadApi
{
    public function locateContainer(ContainerTrackingNumber $containerTrackingNumber)
    {
        return Location::fromCoordinates(Latitude::fromFloat(10.0), Longitude::fromFloat(10.0));
    }
}
