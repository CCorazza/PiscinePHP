<?php

class Vertex
{
	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 1.0;
	private $_color = 0;
	public static $verbose = FALSE;


	public static function doc() { return (file_get_contents('./Vertex.doc.txt')) ; }
	public function __toString(){ 
		if (self::$verbose === TRUE)
			return (sprintf ('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )', $this->_x, $this->_y, $this->_z, $this->_w, $this->_color) ) ; 
		else if (self::$verbose === FALSE)
			return (sprintf ('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )', $this->_x, $this->_y, $this->_z, $this->_w) ) ;
	}

// Getter, Setter, and their error selves

	public function getX() {return $this->_x;}
	public function getY() {return $this->_y;}
	public function getZ() {return $this->_z;}
	public function getW() {return $this->_w;}
	public function getColor() {return $this->_color;}

	public function setX($val) { $this->_x = clone $val; return;}
	public function setY($val) { $this->_y = clone $val; return;}
	public function setZ($val) { $this->_z = clone $val; return;}
	public function setW($val) { $this->_w = clone $val; return;}
	public function setColor(Color $val) { $this->_color = clone $val; return;}

	public function __get( $att ){ return "trying to access \' " .$att. "\', please visit Greece".PHP_EOL; }
	public function __set( $att, $value ){ return "trying to set '$att' at " .$value. ", please visit Greece again".PHP_EOL; }


// Constructor & Destructor 

	public function __construct( array $kwargs )
	{
		$this->_x = $kwargs['x'] ;
		$this->_y = $kwargs['y'] ;
		$this->_z = $kwargs['z'] ;
		if (array_key_exists('w', $kwargs)) 
			$this->_w = $kwargs['w'] ;	
		if (array_key_exists('color', $kwargs) )
			$this->_color = $kwargs['color'];
		else
			$this->_color = new Color( array( 'red' => 255, 'green' => 255 ,'blue' => 255 ) );
		 if (self::$verbose === TRUE)
			echo $this.' constructed'.PHP_EOL;
		return ;
	}

	public function __destruct()
	{
		if (self::$verbose === TRUE)
			echo $this.' destructed'.PHP_EOL;
		return ;
	}
}
?>