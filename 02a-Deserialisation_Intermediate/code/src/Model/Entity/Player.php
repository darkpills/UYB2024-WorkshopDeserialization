<?php

namespace Application\Shareplay\Model\Entity;

class Player extends Entity
{
    public string $pseudo;
    protected int $life = 100;
    protected int $magic = 100;
    protected $equipment = [];
    private int $gold = 10;

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
        return parent::isDead();
    }

    public function isAlive(): bool{
        // exec / shell_exec (ps aux | grep -v )
        return parent::isAlive();
    }

    public function sellItem($id) {
        $this->gold += $this->equipment[$id]->value;
        $this->equipment[$id]->unset();
    }

    public function buyItem($item)
    {
        $this->equipment[] = $item;
    }
}
