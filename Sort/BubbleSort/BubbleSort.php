#!/usr/bin/php
<?php
list($t, $i, $j, $n) = 0;

fwrite(STDOUT, "Please input count:");
$n = intval(fgets(STDIN));

for($i=1; $i<=$n; $i++)
{
    fwrite(STDOUT, "Please input a name and number:");
    $info = explode(' ', trim(fgets(STDIN)));
    $a[$i]['name'] = $info[0];
	$a[$i]['score'] = $info[1];
}

for($i=1; $i<=$n-1; $i++)
{
    for($j=1; $j<=$n-1; $j++)
	{
	    if($a[$j]['score'] < $a[$j+1]['score'])
		{
		    $t = $a[$j];
			$a[$j] = $a[$j+1];
			$a[$j+1] = $t;
		}
	}
}

for($i=1; $i<=$n; $i++)
{
    echo sprintf("%s ===== %d".PHP_EOL, $a[$i]['name'], $a[$i]['score']);
}

exit;
