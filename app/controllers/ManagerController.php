<?php

namespace controllers;

class ManagerController extends ControllerBase
{
    public function createShift()
    {
        if ($this->validatePostRequest())
        {
            return "Access Denied: Incorrect method type.";
        }
    }

    public function updateShift()
    {
        if ($this->validatePostRequest())
        {
            return "Access Denied: Incorrect method type.";
        }
    }

    public function viewShifts()
    {
        if ($this->validateGetRequest())
        {
            return "Access Denied: Incorrect method type.";
        }
    }

    public function assignEmployeeToShift()
    {
        if ($this->validatePostRequest())
        {
            return "Access Denied: Incorrect method type.";
        }
    }

    public function viewEmployeeDetails()
    {
        if ($this->validateGetRequest())
        {
            return "Access Denied: Incorrect method type.";
        }
    }
}