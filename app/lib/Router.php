<?php

class Router
{
    private $request;
    
    public function __construct(\lib\Request $request)
    {
        $this->request = $request;
    }

    public function start()
    {
        switch($this->request[0]) {
            case "employee":
                $this->routeEmployeeCall();
                break;
            case "manager":
                $this->routeManagerCall();
                break;
            default:
                $this->returnError();
                break;
        }
    }

    private function returnError()
    {
        return "Error: Undefined method";
    }

    private function routeEmployeeCall()
    {
        $controller = new \controllers\EmployeeController($this->request);
         $this->request->getUrlElements();
        
        if (method_exists($controller, $method))
        {
            
        }
    }

    private function routeManagerCall()
    {
        
    }
}