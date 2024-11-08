<?php

class File
{
    public $file;

    public function getValue() {
        $cmd = "cat $this->file";
        return shell_exec($cmd);
    }
}

class Player
{
    public $pseudo;
    protected $life;
    protected $magic;
    protected $equipment = array();

    public function isAlive() {
        return $this->life->getValue() > 0;
    }

    public function __destruct()
    {
        echo "__destruct() on Player has been called!";
        if ($this->isAlive()) {
            unset($this->life);
        }
    }

    public function __wakeup()
    {
        echo "__wakeup() on Player has been called!";
    }
}

class Life {

    protected $value;

    public function getValue() {
        return $this->value;
    }
}

$alive = false;
if (isset($_GET['player'])) {
    $player = unserialize(base64_decode($_GET['player']));
    //$alive = $player->isAlive();
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Deserialisation Workshop</title>
    </head>
    <body>
        <h1>Workshop introduction</h1>
        <p>We don't care if player is alive</p>
    </body>
</html>


