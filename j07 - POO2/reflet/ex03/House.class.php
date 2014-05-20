<?php

class House{

	protected function introduce(){ print ("House " .static::getHouseName(). " of " .static::getHouseSeat(). " : \" " .static::getHouseMotto()."\"".PHP_EOL); }

	public function getHouseName() {
		return "Name";
	}
	public function getHouseMotto() {
		return "Motto";
	}
	public function getHouseSeat() {
		return "Seat";
	}
}
?>
