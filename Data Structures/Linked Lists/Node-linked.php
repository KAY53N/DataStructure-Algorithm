<?php
class Node_linked
{
    protected $_head;
    function __construct()
    {
        $this->_head = new Node_linked();
    }

    function head()
    {
        return $this->_head;
    }

	function length()
	{
	    $length = 0;
	    $prev = $this->head();
	    
	    while($prev->next)
	    {
	        $prev = $prev->next;
	        $length++;
	    }

	    return $length;
	}

	function isEmpty()
	{
	    return $this->head()->next === NULL;
	}

}