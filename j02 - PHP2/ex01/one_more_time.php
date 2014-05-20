#!/usr/bin/php
<?PHP
date_default_timezone_set('Europe/Paris');
if ($argc != 2){
	exit("\n");
}
$date = explode(" ", $argv[1]);
if (!(preg_match("/^([0-2][0-3]|[01]?[1-9]):([0-5]?[0-9]):([0-5]?[0-9])$/", $date[4]))){
	exit("Wrong Format\n");
}
$time = explode(":", $date[4]);

unset($date[4]);

$month_fr = array( 1 => '[Jj]anvier', '[Ff][ée]vrier', '[Mm]ars', '[Aa]vril', '[Mm]ai', '[Jj]uin', '[Jj]uillet', '[Aa]o[ûu]t', '[Ss]eptembre', '[Oo]ctobre', '[Nn]ovembre', '[Dd][ée]cembre');
function	check_val($day, $month){
$day_fr = array('[Ll]undi', '[Mm]ardi', '[Mm]ercredi', '[Jj]eudi', '[Vv]endredi', '[Ss]amedi', '[Dd]imanche');
	$m_pattern = '/^'.implode("|", $GLOBALS["month_fr"]).'/';
	$d_pattern = '/^'.implode("|", $day_fr).'/';
	if (!(preg_match($m_pattern, $month) && preg_match($d_pattern, $day))){
		exit("Wrong Format\n");
	}
}
check_val($date[0], $date[2]);
$month_val = array( 1 => 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
$date[2] = strtolower($date[2]);
foreach($month_val as $key => $val){
	if ($date[2] == $val){
		$date[2] = $key;
	}
}
echo mktime($time[0], $time[1], $time[2], $date[2], $date[1], $date[3]);
?>
