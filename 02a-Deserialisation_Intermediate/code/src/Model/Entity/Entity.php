<?php

namespace Application\Shareplay\Model\Entity;

class Entity
{
    public $pseudo;
    protected $life;
    protected $magic;
    protected $equipment;
    protected $gold;

    public function __construct(string $pseudo) {
        $this->pseudo = $pseudo;
    }

    public function __destruct(){
        unset($this->equipment);
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
