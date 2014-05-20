<?php

define('BASE_URL', getenv('HTTP_HOST') . '/');
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'peer2peer');
define('DB_NAME', 'battle');


	function db_connect()
	{
		$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
		mysqli_query($link, "USE ".DB_NAME);
		return $link;
	}

?>
