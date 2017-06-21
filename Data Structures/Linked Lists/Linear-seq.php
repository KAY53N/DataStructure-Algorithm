<?php
class Linear_seq
{
	public $_cache = [];
	function __construct()
	{
	}

	function length()
	{
		return count($this->_cache);
	}

    function clear()
    {
        $this->_cache = [];
    }

	function isEmpty()
	{
		return empty($this->_cache);
	}

	function insert($value,$index)
	{
		$length = $this->length();
		if($index<0 || $index>$length)
		{
			return false;
		}

		for($i=$length;$i>$index;$i--)
		{
			$this->_cache[$i] = $this->_cache[$i-1];
		}

		$this->_cache[$index] = $value;
		return true;
	}

	function delete($index)
	{
		$length = $this->length();
		if($index<0 || $index>$length-1)
		{
			return NULL;
		}

		$val = $this->_cache[$index];
		for($i=$index; $i<$length-1; $i++)
		{
			$this->_cache[$i] = $this->_cache[$i+1];
			echo 'this->_cache[' . $i . '] = '. $this->_cache[$i+1].PHP_EOL;
		}

		unset($this->_cache[$length-1]);
		return $val;
	}

    function pop()
    {
        return $this->delete($this->length()-1);
    }

    function shift()
    {
        return $this->delete(0);
    }

	function findEleByIndex($index)
	{
	    $length = $this->length();
	    if($index<0 || $index>$length-1)
	    {
	        return NULL;
	    }
	    return $this->_cache[$index];
	}

	function findIndexByEle($value)
	{
	    $length = $this->length();
	    for($i=0;$i<$length;$i++)
	    {
	        if($value === $this->_cache[$i])
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
		$this->_cache[$index] = $newValue;
		return true;
	}

	function merge($seq)
	{
		if(!($seq instanceof Linear_seq))
		{
			return false;
		}

		$length = $seq->length();
		for($i=0;$i<$length;$i++)
		{
			$this->push($seq->findEleByIndex($i));
		}
		return true;
	}

	static function union($seq1,$seq2)
	{
		$seq = new Linear_seq();
		if(!($seq1 instanceof Linear_seq) || !($seq2 instanceof Linear_seq))
		{
			return $seq;
		}

		$length1 = $seq1->length();
		for($i=0;$i<$length1;$i++)
		{
			$seq->push($seq1->findEleByIndex($i));
		}

		$length2 = $seq2->length();
		for($i=0;$i<$length2;$i++)
		{
			$value = $seq2->findEleByIndex($i);
			if($seq->findIndexByEle($value)===-1)
			{
				$seq->push($value);
			}
		}

		return $seq;
	}

	static function intersection($seq1,$seq2)
	{
		$seq = new Linear_seq();
		if(!($seq1 instanceof Linear_seq) || !($seq2 instanceof Linear_seq))
		{
			return $seq;
		}

		$length = $seq1->length();
		for($i=0;$i<$length;$i++)
		{
			$value = $seq1->findEleByIndex($i);
			if($seq2->findIndexByEle($value)!==-1)
			{
				$seq->push($value);
			}
		}
		return $seq;
	}

}

$Linear_seq = new Linear_seq();
$Linear_seq->insert(1, 0);
$Linear_seq->insert(2, 1);
$Linear_seq->insert(3, 2);
$Linear_seq->insert(4, 3);
$Linear_seq->insert(5, 4);

print_r($Linear_seq->_cache);

$Linear_seq->insert(88, 1);

print_r($Linear_seq->_cache);

$Linear_seq->delete(1);

print_r($Linear_seq->_cache);

$Linear_seq->update("kaysen", 1);

print_r($Linear_seq->_cache);