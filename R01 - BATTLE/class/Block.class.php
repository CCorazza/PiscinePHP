<?PHP

class								Block
{
	static public					$_verbose = false;
	public							$_sprite;
	public							$_ship;


	public function					__construct() {
		$this->_sprite = "a";
		$this->_ship = "b";
		if (self::$_verbose)
			print("Block created !<br/><br/>");
	}

	public function					__destruct() {
		if (self::$_verbose)
			print("Block destructed !<br/><br/>");
	}

	public function					__toString() {
		return (vsprintf("
			Sprite = %s<br/>
			Ship = %s<br/><br/>", array($this->getSprite(), $this->getShip())));
	}
	
	public function doc() {
		return file_get_contents('doc/Block.doc.txt');
	}
}

?>
