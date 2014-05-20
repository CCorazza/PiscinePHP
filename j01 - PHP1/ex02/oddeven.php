#!/usr/bin/php
<?php
	function number()
	{
		echo "Entrez un nombre: ";
		$line = fgets(STDIN);
		return ($line);
	}
	while ($number = number())
	{
		$number = trim($number, "\n");
		if (is_numeric($number)) {
			if ($number % 2 == 0) {
				echo "Le chiffre ".$number." est Pair\n";
			} else if ($number % 2 != 0) {
				echo "Le chiffre ".$number." est Impair\n";
			}
		} else {
			echo "'".$number."' n'est pas un chiffre\n";
		}
	}
?>
