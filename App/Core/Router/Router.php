<?php
namespace App\Core\Router;

use App\Core\Helpers\Helper;

class Router
{
    public $controller;

    public $method;

    public $args = [];

    public $request_type;

    public $routes = [];

    public $route;

    /**
     * Initiates whole router
     * Router constructor.
     * @param $routes
     */
    public function __construct()
    {
        $this->checkRequestType($_SERVER['REQUEST_METHOD']);

        $this->setRoute();

        $this->executeRoute();
    }

    /**
     * Check current request for its type
     * @param $server
     * @throws \Exception
     */
    public function checkRequestType($server) {

        switch($server)
        {
            case 'GET':
                $this->request_type = 'GET'; break;
            case 'POST':
                $this->request_type = 'POST'; break;
            case 'PUT':
                $this->request_type = 'PUT'; break;
            case 'DELETE':
                $this->request_type = 'DELETE'; break;
            default: throw new \Exception('Invalid request type');
        };
    }

    /**
     * Sets currently requested route
     * @throws \Exception
     */
    public function setRoute() {
        $address = $_SERVER['REQUEST_URI'];
        
        $this->determineControllerAndMethod($address);

        $this->determineArguments($address);
    }

    /**
     * Returns object from requested route
     * @return mixed
     */
    public function executeRoute() {
        
        $className = $this->controller;
        $methodName = $this->method;
        
        $instance = new $className;
        
        $fullClassInstanceWithMethod = $instance->$methodName($this->args);

        return $fullClassInstanceWithMethod;
    }

    /**
     * Set current request controller and method
     * @param $address
     */
    public function determineControllerAndMethod($address) {
        $controller = $_GET['c'];
        
        $this->controller = 'App\\Controller\\'.$controller;
            
        $this->method = $_GET['m'];
    }

    /**
     * Set current request arguments
     * @param $address
     */
    public function determineArguments($address) {
        $explodedAddress = explode('?',$address);
        
        $explodedParams = explode('&',$explodedAddress[1]);

        $arguments = array_slice($explodedParams,2);

        foreach($arguments as $data) {
            $this->args[] .= substr($data, strpos($data, "=") + 1);
        }
    }
}

