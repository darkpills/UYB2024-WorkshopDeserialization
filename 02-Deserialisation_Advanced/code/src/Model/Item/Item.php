<?php

namespace Application\Shareplay\Model\Item;

class Item {
    public $name;
    protected $value;
    protected $durability = 1;
    public function __construct($name, $value){
        $this->name = $name;
        $this->value = $value;
    }

    public function calculateValue()
    {
        return $this->_getValue() * $this->_getDurability();
    }

    public function _getValue()
    {
        return $this->value;
    }
    public function _getDurability()
    {
        return $this->durability;
    }
}
