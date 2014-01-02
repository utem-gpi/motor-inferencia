<?php

Class Perfil_model extends CI_Model {
    public function set($data) {
        $this->db->set('perfil', $data);
        return $this->db->insert_id();
    }
};