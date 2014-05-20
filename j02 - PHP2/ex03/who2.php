#!/usr/bin/php
<?PHP
exec("who;", $array, $ret);
foreach($array as $elem)
	echo"$elem\n";
?>
