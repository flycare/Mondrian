<?php

/*
 * Mondrian
 */

namespace Trismegiste\Mondrian\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Finder\Finder;

/**
 * RefactorCommand recursively scans a directory and
 * refactors classes. This abstract class only makes common initializations
 */
abstract class RefactorCommand extends Command
{

    protected $phpfinder;

    protected function configure()
    {
        $this
                ->addArgument('dir', InputArgument::REQUIRED, 'The directory to explore')
                ->addOption('ignore', 'i', InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, 'Directories to ignore', array('Tests', 'vendor'));
    }

    /**
     * Inject parameters of the command
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $directory = $input->getArgument('dir');
        $ignoreDir = $input->getOption('ignore');

        $this->phpfinder = new Finder();
        $this->phpfinder->files()
                ->in($directory)
                ->name('*.php')
                ->exclude($ignoreDir);
    }

}
