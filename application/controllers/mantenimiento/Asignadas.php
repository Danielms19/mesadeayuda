<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignadas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Asignadas_model");
		date_default_timezone_set('America/Lima');			
		
	}

	public function index()
	{
		$data  = array(
			'asignadas' => $this->Asignadas_model->getAsignadas(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/asignadas/list",$data);
		$this->load->view("layouts/footer");

	}

	public function view(){
		$id_solicitud=$this->input->post("id_solicitud",true);
		$id_asignacion=$this->input->post("id_asignacion",true);

		$data = array(
			"adiagnostico" => $this->Asignadas_model->getAsignar($id_solicitud,$id_asignacion),
		);
		$this->load->view("admin/asignadas/view",$data);
	}

	public function view2(){
		$id_solicitud=$this->input->post("id_solicitud",true);
		$id_asignacion=$this->input->post("id_asignacion",true);
		$data = array(
			"artecnico" => $this->Asignadas_model->getAsignar($id_solicitud,$id_asignacion),
			"atecnico" => $this->Asignadas_model->getTecnico(),	
		);
		$this->load->view("admin/asignadas/view2",$data);
	}

	public function view3(){
		$id_solicitud = $this->input->post("id_solicitud");
		$id_asignacion=$this->input->post("id_asignacion",true);
		$data = array(
			"acierre" => $this->Asignadas_model->getAsignar($id_solicitud,$id_asignacion),	
		);
		$this->load->view("admin/asignadas/view3",$data);
	}


	public function adiagnosticar(){
		$id_solicitud	=	$this->input->post("id_solicitud",true);
		$id_asignacion	=	$this->input->post("id_asignacion",true);
		$dg_descripcion	=	$this->input->post("dg_descripcion",true);
		$fecha = date('Y-m-d H:i:s');

		$this->form_validation->set_rules("dg_descripcion","Descripcion es obligatoria","required");

		if ($this->form_validation->run()){
		$arreglo=array(
			'dg_descripcion'			=>	$dg_descripcion,
			'dg_fecha_diagnostico'		=>	$fecha,
			'asignaciones_id_asignacion'=>	$id_asignacion);

		$id_asignado = $this->Asignadas_model->insertDiagnostico($arreglo);
		//$data = $this->Asignadas_model->getDataCorreoDiagnosticar($id_solicitud);
		//$nuevadata = $data[0];
		//if($nuevadata){
			//$this->sendMailOutlook($nuevadata);
			if($id_asignado){
				$arreglo2 = array(
					'sl_estado' => 3);
				$id_update = $this->Asignadas_model->updatesolicitud($arreglo2,$id_solicitud);
				if($id_update){
					$mensaje["success"]="Se realizo el diagnostico correctamente.";
					$mensaje["estado"]=true;
					$mensaje["url"]=base_url()."mantenimiento/asignadas";
					echo json_encode($mensaje);
				}else{
					$mensaje["error"]="Algo anda mal, se ha rechazo el diagnostico";
					$mensaje["estado"]=false;
					echo json_encode($mensaje);
				}
				}else{
					redirect(base_url()."mantenimiento/asignadas");
				}
		//}
		//else{
			//echo "no cumple validaciones";
		//}
		//} else {
		//	$mensaje["error"] = "rechazado";
		//	$mensaje["estado"] = false;
		//	echo json_encode($mensaje);
		//}
		}
	}


	public function artecnico(){
		$id_solicitud	=	$this->input->post("id_solicitud",true);
		$id_asignacion	=	$this->input->post("id_asignacion",true);
		$id_tecnico	=	$this->input->post("id_tecnico",true);

		$arreglo=array(
			'tecnicos_id_tecnico' => $id_tecnico);

		$id_update = $this->Asignadas_model->updateAsignacion($arreglo,$id_asignacion);
		
		if($id_update){
			$mensaje["success"]="Se realizo la reasignación del técnico correctamente.";
			$mensaje["estado"]=true;
			$mensaje["url"]=base_url()."mantenimiento/asignadas";
			echo json_encode($mensaje);
		}else{
			$mensaje["error"]="Algo anda mal, se ha rechazo la reasignación del técnico.";
			$mensaje["estado"]=false;
			echo json_encode($mensaje);
		}
	}


	public function acierre(){
		$id_solicitud =	$this->input->post("id_solicitud",true);
		$sl_observacion	=	$this->input->post("sl_observacion",true);
		$arreglo=array(
			'sl_observacion' => $sl_observacion,
			'sl_estado'	=> 5);

		$id_cerrado = $this->Asignadas_model->updateSolicitud($arreglo,$id_solicitud);
		//$data = $this->Asignadas_model->getDataCorreoCierre($id_solicitud);
		//$nuevadata = $data[0];
		//if ($nuevadata) {
			//$this->sendMailOutlook($nuevadata);
			if ($id_cerrado) {
				$mensaje["success"] = "Se realizo el cierre correctamente.";
				$mensaje["estado"] = true;
				$mensaje["url"] = base_url() . "mantenimiento/diagnosticadas";
				echo json_encode($mensaje);
			} else {
				$mensaje["error"] = "Algo anda mal, se ha rechazo el cierre.";
				$mensaje["estado"] = false;
				echo json_encode($mensaje);
			}
		//} else{
		//	$mensaje["error"] = "rechazado";
		//	$mensaje["estado"] = false;
		//	echo json_encode($mensaje);
		//}
	}


	//Función para enviar correos en Asignación
	public function sendMailOutlook($data)
    {
        $this->load->library("email");
        $this->email->set_crlf("\r\n");
        $configOutlook = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.live.com',
            'smtp_port' => 25,
            'smtp_timeout' => '60',
            //'smtp_port' => 587,
            'smtp_user' => 'leonardo.delacruz@ugel04.gob.pe',
            'smtp_pass' => 'Atake7522',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'smtp_crypto' => 'tls'
        );

		if($data['sl_estado'] == '5'){
			$data_envio = array(
				'nombres' => $data['sl_nombres'],
				'area' => $data['sl_area'],
				'dni' => $data['sl_dni'],
				'descripcion' => $data['sl_descripcion'],
				'estado' => $data['sl_estado'],
				'fecha_proceso' => $data['sl_fecha_proceso'],
				'observacion' => $data['sl_observacion'],
				'soporte' => $data['ts_nombre'],
				
			);
		} else {
			$data_envio = array(
				'nombres' => $data['sl_nombres'],
				'area' => $data['sl_area'],
				'dni' => $data['sl_dni'],
				'descripcion' => $data['sl_descripcion'],
				'estado' => $data['sl_estado'],
				'fecha_proceso' => $data['sl_fecha_proceso'],
				'observacion' => $data['sl_observacion'],
				'soporte' => $data['ts_nombre'],
				'diagnostico' => $data['dg_descripcion']
				
	
			);
		
		}
			
        $this->email->initialize($configOutlook);
        $this->email->from('leonardo.delacruz@ugel04.gob.pe');
        //$this->email->cc('postulacion.reasignacióndocente@ugel04.gob.pe');
        $this->email->to($data['sl_correo']);
        $this->email->subject('Mesa de Ayuda Virtual');

        $message = $this->load->view('admin/template_correo/template_correo_asignar', $data_envio, true);
        $this->email->message($message);

        for ($i = 1; $i <= 1; $i++) {
            if ($this->email->send()) {
            } else {
                // show_error($this->email->print_debugger());
            }
            sleep(1);
        }
    }
}