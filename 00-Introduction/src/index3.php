<?php

class Process
{
    protected $pid;

    public function isAlive() {
        $cmd = "ps --no-headers -p $this->pid";
        return shell_exec($cmd);
    }
}

class Player
{
    public $pseudo;
    protected $life = 100;
    protected $magic = 100;
    protected $equipment = array();

    public function isAlive() {
        return $this->life > 0;
    }

}

$alive = false;
if (isset($_GET['player'])) {
    $player = unserialize(base64_decode($_GET['player']));
    $alive = $player->isAlive();
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Deserialisation Workshop</title>
    </head>
    <body>
        <h1>Workshop introduction</h1>
        <p>Player is alive: <?php var_dump($alive) ?></p>
    </body>
</html>

