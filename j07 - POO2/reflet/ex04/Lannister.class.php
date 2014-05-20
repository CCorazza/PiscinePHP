<?php

class Lannister {
	public function sleepWith($class)
	{
		if ( array_key_exists('Lannister', class_parents($class)) ) { echo 'Not even if I\'m drunk !'.PHP_EOL; }
		else
			echo 'Let\'s do this.'.PHP_EOL;
	}

}

?>