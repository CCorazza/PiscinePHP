<?php

Class Player {

	public static $created = FALSE;
	public $name;
	public $race;
	public $id;
	public $avatar;
	public $fleet;
	private $_played;

	public function __construct (array $data) {
		$this->name = $data['name'];
		$this->id = $data['id'];
		$this->avatar = $data['avatar'];
	}

	public function __toString () {
		return $this->name;
	}

	public function getName() {
		return $this->name;
	}
		public function getImg() {
		return $this->avatar;
	}
	public function doc() {
		return file_get_contents('doc/Player.doc.txt');
	}
}

?>
