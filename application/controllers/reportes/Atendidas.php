<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atendidas extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
        $this->load->model("Atendidas_model");
    }

	public function index(){
		$fecha_inicio = $this->input->post('fechainicio');
		$fecha_fin = $this->input->post('fechafin');
		$Tecnicos = $this->Atendidas_model->getTecnicos();
		
		if($this->input->post("buscar")){
			if($this->input->post('tecnico')){
				$tecnico = $this->input->post('tecnico');
				if(($this->input->post('fechainicio')) && ($this->input->post('fechainicio'))){
					$rate = $this->Atendidas_model->getAtendidasTecnicoDate($fecha_inicio,$fecha_fin,$tecnico);
				}else{
					$rate = $this->Atendidas_model->getAtendidasTecnico($tecnico);
				}
			}else{
				$rate = $this->Atendidas_model->getAtendidasDate($fecha_inicio,$fecha_fin);
			}
		}else{
			$rate = $this->Atendidas_model->getAtendidas();
		}

		$data = array(
			"rate" => $rate,
			"Tecnicos"	  => $Tecnicos,
			"fechainicio" => $fecha_inicio,
			"fechafin" => $fecha_fin,
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportes/atendidas",$data);
		$this->load->view("layouts/footer");
	}
}
