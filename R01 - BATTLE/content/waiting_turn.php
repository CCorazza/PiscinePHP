<?php

if ( isset($_SESSION['phase']))
{
	if ($_SESSION['whoplay'] == 1) {
		echo "<p><img src='", $_SESSION['player2']->getImg(), "' class='avatar'></p>", $_SESSION['player2']->getName(), ", ce n'est pas encore votre tour.<br />";
	}
	else if ($_SESSION['whoplay'] == 2) {
		echo "<p><img src='", $_SESSION['player1']->getImg(), "' class='avatar'></p>", $_SESSION['player1']->getName(), ", ce n'est pas encore votre tour.<br />";
	}
}
?>