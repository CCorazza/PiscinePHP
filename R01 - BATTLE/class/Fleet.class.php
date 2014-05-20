<?PHP

class								Fleet
{
	static public					$_verbose = false;
	public							$ships = array();

	public function					__construct() {
		if (self::$_verbose)
			print("Fleet created !");
	}

	public function					__destruct() {
		if (self::$_verbose)
			print("Fleet destructed !");
	}

	public function					__toString() {
		return (vsprintf("
			Ships = %s<br/>", array(json_encode($this->ships))));
	}

	public function					add_ship(Ship $ship) {
		$this->ships[] = $ship;
	}
	
	public function 				doc () {
		return file_get_contents('doc/Fleet.doc.txt');
	}
}

?>
