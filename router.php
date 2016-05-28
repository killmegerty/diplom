<?php

class Router {
    private $registry;
    public $controller;
    public $path;

    public function __construct($registry) {
        $this->path = $this->explodePath();
        $path = $this->path;
        //include controller file
        if (file_exists('controllers/Controller_' . $path['controller'] . '.php')) {
            include 'controllers/Controller_' . $path['controller'] . '.php';
            //create instance of controller
            $controllerClassName = 'Controller_' . $path['controller'];
            $this->controller = new $controllerClassName($registry);
            //exec controller method
            if (is_callable(array($this->controller, $path['action'])) == false) {
                die('404 Not Found');
            }
            $this->controller->$path['action']();
        } else {
            die('404 Not Found');
        }
    }

    public function explodePath() {
        $route = (empty($_GET['route'])) ? '' : $_GET['route'];
        if (empty($route)) {
            $route = 'index';
        }
        $route = trim($route, '/\\');
        
        $path = explode('/', $route);

        $controller = (isset($path[0])) ? $path[0] : 'index';
        $action = (isset($path[1])) ? $path[1] : 'index';

        return [
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function viewPath() {
        return 'views/' . $this->path['controller'] . '/' . $this->path['action'] . '.php';
    }

}