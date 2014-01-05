<?php

class Descriptor_model extends CI_Model {
    public function get() {
        return $this->db->get('descriptor_perfil')->result();
    }
}