<?php

namespace Application\Shareplay\Model;

use Application\Shareplay\Model\Repository\ItemRepository;
use Application\Shareplay\Model\Item\Item;

class Shop
{
    private $items;
    private $golds;

    public function __construct(){
        $this->golds = 1000000;
        $this->_populateShop();
    }

    public function __destruct()
    {
        try {
            $this->sellItemStock();
        } catch (\Exception $e)
        {
            echo $e->getMessage() . PHP_EOL;
            error_log($e->getMessage());
        }
        echo "This Shop was plenty of Gold: $this->golds\n";
    }

    private function _populateShop()
    {
        for ($i=0; $i < 100; $i++) { 
            $this->items[] = new Item("item$i", random_int($i, 100));
        }
    }

    public function showItemStock()
    {
        echo "Stock:\n";
        for ($i = 0; $i < $this->items->count(); $i++)
        {
            echo "Item: " . $this->items[$i]->name . " Value: " . $this->items[$i]->calculateValue() . "\n";
        }
    }

    public function sellItemStock()
    {
            $this->golds += $this->items->calculateValue();
    }
}