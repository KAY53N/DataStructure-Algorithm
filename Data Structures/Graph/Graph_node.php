<?php
class Graph_node
{
    protected $index;
    protected $data;
    function __construct($data=NULL)
    {
        $this->set_data($data);
    }

    function get_index()
    {
        return $this->index;
    }
    
    function set_index($index)
    {
        $this->index = $index;
    }
    
    function get_data()
    {
        return $this->data;
    }
    
    function set_data($data)
    {
        $this->data = $data;
    }
}