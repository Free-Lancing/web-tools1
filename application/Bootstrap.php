<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initAutoload() {
        $this->bootstrap('frontcontroller');
        $router = $this->frontController->getRouter();
        $myRoutes = new Zend_Config_Ini(APPLICATION_PATH . '/configs/routing.ini');
        $uri = ltrim($_SERVER["REQUEST_URI"], "/");
        $currentModule = substr($uri, 0, strpos($uri, "/"));
        
        switch ($currentModule) {
            case 'social':
                $myRoutes1 = $myRoutes->social_network;
                break;
            
            case 'login':
                $myRoutes1 = $myRoutes->login;
                break;

            default:
                $myRoutes1 = $myRoutes->error;
                break;
        }
        
        $router->addConfig($myRoutes1, 'routes');
    }
}
