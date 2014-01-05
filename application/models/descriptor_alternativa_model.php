<?php

class Descriptor_alternativa_model extends CI_Model {
    public function get() {
        return $this->db->get('descriptor_alternativa')->result();
    }
	
	public function getByAlternativa($id) {
		return $this->db->where('id_alternativa', $id)->get('descriptor_alternativa')->result();
	}
	
	public function setByAlternativa($data, $id) {
		$this->db->where('id_alternativa', $id)->delete('descriptor_alternativa');
		foreach($data as $key => $item) {
			$this->db->insert('descriptor_alternativa', array_merge(array('id_alternativa' => $id), array('id_parametro' => $key, 'nivel' => $item)));
		}
	}
}