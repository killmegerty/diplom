<?php

require 'models/Model_user.php';

class Controller_user extends Controller {

    public function index() {
    }

    public function login() {
        $modelUser = new Model_user();
        $user = $modelUser->getUserByLogin($_POST['login']);
        
        if ($user) {
            if ($user['password'] === $_POST['password']) {
                $_SESSION['user'] = $user;
            }
        }
        
        $this->redirect('/');
    }

    public function logout() {
        session_destroy();

        $this->redirect('/');
    }

}