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
        $parameters = $this->request->getUrlElements();
        
        if (count($parameters) < 2) {
            if ($parameters[2] == 'shift') {
                $controller->viewFullShift($parameters[3]);
            }
            else {
                $controller->viewWeekSummary($parameters[4]);
            }
        }
        else {
            return $controller->viewShifts($parameters[1]);
        }
    }

    private function routeManagerCall()
    {
        
    }
}