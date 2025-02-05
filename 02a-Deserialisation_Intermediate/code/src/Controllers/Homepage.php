<?php
// controller/homepage.php

namespace Application\Shareplay\Controllers;

class Homepage {
    public function execute(){
        $saves = $GLOBALS['game']->getAllGames();

        require 'src/Templates/homepage.php';
    }
}