<?php

/*
 * Mondrian
 */

namespace Trismegiste\Mondrian\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Trismegiste\Mondrian\Parser\PhpDumper;
use Trismegiste\Mondrian\Builder\Linking;
use Trismegiste\Mondrian\Builder\Statement\Builder;
use Trismegiste\Mondrian\Refactor\ContractorBuilder;

/**
 * ContractorCommand recursively scans a directory and
 * refactors concrete class with annotations.
 *
 * It creates an interface, changes paramters types and adds inheritance
 */
class ContractorCommand extends RefactorCommand
{

    protected function configure()
    {
        parent::configure();

        $this->setName('refactor:abstract')
                ->setDescription('Scans a directory and refactors classes with annotations');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $compil = new Linking(
                new Builder(), new ContractorBuilder(new PhpDumper()));

        $compil->run($this->phpfinder->getIterator());
    }

}
