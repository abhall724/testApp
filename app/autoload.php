<?php

function autoload($className = '')
{
    if (strpos($className, '\\') !== false) {
        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        if (file_exists($className.'.php')) {
            require_once($className.'.php');
            return;
        }
    }
}

spl_autoload_register('autoload');
