<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Psoporte_model extends CI_Model {



	public function getPsoporte(){
		$query = $this->db->query("
			SELECT nombre, ROUND((100*(SUM(CAST(Q_CUMPLE AS DECIMAL)))) / (SUM(CAST(Q_CUMPLE AS DECIMAL)) + SUM(CAST(Q_NO_CUMPLE AS DECIMAL)))) AS porcentaje, anios
			FROM v_reporte2
			WHERE anios=2021
			GROUP BY nombre;");
        return $query->result();
	}

	public function getPsoporteAnios($anios){
		$query = $this->db->query("
			SELECT nombre, ROUND((100*(SUM(CAST(Q_CUMPLE AS DECIMAL)))) / (SUM(CAST(Q_CUMPLE AS DECIMAL)) + SUM(CAST(Q_NO_CUMPLE AS DECIMAL)))) AS porcentaje, anios
			FROM v_reporte2
			WHERE anios=$anios
			GROUP BY nombre;");
        return $query->result();
	}

	public function getAnios(){
		$query = $this->db->query("
			SELECT anios
			FROM v_reporte1
			GROUP BY anios
			ORDER BY anios DESC;");
        return $query->result();
	}



	
}