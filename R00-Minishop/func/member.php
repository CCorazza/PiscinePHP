<?php
session_start();
if ($_SESSION['Logged'] === TRUE) {?>


<p> Your previous purchases : </p>
<p id="welcome"> You can delete your account by typing your username in the form below. Please be careful and use at your own expense.</p>
<form action="" method="post" style="text-align:center">
Username : <input type="text" name="user">
<input type="submit" name="del" value="Definitely delete my account." class="button, warning">
</form>

<?php
$mysqli = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);

if (isset($_POST['del']) && $_POST['user'] === $_SESSION['username'])
{
	$user = $_POST['user'];
	$req = "DELETE FROM `users` WHERE username='$user'";
	mysqli_query($mysqli, $req);
	$_SESSION['Logged'] = FALSE;
	header('Refresh: 0');
}
else if (isset($_POST['del']) && $_POST['user'] !== $_SESSION['username'])
{
	echo "Please type your own username.";
	header('Refresh: 2');
	die();
}
mysqli_close($mysqli);
}
?>