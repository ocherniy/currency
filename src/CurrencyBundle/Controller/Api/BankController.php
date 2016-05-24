<?php

namespace CurrencyBundle\Controller\Api;

use CurrencyBundle\Entity\Bank;
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
    // TODO: created as an example.
    public function createBankAction(Request $request)
    {
        $product = new Bank();
        $product->setUniqueId('privatbank');
        $product->setTitle('Privatbank');
        $product->setLogo('http://privatbank.ua/img/logo.png');
        $product->setLink('http://privatbank.ua/');

        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new JsonResponse(array('message' => 'Saved new bank with id ' . $product->getBankId()));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getBanksAction(Request $request)
    {
        $repository = $this->getDoctrine()
                           ->getRepository('CurrencyBundle:Bank');

        $results = array();
        /** @var Bank $bank */
        foreach ($repository->findAll() as $bank) {
            $results[] = array(
                'name' => $bank->getTitle(),
                'logo' => $bank->getLogo(),
                'link' => $bank->getLink(),
            );
        }

        return new JsonResponse($results);
    }
}
