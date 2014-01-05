<?php

class Parametro_model extends CI_Model {
	public function get() {
		$parametros = $this->db->get('parametro')->result();
		foreach($parametros as $item) {
			$item->rangos = $this->db->where('id_parametro', $item->id)->get('rango')->result();
		}
		return $parametros;
	}
	
	public function getByPerfil($id) {
		$parametros = $this->db->get('parametro')->result();
		foreach($parametros as $item) {
			$item->rangos = $this->db->where('id_parametro', $item->id)->get('rango')->result();
			$id_rango_checked = null;
			foreach($item->rangos as $jtem) {
				$jtem->checked = ($this->db->where(array('id_perfil' => $id, 'id_rango' => $jtem->id))->get('descriptor_perfil')->num_rows() == 1);
				if ($jtem->checked)
					$id_rango_checked = $jtem->id;
			}
			$item->exclusividades = $this->db->get('exclusividad')->result();
			foreach($item->exclusividades as $jtem) {
				$jtem->checked = ($this->db->where(array('id_perfil' => $id, 'id_rango' => $id_rango_checked, 'id_exclusividad' => $jtem->id))->get('descriptor_perfil')->num_rows() == 1);
			}
		}
		return $parametros;
	}
	
	public function getByAlternativa($id) {
		$parametros = $this->db->get('parametro')->result();
		foreach($parametros as $item) {
			$descriptor = $this->db->where(array('id_alternativa' => $id, 'id_parametro' => $item->id))->get('descriptor_alternativa');
			if ($descriptor->num_rows() == 1)
				$item->descriptor = $descriptor->result()[0];
		}
		return $parametros;
	}
}