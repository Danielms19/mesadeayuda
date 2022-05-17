<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Graficos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}

		$this->load->model("Graficos_model");
	}
	public function index()
	{

		$data = array(
			"cantTecnicos" => $this->Graficos_model->rowCount1("tecnicos"),
			"cantSolicitudes" => $this->Graficos_model->rowCount2(),
			"years" => $this->Graficos_model->years(),
		);

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportes/graficos",$data);
		$this->load->view("layouts/footer");

	}

	
	public function getData(){
		$year = $this->input->post("year");
		$resultados = $this->Graficos_model->montos($year);
		echo json_encode($resultados);
	}


}
