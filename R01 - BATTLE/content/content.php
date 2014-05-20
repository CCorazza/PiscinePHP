<?php
if (array_key_exists('register', $_GET)) {
	if ($_GET['register'] == "True")
		include ('includes/register_user.php');
}
else if (!isset($_SESSION['player1'], $_SESSION['player2'])) {
	include('includes/login_user.php');
}
else {

if (!isset($_SESSION['fleet1'], $_SESSION['fleet2'])) {
	$fleet1 = new Fleet();
	$fleet2 = new Fleet();
	$fleet1->add_ship(new Fighter(array('name' => 'toto', 'x' => 3, 'y' => 3)));
	$fleet2->add_ship(new Fighter(array('name' => 'tata', 'x' => 75, 'y' => 121)));
	$_SESSION['fleet1'] = $fleet1;
	$_SESSION['fleet2'] = $fleet2;
}
$board = new Board(array('width' => 150, 'height' => 100));
$board->init_Board();
$board->place_fleet($_SESSION['fleet1']);
$board->place_fleet($_SESSION['fleet2']);
$tab = $board->send_board();
}


if ($_SESSION['fleet1']->ships[0]->pcoque == 0){
	$_SESSION['win2'] = TRUE;
	$_SESSION['EndGame'] = TRUE;
}
else if ($_SESSION['fleet2']->ships[0]->pcoque == 0){
	$_SESSION['win1'] = TRUE;
	$_SESSION['EndGame'] = TRUE;
}

if (isset($_SESSION['EndGame']))
{
	include('win.php');
}
else
{
?>
	<br />
	<table class="motherboard"><tr>
	<td><div id="ply1"> 
	<?php 

	if ($_SESSION['whoplay'] === 1)
		include('content/play.php');
	if (isset($_SESSION['whoplay']) && $_SESSION['whoplay'] === 2)
		include('content/waiting_turn.php');
	?>
	</div></td><td>
	<?php 
	echo '<table id="board">';
		for ($j = 0; $j < 100; $j++)
		{
			print("<tr height=9px>");
			for ($i = 0; $i < 150; $i++)
			{
			if ($tab[$j][$i] === "toto")
				print('<td class="cellboard" id="test" onclick="selectedCell('.$i.', '.$j.')">');
			else if ($tab[$j][$i] === "tata")
				print('<td class="cellboard" id="test2" onclick="selectedCell('.$i.', '.$j.')">');
			else
				print('<td class="cellboard" onclick="selectedCell('.$i.', '.$j.')">');
			print("</td>");
			}
			print("</tr>\n\n\n\n");
		}
	echo '</table>';
	?></td>
	<td>
	<div id="ply2">
	<?php

	if ($_SESSION['whoplay'] === 2)
		include('content/play.php');
	if (isset($_SESSION['whoplay']) && $_SESSION['whoplay'] === 1)
		include('content/waiting_turn.php');

	?>
	</div></td>
	</table>
<?php } ?>
