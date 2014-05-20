<?PHP
	function ft_is_sort($tab){
		$comp = $tab;
		sort($comp);
		return ($comp == $tab);
	}
?>
