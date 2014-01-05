<?php

class Rango_model extends CI_Model {
    public function set($data) {
        $this->db->set('rango', $data);
        return $this->db->insert_id();
    }
}