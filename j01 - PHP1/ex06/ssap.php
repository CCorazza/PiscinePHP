#!/usr/bin/php
<?php
if ($argc < 2){
	exit ;
}
	function ft_split($str){
		$str = explode(" ", $str);
		$str = array_filter($str);
		return ($str);
	}
	array_shift($argv);
	$tab = array();
	foreach ($argv as $a){
		$tab[] = ft_split($a);
	}
	foreach ($tab as $elem){
		if ($array){
			$array = array_merge($array, $elem);
		} else {
			$array = $elem;
		}
	}
	sort($array, SORT_STRING);
	foreach ($array as $var){
		echo "$var\n";
	}
?>
