<?php

class Nightswatch {
	private $recruits;

	public function __construct()
	{
		$this->recruits = array();
	}

	public function recruit($class)
	{
		$this->recruits[] = $class;
	}
	public function fight()
	{
		foreach ($this->recruits as $v)
		{
			if (in_array('IFighter', class_implements($v)))
			{
				$v->fight();
			}
		}
	}

}

?>