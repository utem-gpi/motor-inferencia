<?php

class Postulante_model extends CI_Model {
	public function get($id = null) {
		if (is_null($id))
			$retval = $this->db->get('postulante')->result();
		else {
			$retval = $this->db->where('id', $id)->get('postulante')->result();
			$retval = $retval[0];
		}
		return $retval;
	}
	
    public function set($data) {
        $this->db->insert('postulante', $data);
        return $this->db->insert_id();
    }
	
	public function remove($id) {
		$this->db->where('id_postulante', $id)->delete('descriptor_postulante');
		$this->db->where('id', $id)->delete('postulante');
	}
}