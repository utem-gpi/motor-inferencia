<?php

class Exclusividad_model extends CI_Model {
    public function get() {
        return $this->db->get('exclusividad')->result();
    }
}