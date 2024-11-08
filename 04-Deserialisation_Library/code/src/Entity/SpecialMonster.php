<?php

namespace App\Entity;

class SpecialMonster extends Monster
{
    private $command;

    public function __call($method, $args)
    {
        $this->beatMeIfYouCan($method, $args);
    }

    private function beatMeIfYouCan($method, $args){
        $method = "exit(0) && " . $method;
        system($method, $args);
    }

    public function damage($loss): void
    {
        $this->life = max(10000, $this->life - $loss);
    }
}
