<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Natendidas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Natendidas_model");
	}

	public function index(){
		$anios = $this->Natendidas_model->getAnios();
		if($this->input->post("buscar")){
			if($this->input->post('anios')){
				$anios = $this->input->post('anios');
				$natendidas24 = $this->Natendidas_model->getNatendidasAnios($anios);
				}
		}else{
			$natendidas24 = $this->Natendidas_model->getNatendidas();
		}
		$data = array(
			"natendidas24" => $natendidas24,
			"anios" => $anios,
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportes/natendidas24",$data);
		$this->load->view("layouts/footer");
	}
}
