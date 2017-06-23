<?php
class Node_linked
{
    public $data;
    public $next = NULL;
    public function __construct($value=NULL)
    {
        $this->data = $value;
    }

    public function update($newValue)
    {
        $this->data = $newValue;
    } 
}

class Linear_linked
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

    function tail()
    {
        $prev = $this->head();
        while($prev->next)
        {
            $prev = $prev->next;
        }
        return $prev;
    }

    function insert($value,$index)
    {
        $length = $this->length();
        if($index<0 || $index>$length)
        {
            return false;
        }

        $node = new Node_linked($value);
        $prev = $this->head();
        for($i=0;$i<$index;$i++){
            $prev = $prev->next;
        }

        $node->next = $prev->next;
        $prev->next = $node;

        return true;
    }

    function push($value)
    {
        return $this->insert($value,$this->length());
    }

    function unshift($value)
    {
        return $this->insert($value,0);
    }

    function delete($index)
    {
        $length = $this->length();
        if($index<0 || $index>$length-1)
        {
            return NULL;
        }

        $prev = $this->head();
        for($i=0;$i<$index;$i++)
        {
            $prev = $prev->next;
        }

        $next = $prev->next;
        $value = $next->data;
        $prev->next = $next->next;
        $next->next = NULL;
        unset($next);
        return $value;
    }

    function pop()
    {
        return $this->delete($this->length()-1);
    }

    function shift()
    {
        return $this->delete(0);
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

    function clear()
    {
        $this->head()->next = NULL;
    }

    function findEleByIndex($index)
    {
        $length = $this->length();
        if($index<0 || $index>$length-1)
        {
            return NULL;
        }

        $prev = $this->head();
        for($i=0;$i<$index;$i++)
        {
            $prev = $prev->next;
        }

        return $prev->next->data;
    }

    function findIndexByEle($value)
    {
        $length = $this->length();
        $prev = $this->head();
        for($i=0;$i<$length;$i++)
        {
            $prev = $prev->next;
            if($prev->data === $value)
            {
                return $i;
            }
        }
        return -1;
    }

    function update($newValue,$index)
    {
        $length = $this->length();
        if($index<0 || $index>$length-1)
        {
            return false;
        }

        $prev = $this->head();
        for($i=0;$i<$index;$i++)
        {
            $prev = $prev->next;
        }
        $prev->next->update($newValue);
        return true;
    }

    function merge($linked)
    {
        if(!($linked instanceof Linear_linked))
        {
            return false;
        }
        $this->tail()->next = $linked->head()->next;
        return true;
    }

    // 返回序号所对应的节点的前一个节点
    function findNodeByIndex($index)
    {
        $length = $this->length();
        if($index<0 || $index>$length-1)
        {
            return NULL;
        }

        $prev = $this->head();
        for($i=0;$i<$index;$i++)
        {
            $prev = $prev->next;
        }
        return $prev;
    }


}

class Node_doublelinked extends Node_linked
{
    public $prev = NULL;
    function __construct($value=NULL)
    {
        parent::__construct($value);
    }
}

class Linear_doublelinked extends Linear_linked
{
    function __construct()
    {
        $this->_head = new Node_doublelinked();        
    }

    function insert($value,$index)
    {
        $length = $this->length();
        if($index<0 || $index>$length)
        {
            return false;
        }

        $node = new Node_doublelinked($value);
        $prev = $this->head();
        for($i=0;$i<$index;$i++)
        {
            $prev = $prev->next;
        }

        $node->next = $prev->next;
        $node->prev = $prev;
        if($prev->next)
        {
            $prev->next->prev = $node;
        }
        $prev->next = $node;

        return true;
    }

    function delete($index)
    {
        $length = $this->length();
        if($index<0 || $index>$length-1)
        {
            return NULL;
        }

        $prev = $this->head();
        for($i=0;$i<$index;$i++){
            $prev = $prev->next;
        }

        $next = $prev->next;
        $value = $next->data;
        if($next->next)
        {
            $next->next->prev = $prev;
        }

        $prev->next = $next->next;
        $next->next = NULL;
        $next->prev = NULL;
        unset($next);
        return $value;
    }
}

$Linear_doublelinked = new Linear_doublelinked();
$Linear_doublelinked->insert('a', 0);
$Linear_doublelinked->insert('b', 1);
$Linear_doublelinked->insert('c', 2);
print_r($Linear_doublelinked->head());
