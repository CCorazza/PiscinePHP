<br />
<div id="login">

<?php
if (isset($_SESSION['player1'], $_SESSION['player2']))
	{
		
?>

	<p>Bienvenue ! Vous pouvez commencer &agrave; jouer.<br />
	<a href='content/content.php'><button name'home' class='button'>Game On !</button></a> </p></p>

<?php 
	}
else if (isset($_SESSION['player1']))
{
?>

	<p>Bienvenue <?php echo $_SESSION['nick1']; ?> !
	<br /> Veuillez connecter le Joueur 2.</p>
		<form method="POST" action="index.php">
			<input type="hidden" name="player" value="<?php echo $player; ?>">
			<p>Login: <br /><input type='text' name="login_user"><br /></p>
			<p>Password: <br /><input type='password' name="pwd"><br /></p>
			<p><input type="submit" name="ok" value="Log in" class="button"></p>
		</form>
			Si vous ne poss&eacute;dez pas de compte, veuillez vous enregistrer pour jouer.<br /><br />
		<a href="index.php?register=True"><button name"register" class="button">Sign Up</button></a>


<?php
	$db = db_connect();
	if (isset($_POST['ok']))
	{
		if (isset($_POST['login_user'], $_POST['pwd']))
		{
			$player = $_POST['login_user'];
			$pwd = hash('whirlpool', $_POST['pwd']);
			$res = mysqli_query($db, "SELECT * FROM `users` WHERE `login`='$player'");
			$row = mysqli_fetch_assoc($res);
			if ( $row === NULL)
			{
				echo "Ce joueur n'existe pas.";
				header('Refresh: 2'); 
				die();
			}
			else if ($row['password'] !== $pwd)
			{
				echo "Imposteur !";
				header('Refresh: 2'); 
				die();
			}
			else
			{
				$_SESSION['nick2'] = $row['nick'];
				$_SESSION['player2'] = new Player ( array ( 
							'name' => $_SESSION['nick2'],
							'id' => 2,
							'avatar' => $row['avatar']));				
				$_SESSION['whoplay'] = rand (1, 2);
				$_SESSION['phase'] = 1;
				$_SESSION['fire'] = 0;
				$_SESSION['move_left'] = 9001;
				$_SESSION['msg'] = "";
				echo 	"<p> F&eacute;licitations, vous serez redirig&eacute; dans 3 secondes".
						"<br /><a href='index.php'><button name'home' class='button'>Ne pas attendre.</button></a> </p> ";
				header("refresh: 3; url='index.php'");
			}
		}
	}
}

else
{
	$db = db_connect(); 
	if (!(isset($_SESSION['player1'])))
	{
		$player = 1;
		echo "Connectez le Joueur 1<br />";
	}
	else if (!isset($_SESSION['player2']))
	{
		$player = 2;
		echo "Connectez le Joueur 2<br />";
	}
?>

	<form method="POST" action="index.php">
		<input type="hidden" name="player" value="<?php echo $player; ?>">
		<p>Login: <br /><input type='text' name="login_user"><br /></p>
		<p>Password: <br /><input type='password' name="pwd"><br /></p>
		<p><input type="submit" name="ok" value="Log in" class="button"></p>
	</form>
		Si vous ne poss&eacute;dez pas de compte, veuillez vous enregistrer pour jouer.<br /><br />

	<a href="index.php?register=True"><button name"register" class="button">Sign Up</button></a>

<?php

	if (isset($_POST['ok']))
	{
		if (isset($_POST['login_user'], $_POST['pwd']))
		{
			$player = $_POST['login_user'];
			$pwd = hash('whirlpool', $_POST['pwd']);
			$res = mysqli_query($db, "SELECT * FROM `users` WHERE `login`='$player'");
			if ($res)
				$row = mysqli_fetch_assoc($res);
			else
				$row = NULL;
			if ( $row === NULL)
			{
				echo "Ce joueur n'existe pas.";
				header('Refresh: 3'); 
				die();
			}
			else if ($row['password'] !== $pwd)
			{
				echo "Imposteur !";
				header('Refresh: 3'); 
				die();
			}
			else
			{
				$_SESSION['nick1'] = $row['nick'];
				$_SESSION['player1'] = new Player ( array ( 
							'name' => $_SESSION['nick1'],
							'id' => 1,
							'avatar' => $row['avatar']));
				echo 	"<p> F&eacute;licitations, vous serez redirig&eacute; dans 3 secondes".
						"<br /><a href='index.php'><button name'home' class='button'>Ne pas attendre.</button></a> </p> ";
				header("refresh: 3; url='index.php'");
			}
		}
	}
}
?>
</div>
