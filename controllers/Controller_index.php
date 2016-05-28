<?php

require 'models/Model_user.php';

class Controller_index extends Controller {

    public function index() {
        $modelUser = new Model_user();
        $users = $modelUser->getAllUsers();
        $this->registry->set('users', $users);
    }

    public function login() {
        exit(123);
    }

}