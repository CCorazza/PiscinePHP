<?php
class Color
{
	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = FALSE;


	public static function doc() { return (file_get_contents('./Color.doc.txt')) ; }

	public function __toString(){ return (sprintf ('Color( red: % 3d, green: % 3d, blue: % 3d )', $this->red, $this->green, $this->blue) ) ; }
	public function __get( $att ){ return "trying to access \' " .$att. "\', please visit Greece".PHP_EOL; }
	public function __set( $att, $value ){ return "trying to set '$att' at " .$value. ", please visit Greece again".PHP_EOL; }


	public function __construct( array $kwargs )
	{
		$this->kwverif($kwargs);	
		if (self::$verbose === TRUE)
			echo $this.' constructed.'.PHP_EOL;
		return ;
	}

	public function __destruct()
	{
		if (self::$verbose === TRUE)
			echo $this.' destructed.'.PHP_EOL;
		return ;
	}

// Verifications to prevent odd numbers use and transform them into intergers.

	public function verif( $int ){	if ($int >= 0 && $int <= 255) { return $int; } 	}
	public function kwverif(array $kwargs)
	{
		if ((array_key_exists('red', $kwargs)) && $this->verif($kwargs['red']))
			$this->red = intval($kwargs['red'] );
		if (array_key_exists('green', $kwargs) && $this->verif($kwargs['green']) )
			$this->green = intval($kwargs['green']);
		if (array_key_exists('blue', $kwargs) && $this->verif($kwargs['blue']))
			$this->blue = intval($kwargs['blue']);
		if (array_key_exists('rgb', $kwargs) ) {
				$this->red = intval($kwargs['rgb'] >> 16);
				$this->green = intval($kwargs['rgb'] >> 8 & 0xff);
				$this->blue = intval($kwargs['rgb'] & 0xff);
			}
	}

// Operations on instances to modify color outputs.

	public function add(Color $var)
	{
		$red = $this->red + $var->red;
		$green = $this->green + $var->green;
		$blue = $this->blue + $var->blue;
		return (new Color(array('red' => $red, 'green' => $green, 'blue' => $blue)));
	}

	public function sub(Color $var)
	{
		$red = $this->red - $var->red;
		$green = $this->green - $var->green;
		$blue = $this->blue - $var->blue;
		return (new Color(array('red' => $red, 'green' => $green, 'blue' => $blue)));
	}

		public function mult($var)
	{
		$red = $this->red * $var;
		$green = $this->green * $var;
		$blue = $this->blue * $var;
		return (new Color(array('red' => $red, 'green' => $green, 'blue' => $blue)));
	}
}
?>