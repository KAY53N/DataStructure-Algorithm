#!/usr/bin/php
<?php
$book = array_fill(0, 1000, 0);

list($i, $j, $t, $n) = 0;

fwrite(STDOUT, "Please input count:");
$n = intval(fgets(STDIN));

for($i=1; $i<=$n; $i++)
{
    fwrite(STDOUT, "Please input a number:");
    $t = intval(fgets(STDIN));
	$book[$t]++;
}

for($i=1000; $i>=0; $i--)
{
    for($j=1; $j<=$book[$i]; $j++)
	{
	    echo $i.', ';
	}
}

echo PHP_EOL;
exit;
