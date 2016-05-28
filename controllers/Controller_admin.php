<?php
require 'models/Model_user.php';
require 'models/Model_department.php';
require 'models/Model_profession.php';
require 'models/Model_role.php';

class Controller_admin extends Controller {

    public function index() {
    }

    public function add_user() {
        $modelUsers = new Model_user();
    
        if ($_POST) {
            if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['otchestvo']) && 
                isset($_POST['DOB']) && isset($_POST['department_id']) && isset($_POST['profession_id']) && 
                isset($_POST['role_id']) && isset($_POST['login']) && isset($_POST['password']) &&
                !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['otchestvo']) && 
                !empty($_POST['DOB']) && !empty($_POST['department_id']) && !empty($_POST['profession_id']) && 
                !empty($_POST['role_id']) && !empty($_POST['login']) && !empty($_POST['password']) ) {

                $modelUsers->addUser($_POST);
            }
        }
        
        $modelDepartments = new Model_department();
        $modelProfessions = new Model_profession();
        $modelRoles = new Model_role();
        
        $departments = $modelDepartments->getAll();
        $professions = $modelProfessions->getAll();
        $roles = $modelRoles->getAll(); 
        
        $this->registry->set('departments', $departments);
        $this->registry->set('professions', $professions);
        $this->registry->set('roles', $roles);
    }
    
    public function add_question() {
        
    }

}