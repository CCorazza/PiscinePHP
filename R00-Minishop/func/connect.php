<?php
session_start();
include('../config.php');

if ($_SESSION['Logged'] === TRUE)
{
?>
Welcome <?php echo $_SESSION['name']; ?> !&nbsp
<form action="" method="post">
<input type="submit" name="logout" value="Log-out" class="button">
</form>

<?php
}
else
{
?>

<form action="" method="post">
Login : <input type="text" name="user">
Password : <input type="password" name="passwd">
<input type="submit" name="login" value="Log-in" class="button">
</form>

<?php
}

$mysqli = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);

if (isset($_POST['login']))
{
	if ($_POST['user'] != "" && $_POST['passwd'] != "")
	{
		$user = $_POST['user'];
		$passwd = $_POST['passwd'];

		$res = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `username`='$user'");
		if (($row = mysqli_fetch_assoc($res)) === NULL)
		{
			echo "User does not exist";
			header('Refresh: 2'); 
			die();
		}
		else if ($row['password'] !== $passwd)
		{
			echo "Impostor !";
			header('Refresh: 2'); 
			die();
		}
		$_SESSION['Logged'] = TRUE;
		$_SESSION['name'] = $row['name'];
		$_SESSION['username'] = $row['username'];
		echo "Hello !";
		header('Refresh: 1'); 
	}
	else
	{
		echo "Please type your username & password, or register.";
		header('Refresh: 2'); 
	}
}
else if (isset($_POST['logout']))
{
	$_SESSION['Logged'] = FALSE;
	echo "Goodbye !";
	header('Refresh: 2'); 
}

mysqli_close($mysqli);
?>