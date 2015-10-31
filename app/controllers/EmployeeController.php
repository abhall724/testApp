<?php

namespace controllers;

class EmployeeController extends ControllerBase
{   
    public function viewShiftsForWeek()
    {
        if ($this->validateGetRequest())
        {
            return "Access Denied: Incorrect method type.";
        }

        
    }

    private function viewShiftsForWeeksFullUrl()
    {
        
    }

    public function viewWeekSummary()
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