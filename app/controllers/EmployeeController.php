<?php

namespace controllers;

class EmployeeController extends ControllerBase
{   
    public function viewShifts($employeeId)
    {
        if ($this->validateGetRequest())
        {
            return "Access Denied: Incorrect method type.";
        }

        
    }

    public function viewFullShift($shiftId)
    {
        if ($this->validateGetRequest())
        {
            return "Access Denied: Incorrect method type.";
        }

        
    }

    public function viewWeekSummary($week)
    {
        if ($this->validateGetRequest())
        {
            return "Access Denied: Incorrect method type.";
        }

           
    }

    public function viewManagerDetailsForShift()
    {
        if ($this->validateGetRequest())
        {
            return "Access Denied: Incorrect method type.";
        }
    }
}