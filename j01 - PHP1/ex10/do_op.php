#!/usr/bin/php
<?php
    if ($argc != 4)
       exit("Incorrect Parameters\n");
    $a = trim($argv[1]);
    $op = trim($argv[2]);
    $b = trim($argv[3]);
    if ($op == "+")
       echo $a + $b."\n";
    if ($op == "-")
       echo $a - $b."\n";
    if ($op == "/")
       echo $a / $b."\n";
    if ($op == "*")
       echo $a * $b."\n";
    if ($op == "%")
       echo $a % $b."\n";
?>
