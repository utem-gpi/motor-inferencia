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
	
	public function getByPostulante($id) {
		$preguntas = $this->db->get('pregunta')->result();
		foreach($preguntas as $item) {
			$item->alternativas = $this->db->where('id_pregunta', $item->id)->get('alternativa')->result();
			foreach($item->alternativas as $jtem) {
				$descriptor = $this->db->where(array('id_postulante' => $id, 'id_alternativa' => $jtem->id))->get('descriptor_postulante');
				$jtem->checked = ($descriptor->num_rows() == 1);
			}
		}
		return $preguntas;
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