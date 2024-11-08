<?php

namespace Application\Shareplay\Model;

class Player
{
    public string $pseudo;
    protected int $life = 100;
    protected int $magic = 100;
    protected $equipment = [];
    protected $command;


    public function __construct(string $pseudo) {
        $this->pseudo = $pseudo;
    }

    public function __destruct(){
    }

    public function damage($loss): void {
        $this->life = max(0, $this->life - $loss);
    }

    public function isDead(): bool{
        return $this->life == 0;
    }

    public function isAlive(): bool{
        return $this->life > 0;
    }

    public function getLife()
    {
        return $this->life;
    }
    
    public function getMagic()
    {
        return $this->magic;
    }

    public function getEquipment()
    {
        echo get_class()." equipment: ";
        print_r($this->equipment);
    }

}
