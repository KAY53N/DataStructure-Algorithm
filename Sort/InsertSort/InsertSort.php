<?php
function insertSort(&$arr)
{
	if(!is_array($arr))
	{
		return false;
	}

	$len = count($arr);
	for($i=1;$i<$len;$i++)
	{
		$item = $arr[$i];
		for($j=$i;$j>0;$j--)
		{
			if($arr[$j-1]>$item)
			{
				$arr[$j] = $arr[$j-1];
			}
			else
			{
				break;
			}
		}
		$arr[$j] = $item;
	}
	return true;
}

$arr = [3, 99, 2, 12, 8, 176];
insertSort($arr);
print_r($arr);
