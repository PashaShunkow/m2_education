<?php

namespace Service\Factory;

use Service\ObjectManager;

class Alien extends Base
{
    /**
     * Create alien unit
     *
     * @return \Object\Unit\Alien
     */
    public function create()
    {
        $alien = ObjectManager::getInstance()->createObject('Object\Unit\Alien');
        $alien->setHealth(65);
        $alien->setPower(rand(1, 10));
        return $alien;
    }
}