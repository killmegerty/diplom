<?php

class Model_user extends Model {

    public function getAllUsers() {
        $result = $this->db->query("SELECT * from users");

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function getUserByLogin($login) {
        $result = $this->db->query("SELECT * from users where login='" . $login . "'" );

        if ($result) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    
    public function addUser($data) {

        $sql = "INSERT INTO users (name, surname, otchestvo, DOB, department_id, profession_id, role_id, login, password)
            VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')";
            
        $sql = sprintf($sql, $data['name'], $data['surname'], $data['otchestvo'], $data['DOB'], $data['department_id'],
            $data['profession_id'], $data['role_id'], $data['login'], $data['password']);
            
        $result = $this->db->query($sql);
        if ($result) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

}