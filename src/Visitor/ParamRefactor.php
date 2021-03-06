<?php

/*
 * Mondrian
 */

namespace Trismegiste\Mondrian\Visitor;

use Trismegiste\Mondrian\Refactor\Refactored;

/**
 * ParamRefactor replaces the class of a param by its contract
 *
 * Changes could be made to the current PhpFile
 */
class ParamRefactor extends FqcnHelper
{

    protected $context;

    public function __construct(Refactored $ctx)
    {
        $this->context = $ctx;
    }

    /**
     * {@inheritDoc}
     */
    public function enterNode(\PHPParser_Node $node)
    {
        parent::enterNode($node);

        if ($node->getType() === 'Param') {
            $this->enterParam($node);
        }
    }

    /**
     * Visit a Param Node
     *
     * @param \PHPParser_Node_Param $node
     */
    protected function enterParam(\PHPParser_Node_Param $node)
    {
        if ($node->type instanceof \PHPParser_Node_Name) {
            $typeHint = (string) $this->resolveClassName($node->type);
            if ($this->context->hasNewContract($typeHint)) {
                $node->type = new \PHPParser_Node_Name_FullyQualified($this->context->getNewContract($typeHint));
                $this->currentPhpFile->modified();
            }
        }
    }

}
