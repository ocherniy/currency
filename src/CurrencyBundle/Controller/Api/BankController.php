<?php

namespace CurrencyBundle\Controller\Api;

use CurrencyBundle\Output\Json\BankOutput;
use CurrencyBundle\Usecase\Bank\BankReadUsecase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class BankController
 *
 * @package CurrencyBundle\Controller
 */
class BankController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getBanksAction(Request $request)
    {
        $bankReadUseCase = new BankReadUsecase($this->getDoctrine(), new BankOutput());

        return $bankReadUseCase->execute();
    }
}
