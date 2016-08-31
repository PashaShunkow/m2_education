<?php

class Collection implements Iterator
{
    protected $_items = [1,2,3,4];

    protected $_position = 0;

    public function __construct() {
        $this->_position = 0;
    }

    function rewind() {
        $this->_position = 0;
    }

    function current() {
        return $this->_items[$this->_position];
    }

    function key() {
        return $this->_position;
    }

    function next() {
        ++$this->_position;
    }

    function valid() {
        return isset($this->_items[$this->_position]);
    }
}
