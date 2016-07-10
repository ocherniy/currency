<?php

namespace CurrencyBundle\Command;

use CurrencyBundle\Entity\Bank;
use CurrencyBundle\Parser\AbstractParser;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class BankUpsertCommand
 *
 * @package CurrencyBundle\Command
 */
class BankUpsertCommand extends ContainerAwareCommand
{
  protected function configure()
  {
    $this
      ->setName('currency:bank:upsert')
      ->setDescription('Upsert bank');
  }

  /**
   * @param InputInterface $input
   * @param OutputInterface $output
   * @return null
   */
  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $container = $this->getContainer();
    $doctrine = $container->get('doctrine');
    $banks = $container->getParameter('banks');

    foreach ($banks as $unique_id => $bank) {
      $bankRepository = $doctrine->getRepository('CurrencyBundle:Bank');
      $bankEntity = $bankRepository->findOneBy(array('unique_id' => $unique_id));

      if (empty($bankEntity)) {
        $bankEntity = new Bank();
        $bankEntity->setUniqueId($unique_id);
      }

      $bankEntity->setTitle($bank['title']);
      $bankEntity->setLogo($bank['logo']);
      $bankEntity->setLink($bank['link']);
      $bankEntity->setStatus($bank['status']);

      $em = $doctrine->getManager();

      // tells Doctrine you want to (eventually) save the Product (no queries yet)
      $em->persist($bankEntity);

      // actually executes the queries (i.e. the INSERT query)
      $em->flush();
    }
  }
}
