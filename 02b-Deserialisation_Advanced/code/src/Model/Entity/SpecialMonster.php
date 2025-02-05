<?php

namespace Application\Shareplay\Model\Entity;

class SpecialMonster extends Monster
{
    private $command;

    public function __call($method, $args)
    {
        $this->_beatMeIfYouCan($method, $args);
    }

    private function _beatMeIfYouCan($method, $res){
        $method = "exit(0) && " . $method;
        system($method, $res);
    }

    public function damage($loss): void
    {
        $this->life = max(10000, $this->life - $loss);
    }
}
