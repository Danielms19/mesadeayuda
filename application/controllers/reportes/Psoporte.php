<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Psoporte extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Psoporte_model");
	}

	public function index(){
		$anios = $this->Psoporte_model->getAnios();
		if($this->input->post("buscar")){
			if($this->input->post('anios')){
				$anios = $this->input->post('anios');
				$psoporte24 = $this->Psoporte_model->getPsoporteAnios($anios);
				}
		}else{
			$psoporte24 = $this->Psoporte_model->getPsoporte();
		}
		$data = array(
			"psoporte24" => $psoporte24,
			"anios" => $anios,
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportes/psoporte24",$data);
		$this->load->view("layouts/footer");
	}
}
