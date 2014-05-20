<?php

if (isset($_POST['dirfire']))
{
	if ($_SESSION['whoplay'] == 1)
	{
		if ($_SESSION['fleet1']->ships[0]->useWeapon($_POST['dirfire']) == TRUE)
			$_SESSION['msg'] .= $_SESSION['player1']->getName()." : BOUM BADABOUM !<br />";
		else
			$_SESSION['msg'] .= $_SESSION['player2']->getName()." vous insulte : Ma mamie tire mieux que toi !<br />";
		$_SESSION['fire'] +=1;
		if ($_SESSION['fleet2']->ships[0]->pcoque == 0)
		{
			$_SESSION['EndGame'] = TRUE;
			$_SESSION['win1'] = TRUE;
		}
	}
	else if ($_SESSION['whoplay'] == 2)
	{
		if ($_SESSION['fleet2']->ships[0]->useWeapon($_POST['dirfire']) == TRUE)
			$_SESSION['msg'] .= $_SESSION['player2']->getName()." : BOUM BADABOUM !<br />";
		else
			$_SESSION['msg'] .= $_SESSION['player1']->getName()." vous insulte : Ma mamie tire mieux que toi !<br />";
		$_SESSION['fire'] += 1;
		if ($_SESSION['fleet1']->ships[0]->pcoque == 0)
		{
			$_SESSION['EndGame'] = TRUE;
			$_SESSION['win2'] = TRUE;
		}
	}

	$_SESSION['whoplay'] = $_SESSION['whoplay'] == 1 ? 2 : 1;
	if ($_SESSION['fire'] == 2){
		$_SESSION['phase'] = 1;
		$_SESSION['fire'] = 0;
	}
}



?>