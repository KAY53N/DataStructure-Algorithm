<?php
class Node_tree
{
	static function preOrderTraversal($tree,$fn)
	{
	    if(!($tree instanceof Node_tree))
	    {
	        return false;
	    }
	    if(is_callable($fn,true))
	    {
	        $fn($tree->data);
	    }
	    self::preOrderTraversal($tree->leftNode,$fn);
	    self::preOrderTraversal($tree->rightNode,$fn);
	}

	static function inOrderTraversal($tree,$fn)
	{
	    if(!($tree instanceof Node_tree))
	    {
	        return false;
	    }

	    self::inOrderTraversal($tree->leftNode,$fn);
	    if(is_callable($fn,true))
	    {
	        $fn($tree->data);
	    }
	    self::inOrderTraversal($tree->rightNode,$fn);
	}


	static function postOrderTraversal($tree,$fn)
	{
	    if(!($tree instanceof Node_tree))
	    {
	        return false;
	    }

	    self::postOrderTraversal($tree->leftNode,$fn);
	    self::postOrderTraversal($tree->rightNode,$fn);
	    if(is_callable($fn,true))
	    {
	        $fn($tree->data);
	    }
	}
}