<div id="container">
	<div id="action">
		<img height=200px src="img/BANANA.png"> 
		</div>
		<div id="consolelog"> 
		<?php if (isset($_SESSION['msg']))
			echo $_SESSION['msg']; ?></div>
	<div id="menu">
		<ul id="menu">
			<li><img src="../img/icon/podium.png" class="icon"></li>
			<li><img src="../img/icon/profile.png" class="icon"></li>
			<li><img src="../img/icon/chat.png" class="icon"></li>
			<li><img src="../img/icon/log.png" class="icon"></li>
		</ul>
	</div>
</div>
