<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Porcentajes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}

		$this->load->model("Porcentajes_model");
	}
	public function index()
	{
		$data = array(
			"reporte24h" => $this->Porcentajes_model->ratendidas24h(),
			"rsoporte24h" => $this->Porcentajes_model->rsoporte24h(),
			"rsoportet" => $this->Porcentajes_model->rsoportet(),
		);

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportes/porcentajes",$data);
		$this->load->view("layouts/footer");

	}


}
