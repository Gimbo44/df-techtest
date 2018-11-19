<?php

namespace App\Domain;


class Perfect implements Classification
{
    public function __toString(): string
    {
        return 'perfect';
    }
}