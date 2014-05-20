<?php
session_start();
unset($_SESSION['player1']);
unset($_SESSION['player2']);
unset($_SESSION['fleet1']);
unset($_SESSION['fleet2']);
unset($_SESSION['whoplay']);
unset($_SESSION['phase']);
unset($_SESSION['move_left']);
unset($_SESSION['pp1']);
unset($_SESSION['pp2']);
unset($_SESSION['fire']);
unset($_SESSION['EndGame']);
unset($_SESSION['win1']);
unset($_SESSION['win2']);
header("Location: index.php");
?>
