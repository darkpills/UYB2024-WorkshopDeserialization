<?php

namespace Application\Shareplay\Controllers\Save;

class SelectSave
{
    public function execute($id)
    {
        $local_game = $GLOBALS['game']->getGame($id);
        $local_game_id = $id;

        require 'src/Templates/game.php';
    }
}