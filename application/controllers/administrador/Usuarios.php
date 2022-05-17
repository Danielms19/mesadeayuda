<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH."third_party/simple_html_dom.php");
error_reporting(E_ALL ^ E_NOTICE);

class Usuarios extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Usuarios_model");
	}

	public function index(){

		$data  = array(
			'tecnicos' => $this->Usuarios_model->getTecnicos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/list",$data);
		$this->load->view("layouts/footer");
	}

	public function add(){
		$data  = array(
			'tipo_soporte' => $this->Usuarios_model->getTiposUsuarios(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/add",$data);
		$this->load->view("layouts/footer");
	}


	public function store(){
		$tc_nombres = $this->input->post("tc_nombres");
		$tc_apellidos = $this->input->post("tc_apellidos");
		$tc_dni = $this->input->post("tc_dni");
		$tipo_soporte = $this->input->post("tipo_soporte");

		$this->form_validation->set_rules("tc_dni","DNI","required".$is_unique);
		$this->form_validation->set_rules("tc_nombres","Nombres","required");
		$this->form_validation->set_rules("tc_apellidos","Apellidos","required");
		$this->form_validation->set_rules("tipo_soporte","Rol","required");

		if ($this->form_validation->run()) {

			$data  = array(
				'tc_nombres' => $tc_nombres, 
				'tc_apellidos' => $tc_apellidos, 
				'tc_dni' => $tc_dni, 
				'tipo_id' => $tipo_soporte, 
				'tc_estado' => "1"
			);

			if ($this->Usuarios_model->save($data)) {
				redirect(base_url()."administrador/usuarios");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."administrador/usuarios/add");
			}
		}
		else{
			/*redirect(base_url()."mantenimiento/categorias/add");*/
			$this->add();
		}
	}


	public function edit($id){
		$data  = array(
			'tipo_soporte' => $this->Usuarios_model->getTiposUsuarios(), 
			'tecnico' => $this->Usuarios_model->getTecnico($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$id_tecnico=$this->input->post("id_tecnico");
		$tc_nombres = $this->input->post("tc_nombres");
		$tc_apellidos = $this->input->post("tc_apellidos");
		$tc_dni = $this->input->post("tc_dni");
		$tipo_soporte = $this->input->post("tipo_soporte");

		$usuarioActual = $this->Usuarios_model->getTecnico($id_tecnico);

		if ($tc_dni == $usuarioActual->tc_dni) {
			$is_unique = '';
		}
		else{
			$is_unique = '|is_unique[tecnicos.tc_dni]';
		}

		$this->form_validation->set_rules("tc_dni","DNI","required".$is_unique);
		$this->form_validation->set_rules("tc_nombres","Nombres","required");
		$this->form_validation->set_rules("tc_apellidos","Apellidos","required");
		$this->form_validation->set_rules("tipo_soporte","Rol","required");

		if ($this->form_validation->run()) {

			$data  = array(
				'tc_nombres' => $tc_nombres, 
				'tc_apellidos' => $tc_apellidos, 
				'tc_dni' => $tc_dni, 
				'tipo_id' => $tipo_soporte, 
			);

			if ($this->Usuarios_model->update($id_tecnico,$data)) {
				redirect(base_url()."administrador/usuarios");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."administrador/usuarios/edit/".$id_tecnico);
			}
		}
		else{
			/*redirect(base_url()."mantenimiento/categorias/add");*/
			$this->add($id_tecnico);
		}
	}

	public function activar($id){
		$data  = array(
			'tc_estado' => "1"
		);
		$this->Usuarios_model->update($id,$data);

		echo "administrador/usuarios";
	}

	public function delete($id){
		$data  = array(
			'tc_estado' => "0"
		);
		$this->Usuarios_model->update($id,$data);

		echo "administrador/usuarios";
	}

}