<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Reportadas_model");
		$this->load->model("Cerradas_model");
		$this->load->model("Asignadas_model");
		$this->load->model("Diagnosticadas_model");
		$this->load->model("Resultadas_model");
	}

	public function index(){

		$data = array(
			"reportadas" => $this->Reportadas_model->getReportadasVista(),
			"rcerradas" => $this->Cerradas_model->getReportadasCerradas(),
			"rasignadas" => $this->Asignadas_model->getAsignadasVista(),
			"rdiagnostico" => $this->Diagnosticadas_model->getDiagnosticadasVista(),
			"rresueltas" => $this->Resultadas_model->getResueltasVista(),

		);

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/dashboard",$data);
		$this->load->view("layouts/footer");
	}
}
