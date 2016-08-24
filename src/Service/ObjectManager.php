<?php

namespace Service;

class ObjectManager extends Singleton
{
    /**
     * @var Singleton|null
     */
     static protected $_instance;

    /**
     * Returns requested object
     *
     * @param string $objectClassName Object class name
     *
     * @return object
     */
    public function createObject($objectClassName)
    {
        $args      = [];
        $reflected = new \ReflectionClass($objectClassName);
        if($reflected->getConstructor()){
            $parameters = $reflected->getConstructor()->getParameters();
            foreach ($parameters as $parameter) {
                if ($parameter->getType()) {
                    $args[] = $parameter->getType()->__toString();
                }
            }
            foreach ($args as $key => $className) {
                $args[$key] = $this->createObject($className);
            }
        }
        return $reflected->newInstanceArgs($args);
    }
}