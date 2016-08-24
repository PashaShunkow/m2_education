<?php

namespace Service;

class ServiceLocator extends \Service\Singleton
{
    static protected $_services = [];

    /**
     * @var Singleton|null
     */
    static protected $_instance;

    static public function declareService($name, $service)
    {
        if(!isset(self::$_services[$name]))
        {
            self::$_services[$name] = $service;
        } else {
            die('Error: service already exists');
        }
    }

    static public function getService($name)
    {
        if(isset(self::$_services[$name]))
        {
            return self::$_services[$name];
        } else {
            die('Error: service not exists');
        }
    }
}