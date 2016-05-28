<?php

class Model {
    public $db;

    public function __construct() {
        $this->connectDB();
    }

    public function connectDB() {
        $this->db = new mysqli(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME);
        
        if ($this->db->connect_error) {
            die('Can\'t connect to database ' . $this->db->connect_errno . ') '
                    . $this->db->connect_error);
        }
    }
}