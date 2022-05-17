<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Roles_model");
	}

	public function index(){
		$data  = array(
			'roles' => $this->Roles_model->getCategorias(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/roles/list",$data);
		$this->load->view("layouts/footer");
	}

	public function add(){
		$data  = array(
			'roles' => $this->Roles_model->getCategorias(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/roles/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		$nombres = $this->input->post("nombres");
		$apellidos = $this->input->post("apellidos");
		$telefono = $this->input->post("telefono");
		$email = $this->input->post("email");
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$rol = $this->input->post("rol");

		$this->form_validation->set_rules("username","Usuario","required|is_unique[roles.username]");
		$this->form_validation->set_rules("password","Contraseña","required");
		$this->form_validation->set_rules("nombres","Nombres","required");
		$this->form_validation->set_rules("apellidos","Apellidos","required");
		$this->form_validation->set_rules("email","Email","required|is_unique[roles.email]");

		if ($this->form_validation->run()) {

			$data  = array(
				'nombres' => $nombres, 
				'apellidos' => $apellidos, 
				'telefono' => $telefono, 
				'email' => $email, 
				'username' => $username, 
				'password' => $password, 
				'rol_id' => $rol, 
				'estado' => "1"
			);

			if ($this->Roles_model->save($data)) {
				redirect(base_url()."administrador/roles");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."administrador/roles/add");
			}
		}
		else{
			/*redirect(base_url()."mantenimiento/categorias/add");*/
			$this->add();
		}
	}

	public function view(){
		$idusuario = $this->input->post("idusuario");
		$data = array(
			"usuario" => $this->Roles_model->getUsuario($idusuario)
		);
		$this->load->view("admin/roles/view",$data);
	}

	public function edit($id){
		$data  = array(
			'roles' => $this->Roles_model->getRoles(), 
			'usuario' => $this->Roles_model->getUsuario($id)
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/roles/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idusuario=$this->input->post("idusuario");
		$nombres = $this->input->post("nombres");
		$apellidos = $this->input->post("apellidos");
		$telefono = $this->input->post("telefono");
		$email = $this->input->post("email");
		$username = $this->input->post("username");
		$rol = $this->input->post("rol");

		$usuarioActual = $this->Roles_model->getUsuario($idusuario);

		if ($username == $usuarioActual->username) {
			$is_unique = '';
		}
		else{
			$is_unique = '|is_unique[roles.username]';
		}

		$this->form_validation->set_rules("username","Usuario","required".$is_unique);
		$this->form_validation->set_rules("nombres","Nombres","required");

		if ($this->form_validation->run()) {

			$data  = array(
				'nombres' => $nombres, 
				'apellidos' => $apellidos, 
				'telefono' => $telefono, 
				'email' => $email, 
				'username' => $username,
				'rol_id' => $rol, 
			);

			if ($this->Roles_model->update($idusuario,$data)) {
				redirect(base_url()."administrador/roles");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."administrador/roles/edit/".$idusuario);
			}
		}
		else{
			/*redirect(base_url()."mantenimiento/categorias/add");*/
			$this->add($idusuario);
		}
	}

	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->Roles_model->update($id,$data);
		echo "administrador/roles";
	}

}