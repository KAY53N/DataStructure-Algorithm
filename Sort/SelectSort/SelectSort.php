<?php
function _swap(&$arr,$index1,$index2)
{
	if($index1!==$index2)
	{
		$temp = $arr[$index1];
		$arr[$index1] = $arr[$index2];
		$arr[$index2] = $temp;            
	}
}

function selectSort(&$arr)
{
	if(!is_array($arr))
	{
		return false;
	}

	$len = count($arr);
	for($i=0;$i<$len;$i++)
	{
		$item = $arr[$i];
		$index = $i;
		for($j=$i+1;$j<$len;$j++)
		{
			if($arr[$j]<$item)
			{
				$index = $j;
				$item = $arr[$j];
			}
		}
		_swap($arr,$i,$index);
	}
	return true;
}

$arr = [3, 99, 2, 12, 8, 176];
selectSort($arr);
print_r($arr);
