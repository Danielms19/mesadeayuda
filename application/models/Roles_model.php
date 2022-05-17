<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles_model extends CI_Model {

	public function getRoles(){
		$this->db->where("estado","1");
		$resultados = $this->db->get("roles");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("roles",$data);
	}
	public function getRol($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("roles");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("roles",$data);
	}
}
