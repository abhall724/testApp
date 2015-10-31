<?php

namespace controllers;

class ControllerBase
{
    protected $request;

    public function __construct(\lib\Request $request)
    {
        $this->request = $request;
    }

    public function validatePostRequest()
    {
        return ($this->request->getMethodType() != 'POST' || $this->request->getMethodType() != 'PUT');
    }

    public function validateGetRequest()
    {
        return ($this->request->getMethodType() != 'GET');
    }
}