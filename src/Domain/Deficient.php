<?php

namespace App\Domain;


class Deficient implements Classification
{
    public function __toString(): string
    {
        return 'deficient';
    }
}