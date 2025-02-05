<?php

namespace Application\Shareplay\Controllers\Save;

class DeleteSave
{
    public function execute($id)
    {
        $success = $GLOBALS['game']->deleteGame($id);

        if (!$success) {
            throw new \Exception("Impossible de supprimer le game de la collection.");
        } else {
            header('Location: index.php');
        }
    }
}
