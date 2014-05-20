#!/usr/bin/php
<?php
$i = 1;
do {
	echo $argv[$i];
	echo "\n";
	$argc--;
	$i++;
}while ($argc > 1);
?>
