<?php

namespace App\Contracts\Interfaces;

interface DeletableRelationCheck {
    /**
     * @return array
     */
    public function getRelationCheckBeforeDelete(): array;
}
