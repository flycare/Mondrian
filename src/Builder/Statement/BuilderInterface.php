<?php

namespace Trismegiste\Mondrian\Builder\Statement;

/**
 * Contract for a builder of statements list
 */
interface BuilderInterface
{

    /**
     * Builds the lexer
     */
    public function buildLexer();

    /**
     * Builds the parser at the file level
     */
    public function buildFileLevel();

    /**
     * Builds the parser at the package level
     */
    public function buildPackageLevel();

    /**
     * Gets result of the builder of statements
     *
     * @param \Iterator $iter
     */
    public function getParsed(\Iterator $iter);
}