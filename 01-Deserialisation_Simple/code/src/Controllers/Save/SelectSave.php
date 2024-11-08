<?php

namespace Application\Shareplay\Controllers\Save;

class SelectSave
{
    public function execute($id)
    {
        $save = $GLOBALS['game']->getGame($id);
        $save_id = $id;

        require 'src/Templates/game.php';
    }
}