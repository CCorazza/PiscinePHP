<div>
	<p><img src="http://static.tumblr.com/bf9ee3bbdcd4d3b7985fa61d1115034c/kyb7l82/DqJmhnwet/tumblr_static_tumblr_static_40k_logo.png" id="win"></p>
	<div id="win">
	<?php
	if (isset($_SESSION['win1'])){
		echo "F&eacute;licitations, ", $_SESSION['player1']->getName(), ", vous avez gagn&eacute; !";
		$_SESSION['msg'] .= $_SESSION['player1']->getName()." a gagn&eacute; !!!";
	}
	else if (isset($_SESSION['win2'])){
		echo "F&eacute;licitations, ", $_SESSION['player2']->getName(), ", vous avez gagn&eacute; !";
		$_SESSION['msg'] .= $_SESSION['player2']->getName()." a gagn&eacute; !!!";
	}
	?>
	<audio autoplay="autoplay" preload="auto">
		  <source src="../img/icon/Chocobo.mp3" type="audio/mpeg">
		Your browser does not support the audio element.
	</audio>
	<img src="img/icon/chocobo.gif">
	</div>	
</div>