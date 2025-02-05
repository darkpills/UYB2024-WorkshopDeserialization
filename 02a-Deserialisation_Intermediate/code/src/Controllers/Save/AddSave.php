<?php

namespace Application\Shareplay\Controllers\Save;

class AddSave
{
    public function execute(array $input)
    {
        $save_b64 = $input['save_b64'];
        $test_data = base64_decode($save_b64, true);
        if (!$test_data) {
            throw new \Exception("Data are not encoded correctly. Try again!");
        }
        $success = $GLOBALS['game']->addGame($save_b64);
        if (!$success) {
            throw new \Exception("Impossible to import save state.");
        } else {
            header("Location: index.php");
        }
    }
}