<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitudes extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Solicitudes_model");	
	}

	public function index()
	{
		$data  = array(
			'solicitudes' => $this->Solicitudes_model->getSolictudes(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/solicitudes/list",$data);
		$this->load->view("layouts/footer");

	}


	public function add(){
		$data  = array(
			'tsoporte' => $this->Solicitudes_model->getSoportePadre(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/solicitudes/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		$ts_padre = $this->input->post("ts_padre");
		$ts_nombre = $this->input->post("ts_nombre");

		$this->form_validation->set_rules("ts_nombre","Nombre del soporte","required");
		$this->form_validation->set_rules("ts_padre","Tipo de soporte","required");

		if ($this->form_validation->run()) {

			$data  = array(
				'ts_nombre' => $ts_nombre, 
				'ts_padre' => $ts_padre, 
				'estado' => "1"
			);

			if ($this->Solicitudes_model->save($data)) {
				redirect(base_url()."administrador/solicitudes");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."administrador/solicitudes/add");
			}
		}
		else{
			/*redirect(base_url()."mantenimiento/categorias/add");*/
			$this->add();
		}
	}

	public function edit($id){
		$data  = array( 
			'tsoporte' => $this->Solicitudes_model->getSoportePadre(), 
			'soli' => $this->Solicitudes_model->getSolicitud($id) 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/solicitudes/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$id_tipo_soporte=$this->input->post("id_tipo_soporte");
		$ts_nombre = $this->input->post("ts_nombre");
		$ts_padre = $this->input->post("ts_padre");

		$usuarioActual = $this->Solicitudes_model->getSolicitud($id_tipo_soporte);


		$this->form_validation->set_rules("ts_nombre","Nombre del soporte","required");
		$this->form_validation->set_rules("ts_padre","Tipo de soporte","required");


		if ($this->form_validation->run()) {

			$data  = array(
				'ts_nombre' => $ts_nombre, 
				'ts_padre' => $ts_padre
			);

			if ($this->Solicitudes_model->update($id_tipo_soporte,$data)) {
				redirect(base_url()."administrador/solicitudes");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."administrador/solicitudes/edit/".$id_tipo_soporte);
			}
		}
		else{
			/*redirect(base_url()."mantenimiento/categorias/add");*/
			$this->add($id_tipo_soporte);
		}
	}

	public function activar($id){
		$data  = array(
			'estado' => "1"
		);
		$this->Solicitudes_model->update($id,$data);

		echo "administrador/solicitudes";
	}

	public function delete($id){
		$data  = array(
			'estado' => "0"
		);
		$this->Solicitudes_model->update($id,$data);

		echo "administrador/solicitudes";
	}

}