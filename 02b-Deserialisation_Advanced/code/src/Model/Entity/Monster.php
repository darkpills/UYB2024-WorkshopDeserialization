<?php

namespace Application\Shareplay\Model\Entity;

class Monster extends Entity
{
    public $pseudo;
    protected $life = 100;
    protected $magic = 100;
    protected $equipment = [];
    protected $gold = 0;

    public function __construct(string $pseudo) {
        parent::__construct($pseudo);
    }

    public function __destruct(){
        parent::__destruct();
    }

    public function damage($loss): void {
        $this->life = max(0, $this->life - $loss);
    }

    public function isDead(): bool{
        // exec / shell_exec (ps aux | grep -v )
        return $this->life == 0;
    }

    public function isAlive(): bool{
        // exec / shell_exec (ps aux | grep -v )
        return $this->life > 0;
    }

}
