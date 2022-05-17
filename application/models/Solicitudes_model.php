<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitudes_model extends CI_Model {

	public function getSolictudes(){
		$query = $this->db->query("
			select * from tipos_soporte  t
			where t.ts_padre in (17,27,125)
			;
			");
		return $query->result();
	}

	public function getSolicitud($id){
		$this->db->select("*");
		$this->db->from("tipos_soporte t");
		$this->db->where("t.id_tipo_soporte",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getSoportePadre(){
		$this->db->select("*");
		$this->db->from("tipos_soporte t");
		$this->db->where("t.ts_padre","0");
		$resultados = $this->db->get();
		return $resultados->result();
	}


	public function save($data){
		return $this->db->insert("tipos_soporte",$data);
	}

	public function update($id,$data){
		$this->db->where("id_tipo_soporte",$id);
		return $this->db->update("tipos_soporte",$data);
	}



}
