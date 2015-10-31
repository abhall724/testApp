<?php

namespace lib;

class Request
{
    private $urlElements = array();
    private $method;
    private $parameters;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->urlElements = explode('/', $_SERVER['PATH_INFO']);
        $this->parseParams();
    }

    public function getMethodType()
    {
        return $this->method;
    }

    public function isFullUrl()
    {
        return (count($this->urlElements) > 2);
    }

    public function getMethodName()
    {
        if ($this->isFullUrl()) {
            return $this->urlElements[2];
        }
        else {
            return $this->urlElements[1];
        }
    }

    public function getUrlElements()
    {
        return $this->urlElements;
    }

    public function getParm($key)
    {
        if ($this->method == 'POST' && isset($_POST[$key])) {
            return $_POST[$key];
        } elseif (isset($_GET[$key])) {
            return $_GET[$key];
        }

        return false;
    }
}