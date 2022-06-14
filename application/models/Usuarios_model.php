<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function getTecnicos(){
		$this->db->select("t.*,tp.tu_nombre as rol");
		$this->db->from("tecnicos t");
		$this->db->join("tipos_usuario tp","tp.id_tipo_usuario=t.tipo_id");
		$this->db->where("t.tc_estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getTecnico($id){
		$this->db->select("t.*,tp.tu_nombre as rol");
		$this->db->from("tecnicos t");
		$this->db->join("tipos_usuario tp","tp.id_tipo_usuario=t.tipo_id");
		$this->db->where("t.id_tecnico",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getTiposUsuarios(){
		$resultados = $this->db->get("tipos_usuario");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("tecnicos",$data);
	}

	public function update($id,$data){
		$this->db->where("id_tecnico",$id);
		return $this->db->update("tecnicos",$data);
	}
	
	public function login($username, $password){
		$this->db->where("tc_dni", $username);
		$this->db->where("tc_dni", $password);
		$this->db->where("tc_estado","1");
		
		$resultados = $this->db->get("tecnicos");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	public function exists($username, $name, $lastname) {
		$valid = false;
		try {
			$sql = "SELECT * FROM tecnicos WHERE tc_dni = ?";
			$user = $this->db->query($sql, compact('username'))->row();
			if (!$user) {
				$this->db->insert('tecnicos', [
					'tc_nombres'	=> $name,
					'tc_apellidos' 	=> $lastname,
					'tc_dni' 		=> $username,
					'tc_estado' 	=> 1,
					'tipo_id'		=> 1
				]);
			} else {
				if ($user->tc_estado == 0) {
					$this->db->update('tecnicos', ['tc_estado' => 1], array('id_tecnico' => $user->id_tecnico));
				}
			}
			$valid = true;
		} catch (\Exception $e) {
			$valid = false;
		}
		return $valid;
	}

}
