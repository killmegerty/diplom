<?php

class Model_department extends Model {

    public function getAll() {
        $result = $this->db->query("SELECT * from departments");

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

}