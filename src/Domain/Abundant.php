<?php

namespace App\Domain;


class Abundant implements Classification
{
    public function __toString(): string
    {
        return 'abundant';
    }
}