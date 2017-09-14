<?php
    class Router {
       private $_routes;

       public function __construct() {
           $routesPath = ROOT.'/configuration/routes.php';
           $this->_routes = include($routesPath);
       }

       private function getURI() {
           $uri = NULL;
           if (!empty($_SERVER['REQUEST_URI'])) {
               $uri = trim($_SERVER['REQUEST_URI'], '/');
           }
           return ($uri);
       }

       public function runRouter() {
          $uri = $this->getURI();

          if ($uri != NULL) {
              foreach ($this->_routes as $uriPattern => $path) {
                  if (preg_match("~$uriPattern~", $uri)) {
                      $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                      $segment = explode('/', $internalRoute);
                      $controllerName = array_shift($segment) . 'Controller';
                      $actionName = 'action' . ucfirst(array_shift($segment));
                      $parameters = $segment;
                      $controllerFile = ROOT . '/controllers/' . $controllerName . '.class.php';

                      if (file_exists($controllerFile)) {
                          include_once($controllerFile);
                      }

                      $controllerObject = new $controllerName;

                      $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                      if ($result != NULL) {
                          break;
                      }
                  }
              }
          }
       }
    }
