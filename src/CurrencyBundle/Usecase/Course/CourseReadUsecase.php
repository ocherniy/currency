<?php

namespace CurrencyBundle\Usecase\Course;

use CurrencyBundle\Output\Json\AbstractOutput;
use CurrencyBundle\Usecase\AbstractUsecase;
use Doctrine\Bundle\DoctrineBundle\Registry;

/**
 * Class CourseReadUsecase
 *
 * @package CurrencyBundle\Usecase\Course
 */
class CourseReadUsecase extends AbstractUsecase
{
    /** @var Registry */
    protected $doctrine;

    /** @var AbstractOutput */
    protected $output;

    /**
     * BankReadUsecase constructor.
     *
     * @param Registry $doctrine
     * @param AbstractOutput $output
     */
    public function __construct(Registry $doctrine, AbstractOutput $output)
    {
        $this->doctrine = $doctrine;
        $this->output = $output;
    }

    public function execute()
    {
        $repository = $this->doctrine->getRepository('CurrencyBundle:Course');
        $courses = $repository->findAll();

        return $this->output->execute($courses);
    }
}
