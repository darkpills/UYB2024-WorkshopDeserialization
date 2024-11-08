<?php

class Player
{
    public $pseudo;
    protected $life = 100;
    protected $magic = 100;
    protected $equipement = [];

    public function __construct($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function damage($loss)
    {
        $this->life = max(0, $this->life - $loss);
    }
}

$p1 = new Player("darkpills");
$p1->damage(20);

$p2 = new Player("sillaw");
$p2->damage(10);


echo "Serialized:".PHP_EOL;
echo "* Player 1: ".serialize($p1).PHP_EOL;
echo "* Player 2: ".serialize($p2).PHP_EOL;
