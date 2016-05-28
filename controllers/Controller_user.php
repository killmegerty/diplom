<?php

class Controller_user extends Controller {

    public function index() {
        $this->registry->set('123','sadasd');
    }

    public function login() {
        echo 123;
    }

}