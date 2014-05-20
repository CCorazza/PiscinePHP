<?PHP

require_once("class/Block.class.php");

class							Board
{
	static public 				$_verbose = false;
	private						$_board = array();
	private						$_width;
	private						$_height;


	public function				getBoard() {return $this->_board;}
	public function				getWidth() {return $this->_width;}
	public function				getHeight() {return $this->_height;}


	public function				__construct(array $av) {
		$this->_width = $av["width"];
		$this->_height = $av["height"];
		if (self::$_verbose)
			print("Board created !<br/><br/>");
	}

	public function				__destruct() {
		if (self::$_verbose)
			print("Board destructed !<br/><br/>");
	}

	public function				__toString() {
		return (vsprintf("
			Board = %s<br/>
			Width = %d<br/>
			Height = %d<br/><br/>", array(json_encode($this->_board), $this->getWidth(), $this->getHeight())));
	}

	public function				init_board() {
		for ($j = 0; $j < $this->_height; $j++)
			for ($i = 0; $i < $this->_width; $i++)
				$this->_board[$j][$i] = new Block ();
	}

	public function				send_board() {
		return($this->_board);
	}

	public function				place_fleet(Fleet $fleet) {
		foreach ($fleet->ships as $ship)
		{
			for ($x = -$ship->height / 2; $x < $ship->height / 2; $x++)
				for ($y = -$ship->width / 2; $y < $ship->width / 2; $y++)
					$this->_board[$ship->x + $x][$ship->y + $y] = $ship->namee;
		}
	}
	
	public function doc() {
		return file_get_contents('doc/Board.doc.txt');
	}
}

?>
