<?php

namespace App\Tests\Domain;

use App\Domain\NumberCategorizationService;
use PHPUnit\Framework\TestCase;

class NumberCategorizationServiceTest extends TestCase
{
    /** @var NumberCategorizationService */
    private $categorizationService;

    public function setUp()
    {
        $this->categorizationService = new NumberCategorizationService();
    }

    public function testForPerfectNumbers()
    {
        $this->assertTrue($this->categorizationService->getClassification(6) == 'perfect');
    }

    public function testForAbundantNumber()
    {
        $this->assertTrue($this->categorizationService->getClassification(12) == 'abundant');
    }

    public function testForDeficientNumber()
    {
        $this->assertTrue($this->categorizationService->getClassification(8) == 'deficient');
    }
}
