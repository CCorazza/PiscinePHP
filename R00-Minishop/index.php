<?php
	session_start();
	include('./config.php');
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/menu.css">
</head>
<div class="connect" display="inline">
<p>Cart |&nbsp<?php Include"./func/basket.php"?></p>
<p><?php Include "./func/connect.php"?></p></div>
<br />
<div class="banner"><h1>The Littlest Shop<br /></h1>
</div><hr />
<div class="menu" height="64px">
<ul id="menu" class="lv1">
	<li><a href="#">Home</a></li>
	<li><a href="#">By Species</a>
	<ul class="lv2">
		<li><a href="#hum">Humans</a></li>
		<li><a href="#animal">Animals</a></li>
	</ul></li>
<li>
	<a href="#">By Countries</a>
	<ul class="lv2">
		<li><a href="#africa">Africa</a>
		<li><a href="#">America</a>
			<ul class="lv3">
			<li><a href="#namerica">North</a></li>
			<li><a href="#samerica">South</a></li>
		</ul></li>
		<li><a href="#asia">Asia</a>
		<li><a href="#euro">Europe</a></li>
	</ul>
</li>
<li>
	<a href="#">Members</a>
	<ul class="lv2">
		<li><a href="#cart">My Cart</a></li>
		<?php if ($_SESSION['Logged'] === TRUE){ ?>
		<li><a href="#profile">Profile</a></li><?php } ?>
		<?php if ($_SESSION['Logged'] !== TRUE){ ?>
		<li><a href="#reg">Register</a></li><?php } ?>
	</ul>
	</li>
<li><a href="#">Plus</a>
	<ul class="lv2">
		<li><a href="mailto:ccorazza@student.42.fr">Contact Us</a></li>
		<li><a href="#team">team</a></li>
	</ul></li>
</ul></div>
<p id="welcome"> Welcome to the shop. Please browse our fine selection of new-borns. </p>
<div id="hum"><?php Include "./catalog/human.php" ?></div>
<div id="animal"><?php Include "./catalog/animals.php" ?></div>
<div id="africa"><?php Include "./catalog/africa.php" ?></div>
<div id="namerica"><?php Include "./catalog/namerica.php" ?></div>
<div id="samerica"><?php Include "./catalog/samerica.php" ?></div>
<div id="asia"><?php Include "./catalog/asia.php" ?></div>
<div id="euro"><?php Include "./catalog/euro.php" ?></div>
<div id="cart" style="text-align:center"> YOUR CART - soon.</div>
<div id="profile"><?php Include "./func/member.php"?> </div>
<div id="reg"> If you wish to register to our client list, please fill in our form. Welcome Aboard ! <?php Include "./func/register.php"?> </div>
<div id="team"> 
	<span><figure>
	<img src="http://www.42.fr/wp-content/themes/42/img/logo42-site.gif" alt="ccorazza">
	<figcaption>geek1. - ccorazza @ 42.</figcaption></figure>
	<figure>
	<img src="http://www.42.fr/wp-content/themes/42/img/logo42-site.gif" alt="sgrivel">
	<figcaption>geek2. - sgrivel @ 42.</figcaption></figure></span>
</div>
</html>