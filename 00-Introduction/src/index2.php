<?php

function showAllChars($string) {
    $result = "";
    for($i=0; $i<strlen($string); $i++) {
        $c = $string[$i];
        if (ord($c) <= 32 || ord($c) >= 127) {
            $result .= "\\x".str_pad(ord($c), 2, '0');
        } else {
            $result .= $c;
        }
    }
    return $result;
}

class Player
{
    public $pseudo;
    protected $life = 100;
    protected $magic = 100;
    protected $equipement = [];

    public function __construct($pseudo) {
        $this->pseudo = $pseudo;
    }

    public function damage($loss) {
        $this->life = max(0, $this->life - $loss);
    }
}

$p1 = new Player("darkpills");
$p1->damage(20);

$p2 = new Player("sillaw");
$p2->damage(10);

echo "Serialized:".PHP_EOL;
echo "* Player 1: ".showAllChars(serialize($p1)).PHP_EOL;
echo "* Player 2: ".showAllChars(serialize($p2)).PHP_EOL;
echo PHP_EOL;