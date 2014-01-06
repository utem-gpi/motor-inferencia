<?php

class Descriptor_postulante_model extends CI_Model {
    public function get() {
        return $this->db->get('descriptor_postulante')->result();
    }
	
	public function getByPostulante($id) {
		return $this->db->where('id_postulante', $id)->get('descriptor_postulante')->result();
	}
	
	public function setByPostulante($data, $id) {
		$this->db->where('id_postulante', $id)->delete('descriptor_postulante');
		foreach($data as $item) {
			$this->db->insert('descriptor_postulante', array_merge(array('id_postulante' => $id), $item));
		}
	}
}