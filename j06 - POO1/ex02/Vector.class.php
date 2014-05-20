<?php

class Vector
{
	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private const _W = 0.0;
	public static $verbose = FALSE;

	public function getX() {return $this->_x;}
	public function getY() {return $this->_y;}
	public function getZ() {return $this->_z;}
	public function getW() {return $this->_W;}

	public function __construct( array $kwargs )
	{
		$this->_x = $kwargs['dest']->_x ;
		$this->_y = $kwargs['dest']->_y ;
		$this->_z = $kwargs['dest']->_z ;
		$this->_W = $kwargs['dest']->_W ;
		if (array_key_exists('orig', $kwargs) )
		{
			$this->_x = $kwargs['orig']->_x ;
			$this->_y = $kwargs['orig']->_y ;
			$this->_z = $kwargs['orig']->_z ;
			$this->_W = $kwargs['orig']->_W ;
		}
		else if (!(array_key_exists('orig', $kwargs) ))
		{
			$this->_x = 0 ;
			$this->_y = 0 ;
			$this->_z = 0 ;
			$this->_W = 1 ;
		}
					echo $this.' constructed'.PHP_EOL;
		return ;
	}

	public function __destruct()
	{
		if (self::$verbose === TRUE)
			echo $this.' destructed'.PHP_EOL;
		return ;
	}

?>