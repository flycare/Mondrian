<?php

/*
 * MondrianCubox
 */

namespace Trismegiste\Mondrian\Refactor;

use Trismegiste\Mondrian\Visitor;

/**
 * ContractorBuilder builds the compiler for the contractor refactoring service
 */
class ContractorBuilder extends RefactoringBuilder
{

    protected $context;

    public function buildCollectors()
    {
        return array(
            // finds which class must be refactored (and add inheritance)
            new Visitor\NewContractCollector($this->context),
            // replaces the parameters types with the interface
            new Visitor\ParamRefactor($this->context),
            // creates the new interface file
            new Visitor\InterfaceExtractor($this->context, $this->dumper)
        );
    }

    public function buildContext()
    {
        $this->context = new Refactored();
    }

}