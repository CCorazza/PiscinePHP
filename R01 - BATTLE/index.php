<?php
require_once ('includes/logins.php');
require_once ('class/Player.class.php');
require_once ('class/Fleet.class.php');
require_once ('class/Board.class.php');
require_once ('class/Fighter.class.php');
require_once ('includes/modif_fleet.php');
session_start();

if (isset($_POST['submit']) && $_POST['submit'] === "Valider")
	modif_fleet($_POST, $_SESSION['whoplay']);

if (!isset($_SESSION['test']))
{
	$_SESSION['test'] = 'OK';
	header ('Location: install.php');
}

?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title></title>
</head>
<body>

<?php

if (array_key_exists('register', $_GET)) {
	if ($_GET['register'] == "True") 
	{ ?>

	<p><img src="http://static.tumblr.com/bf9ee3bbdcd4d3b7985fa61d1115034c/kyb7l82/DqJmhnwet/tumblr_static_tumblr_static_40k_logo.png" id="home"></p>
	<p><?php include('includes/register_user.php'); ?> </p>

<?php 
	}
}
else if (!isset($_SESSION['player1'], $_SESSION['player2'])) 
{
?>
<p><img src="http://static.tumblr.com/bf9ee3bbdcd4d3b7985fa61d1115034c/kyb7l82/DqJmhnwet/tumblr_static_tumblr_static_40k_logo.png" id="home"></p>
<p><?php include('includes/login_user.php'); ?> </p>

<?php
}

else if (isset($_SESSION['phase']))
{
	if ($_SESSION['phase'] == 1)
		include('includes/saveorder.php');
	if ($_SESSION['phase'] == 2)
		include('content/move.php');
	if ($_SESSION['phase'] == 3)
		include('includes/fire.php');
	include('content/top.php');
	include('content/content.php');
}

?>
</body>
	<script>
	function selectedCell(x, y) {
		parent.frames['phpcode'].location='top.php?x='+x+'&y='+y;
		document.getElementById('action').innerHTML = x +' / '+ y;
	}

	var ppinit = 18;
	var divpp = document.getElementById('PP');
	divpp.innerHTML = 'PP : ' + ppinit;
	var divshipname = document.getElementById('shipname');
	divshipname.innerHTML = 'Fighter';
	function setPP() {
		var res = ppinit;
		var lstinput = document.getElementsByTagName('input');
		var i;
		for (i = 0; i < lstinput.length - 1; i++) {
			res -= new Number(lstinput[i].value);
		}
		divpp.innerHTML = 'PP : ' + res;
	}

document.onmousemove=function(evt) 
{
        var cursor = document.getElementById('cursor');
        console.log(cursor);
        cursor.style.left = evt.clientX;
        cursor.style.top = evt.clientY;
}
	</script>
</html>
