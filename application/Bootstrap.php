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
        $loggedIn = false; // This needs to be changed once authentication is done

        if((!empty($myRoutes)) && (!empty($myRoutes->{$uriArray[0]})) && (!empty($myRoutes->{$uriArray[0]}->routes->{$uriArray[1]}))) {
            // routing.ini file found and not empty, current node found, sub node found
            $uriMatched = $this->checkMatchingUri($uri, $myRoutes->{$uriArray[0]}->routes->{$uriArray[1]}->route);

            if($uriMatched) {
                // urls are matching and as per the set up in the routing.ini
                $routes = $myRoutes->{$uriArray[0]};
            }
        }

        /* Use this only if your require to redirect to error if invalid url and redirect to home page if just url specified without any controller or action
         * if(($routes === null) && (!empty($myRoutes)) && (empty($myRoutes->{$uriArray[0]}))) {
            // No controller is specified, hence redirect to default controller
            if($loggedIn) {
                // Set New Request to a new url - Home Page
            } else {
                // Set New Request to a new url - Login page
            }
        }*/

        if(($routes === null)) {
            // Invalid controller
            $routes = new Zend_Config_Ini(APPLICATION_PATH . '/configs/routing.ini', 'default');
        }

        $router->addConfig($routes, 'routes');
    }

    public function checkMatchingUri($uri, $checkUri) {
        // with multiple params /:username/:password & normal without any params
        return (count(array_values(array_filter(explode('/', $checkUri)))) === count(array_values(array_filter(explode('/', $uri)))));
    }

}
