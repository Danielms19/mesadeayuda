<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {
	

	public function rowCount($tabla){
		if ($tabla != "conei") {
		}
		
		$resultados = $this->db->get($tabla);
		return $resultados->num_rows();
	}

	public function rowCountF($tabla){
		if ($tabla != $tabla) {
			$this->db->where("codigoficha >=","1");
		}
		
		$resultados = $this->db->get($tabla);
		return $resultados->num_rows();
	}
	
}