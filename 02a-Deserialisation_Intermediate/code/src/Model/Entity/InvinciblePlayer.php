<?php

namespace Application\Shareplay\Model\Entity;

class InvinciblePlayer extends Player {
    public function damage($loss): void {
        $this->life = max(100, $this->life - $loss);
    }
}