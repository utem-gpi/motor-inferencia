<?php

class Alternativa_model extends CI_Model {

	public function get($id = null) {
		if (is_null($id))
			$retval = $this->db->get('alternativa')->result();
		else {
			$retval = $this->db->where('id', $id)->get('alternativa')->result();
			$retval = $retval[0];
		}
		return $retval;
	}

	public function getByPregunta($id) {
		$alternativas = $this->db->where('id_pregunta', $id)->get('alternativa')->result();
		return $alternativas;
	}
	
	public function setByPregunta($data, $id) {
		$this->db->insert('alternativa', array_merge(array('id_pregunta' => $id), $data));
		return $this->db->insert_id();
	}

	public function remove($id) {
		$this->db->where('id', $id)->delete('alternativa');
	}
	
}