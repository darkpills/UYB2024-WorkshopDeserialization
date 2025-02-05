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
}
