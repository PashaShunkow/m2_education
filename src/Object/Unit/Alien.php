<?php

namespace Object\Unit;

use Service\Connector;
use Service\Map;
use Service\Test;

class Alien extends Base
{
    /**
     * @var int
     */
    protected $_power;

    /**
     * @var \PDOStatement
     */
    protected $_insertStatement;

    protected $_battleMap;

    protected $_test;

    protected $_leftOffset = 30;

    protected $_topOffset  = 20;

    /**
     * @var \PDOStatement
     */
    protected $_deleteStatement;

    public function __construct(Map $battleMap, Test $test, $name)
    {
        $this->_battleMap       = $battleMap;
        $this->_test            = $test;
        $this->_insertStatement = $this->getConnection()->prepare('INSERT INTO alien (`health2`,`power`) VALUES (?, ?)');
        $this->_deleteStatement = $this->getConnection()->prepare('DELETE FROM alien WHERE id = ?');
    }

    /**
     * Check is unit on map
     *
     * @return bool
     */
    public function isOnMap()
    {
        return $this->_battleMap->isUnitOnMap($this);
    }

    /**
     * Returns unit type
     *
     * @return string
     */
    public function getType()
    {
        return 'alien';
    }

    /**
     * Returns alien power
     *
     * @return int
     */
    public function getPower()
    {
        return $this->_power;
    }

    /**
     * Returns power value
     *
     * @param int $power Physical power
     *
     * @return $this
     */
    public function setPower($power)
    {
        $this->_power = $power;
        return $this;
    }

    /**
     * Calculate alien damage
     *
     * @return int
     */
    public function calculateDamage()
    {
        return $this->getPower() * 2;
    }

    /**
     * Returns connection object
     *
     * @return \PDO
     */
    public function getConnection()
    {
        return Connector::getInstance()->getConnection();
    }

    /**
     * Save alien object data
     *
     * @return $this
     */
    public function save()
    {
        $this->_insertStatement->execute([$this->getHealth(), $this->getPower()]);
        $this->setId($this->getConnection()->lastInsertId());
        return $this;
    }

    /**
     * Delete alien object data
     *
     * @return void
     */
    public function delete()
    {
        $this->_deleteStatement->execute([$this->getId()]);
    }

    public function useTest()
    {
        $this->_test->sayHello();
    }
}