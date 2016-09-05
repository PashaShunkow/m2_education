<?php

class User
{
    protected $_name    = '';

    protected $_age     = 0;

    protected $_account = null;

    protected $_address = null;

    public function __construct(BankAccount $account, BillingAddress $address)
    {
        $this->_account = $account;
        $this->_address = $address;
    }

    public function getName()
    {

        return $this->_name;
    }

    public function getAge()
    {
        return $this->_age;
    }

    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }

    public function setAge($age)
    {
        $this->_age = $age;
        return $this;
    }

    public function getAccountNumber()
    {
        return $this->_account->getAccountNumber();
    }
}

class BankAccount
{
    public function getAccountNumber()
    {
        return '123456';
    }
}

class BillingAddress
{
    public function getStreet()
    {
        return 'Street 1';
    }
}

$reflection = new ReflectionClass('User');

var_dump($reflection->getName());

var_dump($reflection->getConstructor());

var_dump($reflection->getFileName());



$args = array();

foreach ($reflection->getConstructor()->getParameters() as $parameter)
{
    if($parameter->getType())
    {
        $args[] = $parameter->getType()->__toString();
    }
}

foreach ($args as $key => $className)
{
    $args[$key] = new $className();
}

$object = $reflection->newInstanceArgs($args);

var_dump($object);