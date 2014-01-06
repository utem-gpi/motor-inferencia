<?php

class Resultado_model extends CI_Model {

	function __construct() {
		$consolidado_perfil
=<<<"EOT"
		CREATE TEMPORARY VIEW consolidado_perfil AS 
		SELECT
			perfil.id AS id_perfil,
			parametro.id AS id_parametro,
			perfil.nombre AS perfil,
			parametro.nombre AS parametro,
			(CASE WHEN rango.min + exclusividad.min > 0.000 THEN rango.min + exclusividad.min ELSE 0.000 END) AS min,
			(CASE WHEN rango.max + exclusividad.max < 1.000 THEN rango.max + exclusividad.max ELSE 1.000 END) AS max
		FROM descriptor_perfil
		JOIN rango ON descriptor_perfil.id_rango = rango.id
		JOIN exclusividad ON descriptor_perfil.id_exclusividad = exclusividad.id
		JOIN perfil ON descriptor_perfil.id_perfil = perfil.id
		JOIN parametro ON rango.id_parametro = parametro.id
EOT;

		$consolidado_postulante
=<<<"EOT"
		CREATE TEMPORARY VIEW consolidado_postulante AS
		SELECT
			postulante.id AS id_postulante,
			perfil.id AS id_perfil,
			parametro.id AS id_parametro,
			postulante.nombre AS postulante,
			perfil.nombre AS perfil,
			parametro.nombre AS parametro,
			AVG(descriptor_alternativa.nivel * 2.500 / 100.000) + 0.500 AS nivel
		FROM descriptor_postulante
		JOIN descriptor_alternativa ON descriptor_postulante.id_alternativa = descriptor_alternativa.id_alternativa
		JOIN postulante ON descriptor_postulante.id_postulante = postulante.id
		JOIN perfil ON postulante.id_perfil = perfil.id
		JOIN parametro ON descriptor_alternativa.id_parametro = parametro.id
		GROUP BY postulante.id, parametro.id
EOT;

		$consolidado_detalle
=<<<"EOT"
		CREATE TEMPORARY VIEW consolidado_detalle AS
		SELECT
			perfil.id AS id_perfil,
			parametro.id AS id_parametro,
			postulante.id AS id_postulante,
			perfil.nombre AS perfil,
			parametro.nombre AS parametro,
			postulante.nombre AS postulante,
			consolidado_perfil.min AS min,
			consolidado_perfil.max AS max,
			consolidado_postulante.nivel AS nivel,
			(CASE WHEN consolidado_postulante.nivel >= consolidado_perfil.min AND consolidado_postulante.nivel <= consolidado_perfil.max THEN 1 ELSE 0 END) AS match
		FROM consolidado_postulante
		JOIN consolidado_perfil ON (consolidado_postulante.id_perfil = consolidado_perfil.id_perfil AND consolidado_postulante.id_parametro = consolidado_perfil.id_parametro)
		JOIN perfil ON consolidado_perfil.id_perfil = perfil.id
		JOIN parametro ON consolidado_perfil.id_parametro = parametro.id
		JOIN postulante ON consolidado_postulante.id_postulante = postulante.id
EOT;

		$consolidado_resumen
=<<<"EOT"
		CREATE TEMPORARY VIEW consolidado_resumen AS
		SELECT
			perfil.id AS id_perfil,
			parametro.id AS id_parametro,
			postulante.id AS id_postulante,
			perfil.nombre AS perfil,
			parametro.nombre AS parametro,
			postulante.nombre AS postulante,
			consolidado_postulante.nivel AS nivel,
			AVG((CASE WHEN consolidado_postulante.nivel >= consolidado_perfil.min AND consolidado_postulante.nivel <= consolidado_perfil.max THEN 1 ELSE 0 END)) AS match
		FROM consolidado_postulante
		JOIN consolidado_perfil ON (consolidado_postulante.id_perfil = consolidado_perfil.id_perfil AND consolidado_postulante.id_parametro = consolidado_perfil.id_parametro)
		JOIN perfil ON consolidado_perfil.id_perfil = perfil.id
		JOIN parametro ON consolidado_perfil.id_parametro = parametro.id
		JOIN postulante ON consolidado_postulante.id_postulante = postulante.id
		GROUP BY consolidado_postulante.id_postulante, consolidado_perfil.id_perfil
EOT;

		$this->db->query($consolidado_perfil);
		$this->db->query($consolidado_postulante);
		$this->db->query($consolidado_detalle);
		$this->db->query($consolidado_resumen);		
	}
	
	public function getDetailByPostulante($id) {
		return $this->db->where('id_postulante', $id)->get('consolidado_detalle')->result();
	}
	
	public function getSummaryByPostulante($id) {
		$resumen = $this->db->where('id_postulante', $id)->get('consolidado_resumen');
		$result = $resumen->result();
		return ($resumen->num_rows() == 0)? null : $result[0];
	}
	
	public function getPostulantes() {
		$postulantes = $this->db->get('postulante')->result();
		foreach($postulantes as $item) {
			$summary = $this->getSummaryByPostulante($item->id);
			$item->match = ($summary)? $summary->match : null;
			$result = $this->db->where('id', $item->id_perfil)->get('perfil')->result();
			$item->perfil = $result[0];
		}
		return $postulantes;
	}
	
}