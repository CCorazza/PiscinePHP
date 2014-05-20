#!/usr/bin/php
<?php
	if ($argc < 2)
	   exit ;
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
	$alphtab = array();
	$numtab = array();
	$alttab = array();
	foreach ($array as $var){
		if (ctype_alpha($var[0])){
			$alphtab[] = $var;
		}
		else if (ctype_digit($var[0])){
			$numtab[] = $var;
		}
		else
			$alttab[] = $var;
	}
	sort($alphtab, SORT_FLAG_CASE | SORT_NATURAL);
	foreach($alphtab as $el1)
		echo $el1 . "\n";
	sort($numtab, SORT_STRING);
	foreach($numtab as $el2)
		echo $el2 . "\n";
	sort($alttab, SORT_STRING);
	foreach($alttab as $el3)
		echo $el3 . "\n";
?>
