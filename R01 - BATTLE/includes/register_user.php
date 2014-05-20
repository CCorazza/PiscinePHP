<div id="login">
<?php
$db = db_connect();
$_SESSION['Logged'] = FALSE;

if ($_SESSION['Logged'] === TRUE)
{
?>
Bienvenue <?php echo $_SESSION['nick']; ?> ! <br />
Tu n'as pas besoin de t'enregistrer &agrave; nouveau. :)<br /><br /><br />
<a href="index.php"><button name"home" class="button">Accueil</button></a>

<?php
}
else
{
		if (isset($_POST['ok']))
		{
			if (isset($_POST['login_user'], $_POST['pwd_conf'], $_POST['pwd'], $_POST['nick']))
			{
				if ($_POST['pwd'] != $_POST['pwd_conf'])
					echo"<p> Mot de passe diff&eacute;rents. </p> ";
				else
				{
					$user = $_POST['login_user'];
					$pwd = hash('whirlpool', $_POST['pwd']);
					$nick = $_POST['nick'];
					if ($_POST['avatar'] !== ""){
						$avatar = $_POST['avatar'];
						$request = "INSERT INTO `users` (`id`, `nick`, `avatar`, `login`, `password`)"
						." VALUES (NULL, '$nick', '$avatar', '$user', '$pwd');";
					}
					else
					{
						$avatar = 'http://news.jukebo.fr/files/2010/02/steven-tyler-2-300x300.jpg';
						$request = "INSERT INTO `users` (`id`, `nick`, `avatar`, `login`, `password`)"
						." VALUES (NULL, '$nick', "
						."'$avatar', '$user', '$pwd');";
					}
					mysqli_query($db, $request);
					
					$timeout = 3;
					$_SESSION['Logged'] = TRUE;
					$_SESSION['nick1'] = $nick;
					$_SESSION['player1'] = new Player(array('name' => $nick, 'id' => 1, 'avatar' => $avatar));
					echo "<p> F&eacute;licitations, vous serez redirig&eacute; dans 3 secondes".
					"<br /> <a href='index.php'><button name'home' class='button'>Ne pas attendre.</button></a> </p> ";
					//header("refresh: $timeout; url='index.php'");
				}
			}
			else
			{
				?><p> Vous n'avez pas remplis tous les champs. Connexion impossible. </p> <?php
			}
		}
		?>
	
		<form action="index.php?register=True" method="POST">
			<p>Login: <br /><input type='text' name="login_user"><br /></p>
			<p>Nickname <span style="font-size: 0.8em; color:rgb(42,42,42);">(sera visible  par les autres joueurs)</span>: <br /><input type='text' name="nick"><br /></p>
			<p>Avatar(url): <br /><input type='text' name="avatar"><br \></p>
			<p>Mot de Passe: <br /><input type='password' name="pwd"><br /></p>
			<p>Confirmer: <br /><input type='password' name="pwd_conf"></p>
			<p style="text-align:right;"><input type="submit" name="ok" value="Cr&eacute;er mon compte." class="button"></p>
		</form>
	<?php } ?>
</div>
