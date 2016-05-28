<?php

class Model_user extends Model {

    public function getAllUsers() {
        $result = $this->db->query("SELECT * from user");

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

}