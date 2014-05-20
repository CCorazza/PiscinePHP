<?php

if (array_key_exists('validorder', $_POST)){
	unset($_POST['validorder']);
	if ($_SESSION['whoplay'] == 1){
		$_SESSION['pp1'] = array (
			'move' => $_POST['move'], 
			'weapon' => $_POST['weapon'], 
			'repair' => $_POST['repair'], 
			'shield' => $_POST['shield']);
		$_SESSION['msg'] .= $_SESSION['player1']->getName()." : se d&eacute;placera de ".$_POST['move'].", tirera ".$_POST['weapon']." fois, r&eacute;parera son vaisseau ".$_POST['repair']." fois et a d&eacute;pens&eacute; ". $_POST['shield']." points pour se prot&eacute;ger.<br />";
	}
	if ($_SESSION['whoplay'] == 2){
		$_SESSION['pp2'] = array (
			'move' => $_POST['move'], 
			'weapon' => $_POST['weapon'], 
			'repair' => $_POST['repair'], 
			'shield' => $_POST['shield']);
		$_SESSION['msg'] .= $_SESSION['player2']->getName()." : se d&eacute;placera de ".$_POST['move'].", tirera ".$_POST['weapon']." fois, r&eacute;parera son vaisseau ".$_POST['repair']." fois et a d&eacute;pens&eacute; ". $_POST['shield']." points pour se prot&eacute;ger.<br />";
	}
	$_SESSION['whoplay'] = $_SESSION['whoplay'] == 1 ? 2 : 1;
	if (isset($_SESSION['pp1'], $_SESSION['pp2'])){
		$_SESSION['phase'] = 2; 
		unset($_SESSION['pp1']);
		unset($_SESSION['pp2']);
	}
}

?>