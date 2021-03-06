<?php

/*
 * Mondrian
 */

namespace Trismegiste\Mondrian\Graph;

/**
 * Edge is a directed edge
 */
class Edge
{

    protected $to;
    protected $from;

    /**
     * Since edge has one source vertex and one target vertex
     * it is builded with two vertices in its constructor
     *
     * @param Vertex $from
     * @param Vertex $to
     */
    public function __construct(Vertex $from, Vertex $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * Get the source vertex
     *
     * @return Vertex
     */
    public function getSource()
    {
        return $this->from;
    }

    /**
     * Get the target vertex
     *
     * @return Vertex
     */
    public function getTarget()
    {
        return $this->to;
    }

}
