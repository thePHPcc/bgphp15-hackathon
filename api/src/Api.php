<?php

namespace bgphp15\nameless;

class Api
{
    public function process(HttpRequest $request)
    {
        if ($request->isPost() && $request->getUrl()->firstComponent() == 'container') {
            return $this->handleRegisterContainer();
        }

        if ($request->isGet() && $request->getUrl()->firstComponent() == 'container') {
            return $this->handleLocateContainer($request->getParameter('latitude') && $request->getParameter('long @todo'));
        }

    }
}
