<?php
class Graph
{
    protected $_nodes = [];
    protected $_edges = [];
    function __construct()
    {
    }

    function insert($node)
    {
        if(!($node instanceof Graph_node))
        {
            $node = new Graph_node($node);
        }
        $index = $this->length();
        $node->set_index($index);
        $this->insert_indexed_node($node);
    }

    function insert_indexed_node($node)
    {
        $index = $node->get_index();
        $this->_nodes[$index] = $node;
    }

    function length()
    {
        return count($this->nodes);
    }

    function set_edge($from,$to,$weight=1)
    {
        if(!isset($this->_edges[$from]))
        {
            $this->_edges[$from] = [];
        }
        $this->_edges[$from][$to] = $weight;
    }

    function get_node_by_index($index)
    {
        return $this->_nodes[$index];
    }
}