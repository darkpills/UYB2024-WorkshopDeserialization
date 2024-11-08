<?php

namespace Application\Shareplay\Model;

class BadPlayer extends Player
{
    private $command;

    public function __wakeup()
    {
        throw new \BadMethodCallException("Try harder!", 1337);
    }

    public function hackMeIfYouCan(){
        system($this->command);
    }
}
