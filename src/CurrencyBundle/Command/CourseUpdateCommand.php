<?php

namespace CurrencyBundle\Command;

use CurrencyBundle\Parser\AbstractParser;
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
                'id',
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
        $parsers = $container->getParameter('banks');

        $id = $input->getArgument('id');
        if ($id && isset($parsers[$id])) {
            $parserClass = $parsers[$id]['class'];
            /** @var AbstractParser $parser */
            $parser = new $parserClass($container->get('doctrine'), $id);
            $parser->execute();
        }
        else {
            foreach ($parsers as $id => $parser) {
                $parserClass = $parsers[$id]['class'];
                /** @var AbstractParser $parser */
                $parser = new $parserClass($container->get('doctrine'), $id);
                $parser->execute();
            }
        }
    }
}
