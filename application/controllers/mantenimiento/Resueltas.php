<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resueltas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Resultadas_model");
		date_default_timezone_set('America/Lima');			
	}

	public function index()
	{
		$data  = array(
			'resultadas' => $this->Resultadas_model->getResultadas(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/resueltas/list",$data);
		$this->load->view("layouts/footer");
	}

	public function view(){
		$id_solicitud=$this->input->post("id_solicitud",true);
		$id_asignacion=$this->input->post("id_asignacion",true);
		$id_resolutivo=$this->input->post("id_resolutivo",true);

		$data = array(
			"rdetalles" => $this->Resultadas_model->getResuelta($id_asignacion,$id_solicitud,$id_resolutivo),
		);
		$this->load->view("admin/resueltas/view",$data);
	}

	public function view2(){
		$id_solicitud=$this->input->post("id_solicitud",true);
		$id_asignacion=$this->input->post("id_asignacion",true);
		$id_resolutivo=$this->input->post("id_resolutivo",true);

		$data = array(
			"reditar" => $this->Resultadas_model->getResuelta($id_asignacion,$id_solicitud,$id_resolutivo),
		);

		$this->load->view("admin/resueltas/view2",$data);
	}

	public function view3(){
		$id_solicitud=$this->input->post("id_solicitud",true);
		$id_asignacion=$this->input->post("id_asignacion",true);
		$id_resolutivo=$this->input->post("id_resolutivo",true);

		$data = array(
			"recierre" => $this->Resultadas_model->getResuelta($id_asignacion,$id_solicitud,$id_resolutivo),
			"rsoporte" => $this->Resultadas_model->getSoporte(),
		);

		$this->load->view("admin/resueltas/view3",$data);
	}



	public function reditar(){
		$id_solicitud	=	$this->input->post("id_solicitud",true);
		$id_asignacion	=	$this->input->post("id_asignacion",true);
		$id_resolutivo	=	$this->input->post("id_resolutivo",true);
		$rs_descripcion		=	$this->input->post("rs_descripcion",true);

		$arreglo = array(
			'rs_descripcion' => $rs_descripcion);

		$id_update = $this->Resultadas_model->updateResolutivo($arreglo,$id_resolutivo);

		if($id_update){
			$mensaje["success"]="Se realizo la modificación correctamente.";
			$mensaje["estado"]=true;
			$mensaje["url"]=base_url()."mantenimiento/resueltas";
			echo json_encode($mensaje);
		}else{
			$mensaje["error"]="Algo anda mal, se ha rechazo la modificación.";
			$mensaje["estado"]=false;
			echo json_encode($mensaje);
		}
	}

	public function recierre(){
		$id_solicitud =	$this->input->post("id_solicitud",true);
		$sl_observacion	=	$this->input->post("sl_observacion",true);

		$ts_nombre	=	$this->input->post("ts_nombre",true);
		$sl_descripcion	=	$this->input->post("sl_descripcion",true);
		$sl_fecha_proceso	=	date("Y-m-d", strtotime($this->input->post("sl_fecha_proceso",true)));
		$rs_fecha_resolutivo	=	date("Y-m-d", strtotime($this->input->post("rs_fecha_resolutivo",true)));
		$cantidad=$this->input->post("cantidad",true);


		$tc_dni	=	$this->input->post("tc_dni",true);

		$arreglo=array(
			'sl_observacion' =>  $sl_observacion,
			'sl_estado'	=> 5);


		$id_cerrado = $this->Resultadas_model->updateSolicitud($arreglo,$id_solicitud);
		$this->Resultadas_model->insertSolicitud($ts_nombre,$sl_descripcion,$sl_fecha_proceso,$rs_fecha_resolutivo,$cantidad,$tc_dni);

		if($id_cerrado){
			$mensaje["success"]="Se realizo el cierre correctamente.";
			$mensaje["estado"]=true;
			$mensaje["url"]=base_url()."mantenimiento/resueltas";
			echo json_encode($mensaje);
		}else{
			$mensaje["error"]="Algo anda mal, se ha rechazo el cierre.";
			$mensaje["estado"]=false;
			echo json_encode($mensaje);
		}
	}


}