<?php

namespace CurrencyBundle\Controller;

use CurrencyBundle\Entity\Bank;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
        ]);
    }

    /**
     * @Route("/create-bank", name="createBank")
     */
    // TODO: created as an example.
    public function createAction()
    {
        $product = new Bank();
        $product->setName('Privatbank');
        $product->setLogo('http://privatbank.ua/img/logo.png');
        $product->setLink('http://privatbank.ua/');

        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new JsonResponse(array('message' => 'Saved new bank with id ' . $product->getId()));
    }

    /**
     * @Route("/banks", name="getBanks")
     */
    // TODO: created as an example.
    public function getBanksAction()
    {
        $repository = $this->getDoctrine()->getRepository('CurrencyBundle:Bank');

        $results = array();
        /** @var Bank $bank */
        foreach ($repository->findAll() as $bank) {
            $results[] = array(
                'name' => $bank->getName(),
                'logo' => $bank->getLogo(),
                'link' => $bank->getLink(),
            );
        }

        return new JsonResponse($results);
    }
}
