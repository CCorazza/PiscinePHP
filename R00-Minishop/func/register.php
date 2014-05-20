<form action="" method="post" style="text-align:center"><br />
User : <input type="text" name="user"><br />
Password : <input type="password" name="passwd"><br />
Full Name : <input type="text" name="name"><br />
<input type="submit" name="clicked" value="Sign up" class="button">
</form>

<?php
include ('../config.php');

$mysqli = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);

if (isset($_POST['clicked']))
{
	if ($_POST['user'] != "" && $_POST['passwd'] != "" && $_POST['name'] != "")
	{
		$user = $_POST['user'];
		$passwd = $_POST['passwd'];
		$name = $_POST['name'];
		$req = "INSERT INTO `users`(`username`, `password`, `name`, `classe`)"
				." VALUES ('$user', '$passwd', '$name', 0)";
		mysqli_query($mysqli, $req);
		echo "Welcome $name !";
		$_SESSION['Logged'] = TRUE;
		$_SESSION['name'] = $name;
		$_SESSION['username'] = $user;
		header('Refresh: 2');
	}
	else
	{
		echo "Please fill all the fields.<br />";
	}
}
mysqli_close($mysqli);
?>