<?php

namespace App\Controller;


use App\Domain\NumberCategorizationService;
use RuntimeException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class PerfectNumberController extends AbstractController
{
    /**
     * @var NumberCategorizationService
     */
    private $categorizationService;

    /**
     * PerfectNumberController constructor.
     * @param NumberCategorizationService $categorizationService
     */
    public function __construct(NumberCategorizationService $categorizationService)
    {
        $this->categorizationService = $categorizationService;
    }

    public function categorizeNumber(Request $request)
    {
        if (is_null($request->get('number'))) {
            throw new RuntimeException("Malformed request, missing 'number' from post body");
        }
        $number = $request->get('number');
        if (!filter_var($number, FILTER_VALIDATE_INT)) {
            throw new RuntimeException("Malformed request, invalid type for 'number'");
        }
        if ($number <= 1) {
            throw new RuntimeException("Malformed request, number must be greater than 1.");
        }

        return new Response(
            (string)$this->categorizationService->getClassification($request->get('number'))
        );
    }
}