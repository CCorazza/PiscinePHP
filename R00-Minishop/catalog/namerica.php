<?php
include('../config.php');

$mysqli = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);

$res = mysqli_query($mysqli, "SELECT * FROM `catalog` WHERE `country`='namerica'");
while (($row = mysqli_fetch_assoc($res)) !== NULL)
{
	$img = $row['img'];
	$name = $row['name'];
	$price = $row['price'];
	echo "<div class=\"img\">"
 		."<a target=\"_blank\" href=\"#\"><img src=\"$img\"></a>"
 		."<div class=\"desc\">$name : \$$price</div></div>";
}

mysqli_close($mysqli);
?>