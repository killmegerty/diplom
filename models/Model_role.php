<?php

class Model_role extends Model {

    public function getAll() {
        $result = $this->db->query("SELECT * from roles");

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

}