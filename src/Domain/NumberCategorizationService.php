<?php

namespace App\Domain;

use RuntimeException;

class NumberCategorizationService
{

    /**
     * @param int $integer
     * @return Classification
     */
    function getClassification(int $integer): Classification
    {
        $divisors = $this->getDivisorsFor($integer);

        $sum = 0;
        foreach($divisors as $divisor) {
            $sum += $divisor;

            if ($sum == $integer) {
                return new Perfect();
            }

            if($sum > $integer) {
                return new Abundant();
            }
        }

        if ($sum < $integer) {
            return new Deficient();
        }

        throw new RuntimeException(sprintf('Unclassifiable number, %s is neither perfect, abundant nor deficient'));
    }

    /**
     * @param int $number
     * @return int[]
     */
    private function getDivisorsFor(int $number): array
    {
        return array_filter(
            range(1, $number-1), function ($value) use ($number) {
                return $number % $value == 0;
            }
        );
    }

}