<?PHP

class							Ship
{
	static public				$_verbose;
	public						$namee;
	public						$x;
	public						$y;

	public function				__construct(array $av) {
		$this->namee = $av['name'];
		$this->x = $av['x'];
		$this->y = $av['y'];
		if (self::$_verbose)
			print("Ship created !");
	}

	public function				__destruct() {
		if (self::$_verbose)
			print("Ship destructed !");
	}

	public function				__toString() {
		return (vsprintf("
			Name = %s <br/>
			X = %d<br/>
			Y = %d<br/>",
			array($this->namee, $this->x, $this->y)));
	}

	public function				moveShip ( $dir ) {
		if ($dir == "Haut")
			$this->x -= 1;
		else if ($dir == "Gauche")
			$this->y -= 1;
		else if ($dir == "Droite")
			$this->y += 1;
		else if ($dir == "Bas")
			$this->x += 1;
		if ($this->x >= 99 || $this->x < 2 || $this->y >= 149 || $this->y < 2)
			$this->pcoque = 0;
	}
	public function doc() {
		return file_get_contents('doc/Ship.doc.txt');
	}
}
?>
