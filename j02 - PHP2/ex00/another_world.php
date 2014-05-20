#!/usr/bin/php
<?PHP
if ($argc < 2){
exit;
}
$str = trim($argv[1], " \t");
$str = preg_replace('/\s+/', ' ', $str);
echo "$str\n";
?>
