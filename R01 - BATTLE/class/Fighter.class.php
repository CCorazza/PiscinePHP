<?PHP

require_once('class/Ship.class.php');

class							Fighter extends Ship
{
	static public				$_verbose = false;
	public						$width = 4;
	public						$height = 4;
	public						$pcoque = 10;

	public function				__construct(array $av) {
		parent::__construct($av);
		if (self::$_verbose)
			print("Fighter created !");
	}

	public function				__destruct() {
		if (self::$_verbose)
			print("Fighter destructed !");
	}

	public function				useWeapon ($dir) {
		if ($this->fireHit($dir) == TRUE)
			if ($_SESSION['whoplay'] == 1)
			{
				$_SESSION['fleet2']->ships[0]->pcoque -= 1;
				return TRUE;
			}
			else if ($_SESSION['whoplay'] == 2)
			{
				$_SESSION['fleet1']->ships[0]->pcoque -= 1;
				return TRUE;
			}
		return FALSE;
	}

	private function			fireHit( $dir ) {
		if ($_SESSION['whoplay'] == 1)
			$target = $_SESSION['fleet2']->ships[0];
		else if ($_SESSION['whoplay'] == 2)
			$target = $_SESSION['fleet1']->ships[0];
		if ($dir == "Haut")
		{
			if ($target->y - 2 <= $this->y && $target->y + 2 >= $this->y && abs($target->x - $this->x) <= 100)
				return TRUE;
		}
		else if ($dir == "Gauche")
		{
			if ($target->x - 2 <= $this->x && $target->x + 2 >= $this->x && abs($target->y - $this->y) <= 100)
				return TRUE;
		}
		else if ($dir == "Droite")
		{
			if ($target->x - 2 <= $this->x && $target->x + 2 >= $this->x && abs($target->y - $this->y) <= 100)
				return TRUE;
		}
		else if ($dir == "Bas")
		{
			if ($target->y - 2 <= $this->y && $target->y + 2 >= $this->y && abs($target->x - $this->x) <= 100)
				return TRUE;
		}
		return FALSE;
	
	}
	
	public function doc() {
		return file_get_contents('doc/Fighter.doc.txt');
	}
}

?>
