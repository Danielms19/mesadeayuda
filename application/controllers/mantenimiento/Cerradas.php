<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cerradas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Cerradas_model");
		date_default_timezone_set('America/Lima');			
	}

	public function index()
	{
		$data  = array(
			'cerradas' => $this->Cerradas_model->getCerradas(),
			
		);
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/cerradas/list",$data);
		$this->load->view("layouts/footer");
	}

	public function view(){
		$id_solicitud = $this->input->post("id_solicitud");
		$data = array(
			"rcerradas" => $this->Cerradas_model->getCerrada($id_solicitud),	
		);
		$this->load->view("admin/cerradas/view",$data);
	}

}