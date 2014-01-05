<?php

class Perfil_model extends CI_Model {
	public function get($id = null) {
		if (is_null($id))
			$retval = $this->db->get('perfil')->result();
		else {
			$retval = $this->db->where('id', $id)->get('perfil')->result();
			$retval = $retval[0];
		}
		return $retval;
	}
	
    public function set($data) {
        $this->db->insert('perfil', $data);
        return $this->db->insert_id();
    }
	
	public function remove($id) {
		$this->db->where('id_perfil', $id)->delete('descriptor_perfil');
		$this->db->where('id', $id)->delete('perfil');
	}
}