<?php

namespace Object\Unit;

use Service\Map;
use Service\ServiceLocator;

class Marine extends Base
{
    protected $_leftOffset = 10;

    protected $_topOffset  = 15;
    /**
     * @var string
     */
    protected $_weaponType;

    /**
     * Returns unit type
     *
     * @return string
     */
    public function getType()
    {
        return 'marine';
    }

    /**
     * Returns weapon type
     *
     * @return string
     */
    public function getWeaponType()
    {
        return $this->_weaponType;
    }

    /**
     * Returns power value
     *
     * @param string $type Weapon type
     *
     * @return $this
     */
    public function setWeaponType($type)
    {
        $this->_weaponType = $type;
        return $this;
    }

    /**
     * Calculate marine damage
     *
     * @return int
     */
    public function calculateDamage()
    {
        return strlen($this->getWeaponType()) * 2;
    }

    /**
     * Check is unit on map
     *
     * @return bool
     */
    public function isOnMap()
    {
        /** @var $map Map */
        $map = ServiceLocator::getService('battle_map');
        return $map->isUnitOnMap($this);
    }
}