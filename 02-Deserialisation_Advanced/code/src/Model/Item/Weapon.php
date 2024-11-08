<?php

namespace Application\Shareplay\Model\Item;

class Weapon extends Item
{
    public $damage = 1;
    public $affixes;
    public $suffixes;
    public function __construct($name, $value){
        parent::__construct($name, $value);
    }

    public function _getValue()
    {
        $value = call_user_func($this->affixes, $this->suffixes);
        if(!is_int($value))
        {
            throw new \Exception("Returned value is not an integer: $value", 1);
        }
        return $value;
    }
}
