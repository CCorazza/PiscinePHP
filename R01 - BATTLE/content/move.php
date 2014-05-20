<?php
if ($_SESSION['phase'] == 2 && (!isset($_SESSION['move_left']) || ($_SESSION['move_left'] == 9001)))
{
	$_SESSION['move_left'] = 110;
}

if (array_key_exists('dir', $_POST))
{
	if ($_SESSION['whoplay'] == 1)
		$_SESSION['fleet1']->ships[0]->moveShip($_POST['dir']);
	if ($_SESSION['whoplay'] == 2)
		$_SESSION['fleet2']->ships[0]->moveShip($_POST['dir']);	
	$_SESSION['move_left'] -= 1;
	if ($_SESSION['move_left'] == 100)
	{
		$_SESSION['move_left'] = 10;
		$_SESSION['whoplay'] = $_SESSION['whoplay'] == 1 ? 2 : 1;
	}
	else if ($_SESSION['move_left'] <= 0)
	{
		$_SESSION['phase'] = 3;
		$_SESSION['move_left'] = 9001;
		$_SESSION['whoplay'] = $_SESSION['whoplay'] == 1 ? 2 : 1;
	}
}


?>
