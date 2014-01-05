<?php

class Pregunta_model extends CI_Model {
	public function get($id = null) {
		if (is_null($id))
			$retval = $this->db->get('pregunta')->result();
		else {
			$retval = $this->db->where('id', $id)->get('pregunta')->result();
			$retval = $retval[0];
		}
		return $retval;
	}
	
	public function getByAlternativa($id_alternativa) {
		$alternativa = $this->db->where('id', $id_alternativa)->get('alternativa')->result();
		$alternativa = $alternativa[0];
		$retval = $this->db->where('id', $alternativa->id_pregunta)->get('pregunta')->result();
		$retval = $retval[0];
		return $retval;
	}
	
    public function set($data) {
        $this->db->insert('pregunta', $data);
        return $this->db->insert_id();
    }
	
	public function remove($id) {
		$this->db->where('id_perfil', $id)->delete('descriptor_perfil');
		$this->db->where('id', $id)->delete('perfil');
	}
}