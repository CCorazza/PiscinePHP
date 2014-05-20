
<p id="move_points">
<?php 
	echo ($_SESSION['move_left'] % 100);
?>
</p>
<p id="inertie"></p>
<form method="POST" action="index.php">
	<input type="submit" name="dir" value="Haut" class="gaming"/><br />
	<input type="submit" name="dir" value="Gauche" class="gaming"/>
	<input type="submit" name="dir" value="Droite" class="gaming"/><br />
	<input type="submit" name="dir" value="Bas" class="gaming"/>
</form>
