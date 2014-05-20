<?php

if ( $_SESSION['phase'] == 1)
{
	if ($_SESSION['whoplay'] == 1) {
		echo $_SESSION['player1']->getName(), ", c'est votre phase d'ordre.<br /><p><img src='", $_SESSION['player1']->getImg(), "' class='avatar'></p>";
	}
	else if ($_SESSION['whoplay'] == 2) {
		echo $_SESSION['player2']->getName(), ", c'est votre phase d'ordre.<br /><p><img src='", $_SESSION['player2']->getImg(), "' class='avatar'></p>";
	}
	include ('content/order_phase.php');
}
else if ( $_SESSION['phase'] == 2)
{
	if ($_SESSION['whoplay'] == 1) {
		echo $_SESSION['player1']->getName(), ", d&eacute;placez vos vaisseaux.<br /><p><img src='", $_SESSION['player1']->getImg(), "' class='avatar'></p>";
	}
	else if ($_SESSION['whoplay'] == 2) {
		echo $_SESSION['player2']->getName(), ", d&eacute;placez vos vaisseaux.<br /><p><img src='", $_SESSION['player2']->getImg(), "' class='avatar'></p>";
	}
	include ('content/move_form.php');
}
else if ( $_SESSION['phase'] == 3)
{
	if ($_SESSION['whoplay'] == 1) {
		echo $_SESSION['player1']->getName(), ", exterminez l'ennemi.<br /><p><img src='", $_SESSION['player1']->getImg(), "' class='avatar'></p>";
	}
	else if ($_SESSION['whoplay'] == 2) {
		echo $_SESSION['player2']->getName(), ", exterminez l'ennemi.<br /><p><img src='", $_SESSION['player2']->getImg(), "' class='avatar'></p>";
	}
	include ('content/select_fire.php');
}
?>
