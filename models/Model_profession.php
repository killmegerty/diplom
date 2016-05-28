<?php

class Model_profession extends Model {

    public function getAll() {
        $result = $this->db->query("SELECT * from professions");

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

}