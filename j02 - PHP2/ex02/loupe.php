#!/usr/bin/php
<?PHP
if ($argc == 1){
	exit;
}
if (!($html = @file_get_contents($argv[1]))){
	exit;
}
preg_replace_callback('/href=.*title="(.*)"/i',
	function($matches)
	{
		$maj = strtoupper($matches[1]);
		$GLOBALS["html"] = preg_replace("/$matches[1]/", $maj, $GLOBALS["html"]);
	}, $html);
preg_replace_callback("/href=.*>[ ]+(.*)[ ]+</i",
	function($matches)
	{
		$maj = strtoupper($matches[1]);
		$GLOBALS["html"] = preg_replace("/$matches[1]/", $maj, $GLOBALS["html"]);
	}, $html);
preg_replace_callback("/href=.*>(.*)<./i",
	function($matches)
	{
		$maj = strtoupper($matches[1]);
		$GLOBALS["html"] = preg_replace("/$matches[1]/", $maj, $GLOBALS["html"]);
	}, $html);
echo $html;
?>
