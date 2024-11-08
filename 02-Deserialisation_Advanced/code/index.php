<?php

require 'vendor/autoload.php';

use Application\Shareplay\Controllers\Homepage;
use Application\Shareplay\Controllers\Save\AddSave;
use Application\Shareplay\Controllers\Save\DeleteSave;
use Application\Shareplay\Controllers\Save\SelectSave;

global $game;
$game = new Application\Shareplay\Model\Game();

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'selectSave') {
            if (isset($_GET['save_id']) && $_GET['save_id'] > 0) {
                $save_id = $_GET['save_id'];

                (new SelectSave())->execute($save_id);
            } else {
                throw new Exception("Invalid ID.");
            }
        } elseif ($_GET['action'] === 'addSave') {
            $input = null;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
            }
            var_dump($input);
            (new AddSave())->execute($input);
        } elseif ($_GET['action'] === 'deleteSave') {
            if (isset($_GET['save_id']) && $_GET['save_id'] > 0) {
                $save_id = $_GET['save_id'];

                (new DeleteSave())->execute($save_id);
            } else {
                throw new Exception("Invalid ID.");
            }
        }
    } else {
        (new Homepage())->execute();
    }
} catch (\Exception $e) {
    $errorMessage = $e->getMessage();

    require 'src/Templates/error.php';
}