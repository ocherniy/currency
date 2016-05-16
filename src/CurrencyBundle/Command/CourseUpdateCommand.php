<?php

namespace CurrencyBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CourseUpdateCommand
 *
 * @package CurrencyBundle\Command
 */
class CourseUpdateCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('currency:course:update')
            ->setDescription('Update courses')
            ->addArgument(
                'name',
                InputArgument::OPTIONAL,
                'For which bank do you want to update course?'
            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $parsers = $container->getParameter('parsers');

        // TODO: Implement parser executing.
        $name = $input->getArgument('name');
        if ($name && isset($parsers[$name])) {
            $output->writeln(print_r($parsers[$name], TRUE));
        }
        else {
            $output->writeln(print_r($parsers, TRUE));
        }
    }
}
