<?php
class UnholyFactory {

    private $_recruits;

    public function __construct() { $this->_recruits = array(); }

    public function absorb($obj) 
    {
        if (in_array('Fighter', class_parents($obj))) {
            if (array_key_exists($obj->type, $this->_recruits)) {
                echo "(Factory already absorbed a fighter of type {$obj->type})".PHP_EOL;
            } else {
                $this->_recruits[$obj->type] = clone $obj;
                echo "(Factory absorbed a fighter of type {$obj->type})".PHP_EOL;
            }
        }
        else { echo "(Factory can't absorb this, it's not a fighter)".PHP_EOL; }
    }

    public function fabricate($fighter) {
        $ret = NULL;
        if (array_key_exists($fighter, $this->_recruits))
        {
            $ret = clone $this->_recruits[$fighter];
            echo "(Factory fabricates a fighter of type {$fighter})".PHP_EOL;
        }
        else { echo "(Factory hasn't absorbed any fighter of type {$fighter})".PHP_EOL; }
        return $ret;
    }
}

?>