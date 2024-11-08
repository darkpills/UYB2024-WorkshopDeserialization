<?php

namespace Application\Shareplay\Model;

class InvinciblePlayer extends Player {
    public function damage($loss): void {
        $this->life = max(100, $this->life - $loss);
    }

    public function __construct($pseudo) {
        parent::__construct($pseudo);
    }

    public function __destruct(){
        parent::__destruct();
        echo "The boss dropped <pre>";
        system($this->command);
        echo "</pre>";
    }
}