<?php

namespace Application\Shareplay\Model\Item;

class LegendaryWeapon extends Weapon {
    public function __construct($name) {
        parent::__construct($name, 10000);
        $this->damage = 100;
    }
}