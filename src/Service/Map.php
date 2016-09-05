<?php

namespace Service;


use Object\Unit\Base;

class Map
{
    protected $_width  = 100;

    protected $_height = 100;

    protected $_data;

    public function __construct()
    {
        //$this->_data = $data;
    }

    /**
     * Returns map height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->_height;
    }

    /**
     * Returns map width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->_width;
    }

    /**
     * Check is unit on map
     *
     * @param Base $unit
     *
     * @return bool
     */
    public function isUnitOnMap(Base $unit)
    {
        //$this->_data->execute();
        return $this->_width > $unit->getLeftOffset() && $this->_height > $unit->getTopOffset();
    }
}