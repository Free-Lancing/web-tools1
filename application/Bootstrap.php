<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initAutoload() {
        $this->bootstrap('frontcontroller');
        $router = $this->frontController->getRouter();
        
        $uri = ltrim($_SERVER["REQUEST_URI"], "/");
        $uriArray = explode('/', $uri);
        $routes = null;
        $uriMatched = false;
        $myRoutes = new Zend_Config_Ini(APPLICATION_PATH . '/configs/routing.ini');

        if ((!empty($myRoutes)) && (!empty($myRoutes->{$uriArray[0]})) && (!empty($myRoutes->{$uriArray[0]}->routes->{$uriArray[1]}))) {
            // routing.ini file found and not empty, current node found, sub node found
            $uriMatched = $this->checkMatchingUri($uri, $myRoutes->{$uriArray[0]}->routes->{$uriArray[1]}->route);

            if ($uriMatched) {
                // urls are matching and as per the set up in the routing.ini
                $routes = $myRoutes->{$uriArray[0]};
            }
        }

        if ($routes === null) {
            $routes = new Zend_Config_Ini(APPLICATION_PATH . '/configs/routing.ini', 'error');
        }

        $router->addConfig($routes, 'routes');
    }

    public function checkMatchingUri($uri, $checkUri) {
        // with multiple params /:username/:password & normal without any params
        return (count(array_values(array_filter(explode('/', $checkUri)))) === count(array_values(array_filter(explode('/', $uri)))));
    }

}
