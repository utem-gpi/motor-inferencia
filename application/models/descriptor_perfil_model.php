<?php

class Descriptor_perfil_model extends CI_Model {
    public function get() {
        return $this->db->get('descriptor_perfil')->result();
    }
	
	public function getByPerfil($id) {
		return $this->db->where('id_perfil', $id)->get('descriptor_perfil')->result();
	}
	
	public function setByPerfil($data, $id) {
		$this->db->where('id_perfil', $id)->delete('descriptor_perfil');
		foreach($data as $item) {
			$this->db->insert('descriptor_perfil', array_merge(array('id_perfil' => $id), $item));
		}
	}
}