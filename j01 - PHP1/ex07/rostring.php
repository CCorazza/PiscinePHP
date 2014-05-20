#!/usr/bin/php
<?php
$str = explode(" ", $argv[1]);
$str = array_filter($str);
$last = array_shift($str);
array_push($str, $last);
echo implode(" ", $str) . "\n";
?>
