<?php
	require_once('includes/logins.php');

	function logging($db_host, $username, $password, $db_name)
	{
		if (!($content = file_get_contents('includes/logins.php')))
			return false;
		$content = str_replace('localhost', $db_host, $content);
		$content = str_replace('root', $username, $content);
		$content = str_replace('peer2peer', $password, $content);
		$content = str_replace('battle', $db_name, $content);
		file_put_contents('includes/logins.php', $content);
		return true;
	}

if (isset($_POST['db_host'], $_POST['username'], $_POST['password'], $_POST['db_name']))
{
	$messages = array();
	$error = '';

	if (!empty($_POST['username']) && !empty($_POST['password']))
	{

		$log = logging($_POST['db_host'], $_POST['username'], $_POST['password'], $_POST['db_name']);
		$db = db_connect();
		if ($db === false)
			$error = 'Connexion to database failed.';
		else
		{
			$messages[] = 'Connecting database...';
			if (!$log)
				$error = 'We couldn\'t modify log settings.';
			else
			{
				$messages[] = 'Creating database...';
				if (!mysqli_query($db, "CREATE DATABASE IF NOT EXISTS `battle`"))
					$error = 'We couldn\'t create database.';
				else
				{
					$messages[] = 'Selecting database...';
					if (!mysqli_select_db($db, 'battle'))
						$error = 'We couldn\'t select database.';
					else
					{
						$messages[] = 'Creating tables...';
						$query = "CREATE TABLE IF NOT EXISTS `users` ("
								."  `id` int(11) NOT NULL AUTO_INCREMENT,"
								."  `nick` varchar(255) NOT NULL,"
								."  `avatar` varchar(255) NOT NULL DEFAULT 'http://news.jukebo.fr/files/2010/02/steven-tyler-2-300x300.jpg',"
								."  `login` varchar(255) NOT NULL,"
								."  `password` varchar(255) NOT NULL,"
								."  PRIMARY KEY (`id`)"
								.") ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6" ;
						if (!mysqli_multi_query($db, $query))
							$error = 'We couldn\'t create table : ' . $query . ' : ' . mysqli_error($db);

						if (empty($error))
						{
							$messages[] = 'Filling tables...';
							$queries = "INSERT INTO `battle`.`users` (`id`, `nick`, `avatar`, `login`, `password`) VALUES (NULL, 'Trollol', 'http://web-tech.fr/wp-content/uploads/2012/04/trollface1.jpg''', 'lol', '22fb46e1955a8aeb31c59d79d887d02af2d1bc4524e85aafa2455cc78bc0147b10dd477201d147e2f5ca910bb43d982320478b9d179ddde85f4806497fe2ee68'), (NULL, 'Clara', 'http://media.sonicscanf.org//gallery/sonic-the-hedgehog/Sonic%20X%20-%20Logo.png', 'clara', 'bfbe36be5e6e57dc41d1cfa80f92e52227a348fbcbd1904cbb0e3810e5d65f29b8a3771210e3925a134216b798fdc202af1e49f2799fbe54cdaff97efd59516b');";
							if (!mysqli_query($db, $queries))
								$error = 'Impossible to create tables : ' . mysqli_error($db);

							if (empty($error))
								$messages[] = 'Tables filled.';
						}
					}
				}
			}
		}
	}
	else
		$error = 'You left some fields blank. Help us here, dude.';
}

?>
<html>
	<head>
		<title>Installation</title>
		<link rel="stylesheet" type="text/css" href="style/install.css">
	</head>
	<body>
		<header>
			<h1 class="welcome">
				<?php if (isset($error) && empty($error)) : ?>
				<a href="index.php" title="home">OMFP - Oh My Fucking Project !</a>
				<?php else : ?>
				<a href="install.php" title="home">OMFP - Oh My Fucking Project !</a>
				<?php endif; ?>
			</h1>
		</header>
		<div class="container">
			<div>
				<h1 class="title">
					Install Wizard.
				</h1>
				<?php if (!isset($error)) : ?>
				<p style='text-align:left; padding:12px'>
					Please type your ID datas.
				</p>
				<?php endif; ?>
				<?php if (isset($messages) && count($messages) > 0) : ?>
					<ul class="check">
						<?php foreach ($messages as $message) : ?>
							<li>
								<?= $message ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<?php if (!empty($error)) : ?>
				<p class="error">
					<?= $error ?>
				</p>
				<?php elseif (isset($error)) : ?>
				<p class="success">
					All went well ! <a href="index.php">Start Playing.</a>
				</p>
				<?php endif; ?>
				<?php if (!isset($error) || !empty($error)) : ?>
					<form action="" method="POST" class="content">
						<p>
							<label for="db_host">Host :</label>
							<input type="text" name="db_host" id="db_host" value="localhost" size="42">
						</p>
						<p>
							<label for="username">Login :</label>
							<input type="text" name="username" id="username" value="root" size="42">
						</p>
						<p>
							<label for="password">Password :</label>
							<input type="password" name="password" id="password" size="42">
						</p>
						<p>
							<label for="db_name">DB_Name :</label>
							<input type="text" name="db_name" id="db_name" value="battle" size="42">
						</p>
						<p>
							<input type="submit" name="submit" value="Start installation" class="submit">
						</p>
					</form>
				<?php endif; ?>
	</body>
</html>
