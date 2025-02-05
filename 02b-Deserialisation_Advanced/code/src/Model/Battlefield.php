<?php

namespace Application\Shareplay\Model;

use Application\Shareplay\Model\Repository\EntityRepository;
use Application\Shareplay\Model\Entity\Entity;

class Battlefield
{
    private $monsters = [];
    private $attacker;
    private $defender;

    public function __construct(){
        $this->_populateBattlefield();
    }

    public function __destruct()
    {
        try {
            $this->_endCombat();
        } catch (\Exception $e)
        {
            echo $e->getMessage() . PHP_EOL;
            error_log($e->getMessage());
        }
    }

    private function _populateBattlefield()
    {
        for ($i=0; $i < 100; $i++) { 
            $this->monsters[] = new Entity("Monster_" . random_int($i, 100));
        }
    }

    private function _endCombat()
    {
        for ($i=0; $i < count($this->monsters); $i++) { 
            $attacker = $this->attacker;
            $this->monsters[$i]->$attacker($this->defender);
        }
    }

    public function showMonsters()
    {
        echo "Battlefield:\n";
        for ($i = 0; $i < count($this->monsters); $i++)
        {
            echo "Monster: " . $this->monsters[$i]->pseudo . " Life: " . $this->monsters[$i]->life . "\n";
        }
    }

    public function wipeMonsters()
    {
        $this->monsters = null;
    }
}