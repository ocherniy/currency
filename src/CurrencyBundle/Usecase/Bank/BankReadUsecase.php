<?php

namespace CurrencyBundle\Usecase\Bank;

use CurrencyBundle\Output\Json\AbstractOutput;
use CurrencyBundle\Usecase\AbstractUsecase;
use Doctrine\Bundle\DoctrineBundle\Registry;

/**
 * Class BankReadUsecase
 *
 * @package CurrencyBundle\Usecase\Bank
 */
class BankReadUsecase extends AbstractUsecase
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
        $repository = $this->doctrine->getRepository('CurrencyBundle:Bank');
        $banks = $repository->findBy(array('status' => 1));

        return $this->output->execute($banks);
    }
}
