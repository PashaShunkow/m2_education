<?php

trait DataStorage
{
    use AlterStorage;
    protected $_data = [];

    public function setData($key, $value)
    {
        $this->_data[$key] = $value;
        return $this;
    }

    public function getData($key)
    {
        if (isset($this->_data[$key])) {
            return $this->_data[$key];
        }

        return sprintf('No data in storage for "%s" key', $key);
    }
}

trait AlterStorage
{

    public function setData2($key, $value)
    {
        $this->_data[$key] = $value;
        return $this;
    }
}

class User
{
    use DataStorage;

/*    public function getData($key)
    {
        return $key;
    }*/
}

class Customer extends User
{

/*    public function getData($key)
    {
        return 'Customer ' . $key;
    }*/
}

/**
 * 1 - Child class / Wrapper trait
 * 2 - Trait
 * 3 - Parent class
 */

$custumer = new Customer();
$custumer->setData('TEst', 'we');
echo $custumer->getData('TEst');