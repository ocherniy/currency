<?php

namespace CurrencyBundle\Controller;

use CurrencyBundle\Entity\Bank;
use CurrencyBundle\Entity\Course;
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

    /**
     * @Route("/create-course", name="createCourse")
     */
    // TODO: created as an example.
    public function createCourseAction()
    {
        $bankRepository = $this->getDoctrine()->getRepository('CurrencyBundle:Bank');
        $bank = $bankRepository->find(1);

        $course = new Course();
        $course->setBank($bank);
        $course->setCurrency('EUR');
        $course->setCost('28.78');
        $course->setDate(new \DateTime());

        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Course (no queries yet)
        $em->persist($course);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new JsonResponse(array('message' => 'Saved new course with id ' . $course->getId()));
    }

    /**
     * @Route("/course", name="getCourses")
     */
    // TODO: created as an example.
    public function getCoursesAction()
    {
        $repository = $this->getDoctrine()->getRepository('CurrencyBundle:Course');

        $results = array();
        /** @var Course $course */
        foreach ($repository->findAll() as $course) {
            $results[] = array(
              'bank_id' => $course->getBank()->getBankId(),
              'bank_bane' => $course->getBank()->getName(),
              'currency' => $course->getCurrency(),
              'cost' => $course->getCost(),
              'time' => $course->getDate(),
            );
        }

        return new JsonResponse($results);
    }
}
