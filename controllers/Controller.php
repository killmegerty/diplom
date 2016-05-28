<?php


class Controller {
    public $registry;

    public function __construct($registry) {
        $this->registry = $registry;
    }

    public function redirect($path) {
        header( 'Location: ' .$path );
        exit();
    }
}