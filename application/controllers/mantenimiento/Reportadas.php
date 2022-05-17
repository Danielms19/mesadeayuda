<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportadas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Reportadas_model");
		date_default_timezone_set('America/Lima');
	}

	public function index()
	{
		$data  = array(
			'reportadas' => $this->Reportadas_model->getReportadas(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportadas/list", $data);
		$this->load->view("layouts/footer");
	}

	public function view()
	{
		$id_solicitud = $this->input->post("id_solicitud");
		$data = array(
			"rasignar" => $this->Reportadas_model->getAsignar($id_solicitud),
			"rtecnico" => $this->Reportadas_model->getTecnico(),
		);
		$this->load->view("admin/reportadas/view", $data);
	}



	public function rasignar()
	{
		$id_solicitud =	$this->input->post("id_solicitud", true);
		$id_tecnico	= $this->input->post("id_tecnico", true);
		$fecha = date('Y-m-d H:i:s');
		$arreglo = array(
			'as_fecha_asignacion'		=>	$fecha,
			'solicitudes_id_solicitud'	=>	$id_solicitud,
			'tecnicos_id_tecnico'		=>	$id_tecnico
		);
		$id_asignado = $this->Reportadas_model->insertAsignar($arreglo);
		//$data = $this->Reportadas_model->getDataCorreoAsignacion($id_solicitud);
		//$nuevadata = $data[0];
		//if ($nuevadata) {
			//$this->sendMailOutlook($nuevadata);
			//print_r($nuevadata);
			//echo json_encode($this->email->print_debugger());
			//die();
			//echo json_encode($this->sendMailOutlook($nuevadata));
			if ($id_asignado) {
				$arreglo2 = array(
					'sl_estado' => 2
				);
				$id_update = $this->Reportadas_model->updatesolicitud($arreglo2, $id_solicitud);
				if ($id_update) {
					$mensaje["success"] = "se acepto";
					$mensaje["estado"] = true;
					$mensaje["url"] = base_url() . "mantenimiento/reportadas";
					echo json_encode($mensaje);
				} else {
					$mensaje["error"] = "rechazado";
					$mensaje["estado"] = false;
					echo json_encode($mensaje);
				}
			} else {
				redirect(base_url() . "mantenimiento/reportadas");
			}
		//}else{
		//			$mensaje["error"] = "rechazado";
		//			$mensaje["estado"] = false;
		//			echo json_encode($mensaje);
		//}
	}

	public function view2()
	{
		$id_solicitud = $this->input->post("id_solicitud");
		$data = array(
			"rasignar" => $this->Reportadas_model->getAsignar($id_solicitud),
		);
		$this->load->view("admin/reportadas/view2", $data);
	}

	public function rcierre()
	{
		$id_solicitud =	$this->input->post("id_solicitud", true);
		$sl_observacion	= $this->input->post("sl_observacion", true);
		$arreglo = array(
			'sl_observacion' => $sl_observacion,
			'sl_estado'	=> 5
		);
		$id_cerrado = $this->Reportadas_model->updatesolicitud($arreglo, $id_solicitud);
		//$data = $this->Reportadas_model->getDataCorreoCierre($id_solicitud);
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



		if ($data['sl_estado'] == '5') {
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
				'tec_nombres' => $data['tc_nombres'],
				'tec_apellidos' => $data['tc_apellidos']

			);
		}


		$this->email->initialize($configOutlook);
		$this->email->from('leonardo.delacruz@ugel04.gob.pe');
		//$this->email->cc('postulacion.reasignacióndocente@ugel04.gob.pe');
		$this->email->to($data['sl_correo']);
		$this->email->subject('Mesa de Ayuda Virtual');

		$message = $this->load->view('admin/template_correo/template_correo_asignar', $data_envio, true);
		$this->email->message($message);
		//echo json_encode($this->email->print_debugger());
		//die();

		for ($i = 1; $i <= 1; $i++) {
			if ($this->email->send()) {
			} else {
				// show_error($this->email->print_debugger());
			}
			sleep(1);
		}
	}
}
