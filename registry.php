<?php 

class Registry {
    private $vars = [];

    public function set($key, $var) {
        if (isset($this->vars[$key]) == true) {
                throw new Exception('Unable to set var `' . $key . '`. Already set.');
        }
        $this->vars[$key] = $var;
        return true;
    }

    public function get($key) {
        if (isset($this->vars[$key]) == false) {
                return null;
        }
        return $this->vars[$key];
    }

    public function remove($var) {
        unset($this->vars[$key]);
    }
}