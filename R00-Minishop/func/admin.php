<?php
include('../config.php');

$mysqli = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);

$res = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `classe`='3'");
if($test = mysqli_fetch_assoc($res)) !== NULL && $_SESSION['Logged']){
	echo "<a href='#admin'>Administration</a>"
} ?>
