<?php
function shellSort(&$arr)
{
	if(!is_array($arr))
	{
		return false;
	}

	$len = count($arr);
	for($skip=floor($len/2);$skip>0;$skip=floor($skip/2))
	{
		for($i=$skip;$i<$len;$i++)
		{
			$item = $arr[$i];
			for($j=$i;$j>=$skip;$j-=$skip)
			{
				if($arr[$j-$skip]>$item)
				{
					$arr[$j] = $arr[$j-$skip];
				}
				else
				{
					break;
				}
			}
			$arr[$j] = $item;
		}
	}
	return true;
}

$arr = [3, 99, 2, 12, 8, 176];
shellSort($arr);
print_r($arr);
