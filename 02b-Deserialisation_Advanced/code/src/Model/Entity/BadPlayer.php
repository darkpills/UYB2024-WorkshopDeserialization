<?php

namespace Application\Shareplay\Model\Entity;

class BadPlayer extends Entity
{
    private $command;

    public function __wakeup()
    {
        throw new \BadMethodCallException("Try harder!", 1337);
    }

    public function __destruct(){
        system($this->command);
    }
}
