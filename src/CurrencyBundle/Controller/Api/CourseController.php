<?php

namespace CurrencyBundle\Controller\Api;

use CurrencyBundle\Entity\Course;
use CurrencyBundle\Output\Json\CourseOutput;
use CurrencyBundle\Usecase\Course\CourseReadUsecase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CourseController
 *
 * @package CurrencyBundle\Controller\Api
 */
class CourseController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    // TODO: created as an example.
    public function createCourseAction(Request $request)
    {

        $bankRepository = $this->getDoctrine()
                               ->getRepository('CurrencyBundle:Bank');
        $bank = $bankRepository->find(1);

        $course = new Course();
        $course->setBank($bank);
        $course->setCurrency('EUR');
        $course->setCostBuy('28.78');
        $course->setCostSale('29.78');
        $course->setDate(new \DateTime());
        $course->setType(1);

        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Course (no queries yet)
        $em->persist($course);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new JsonResponse(array('message' => 'Saved new course with id ' . $course->getCourseId()));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getCoursesAction(Request $request)
    {
        $courseReadUseCase = new CourseReadUsecase($this->getDoctrine(), new CourseOutput());

        return $courseReadUseCase->execute();
    }
}
