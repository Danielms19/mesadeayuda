<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosticadas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Diagnosticadas_model");

		date_default_timezone_set('America/Lima');
	}

	public function index()
	{
		$data  = array(
			'diagnosticadas' => $this->Diagnosticadas_model->getDiagnosticadas(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/diagnosticadas/list", $data);
		$this->load->view("layouts/footer");
	}

	public function view()
	{
		$id_solicitud = $this->input->post("id_solicitud", true);
		$id_asignacion = $this->input->post("id_asignacion", true);

		$data = array(
			"dresolver" => $this->Diagnosticadas_model->getDiagnosticar($id_solicitud, $id_asignacion),
		);
		$this->load->view("admin/diagnosticadas/view", $data);
	}

	public function view2()
	{
		$id_solicitud = $this->input->post("id_solicitud", true);
		$id_asignacion = $this->input->post("id_asignacion", true);

		$data = array(
			"deditar" => $this->Diagnosticadas_model->getDiagnosticar($id_solicitud, $id_asignacion),
		);
		$this->load->view("admin/diagnosticadas/view2", $data);
	}

	public function view3()
	{
		$id_solicitud = $this->input->post("id_solicitud", true);
		$id_asignacion = $this->input->post("id_asignacion", true);

		$data = array(
			"dcierre" => $this->Diagnosticadas_model->getDiagnosticar($id_solicitud, $id_asignacion),
		);
		$this->load->view("admin/diagnosticadas/view3", $data);
	}

	public function dresolver()
	{
		$id_solicitud	=	$this->input->post("id_solicitud", true);
		$id_asignacion	=	$this->input->post("id_asignacion", true);
		$rs_descripcion	=	$this->input->post("rs_descripcion", true);
		$fecha = date('Y-m-d H:i:s');

		$arreglo = array(
			'rs_descripcion'			=>	$rs_descripcion,
			'rs_fecha_resolutivo'		=>	$fecha,
			'asignaciones_id_asignacion' =>	$id_asignacion
		);

		$id_dresolver = $this->Diagnosticadas_model->insertResolutivo($arreglo);
		//$data = $this->Diagnosticadas_model->getDataCorreoResolucion($id_solicitud);
		//$nuevadata = $data[0];
		//if ($nuevadata) {
			//$this->sendMailOutlook($nuevadata);
			if ($id_dresolver) {
				$arreglo2 = array(
					'sl_estado' => 4
				);
				$id_update = $this->Diagnosticadas_model->updateSolicitud($arreglo2, $id_solicitud);
				if ($id_update) {
					$mensaje["success"] = "Se realizo la resolución correctamente.";
					$mensaje["estado"] = true;

					$mensaje["url"] = base_url() . "mantenimiento/diagnosticadas";
					echo json_encode($mensaje);
				} else {
					$mensaje["error"] = "Algo anda mal, se ha rechazo la resolución";
					$mensaje["estado"] = false;
					echo json_encode($mensaje);
				}
			} else {
				redirect(base_url() . "mantenimiento/diagnosticadas");
			}
		//} else {
		//	$mensaje["error"] = "rechazado";
		//	$mensaje["estado"] = false;
		//	echo json_encode($mensaje);
		//}
	}


	public function deditar()
	{
		$id_solicitud	=	$this->input->post("id_solicitud", true);
		$id_asignacion	=	$this->input->post("id_asignacion", true);
		$id_diagnostico	=	$this->input->post("id_diagnostico", true);
		$dg_descripcion		=	$this->input->post("dg_descripcion", true);

		$arreglo = array(
			'dg_descripcion' => $dg_descripcion
		);
		$id_update = $this->Diagnosticadas_model->updateDiagnostico($arreglo, $id_diagnostico);
		if ($id_update) {
			$mensaje["success"] = "Se realizo la modificación correctamente.";
			$mensaje["estado"] = true;
			$mensaje["url"] = base_url() . "mantenimiento/diagnosticadas";
			echo json_encode($mensaje);
		} else {
			$mensaje["error"] = "Algo anda mal, se ha rechazo la modificación.";
			$mensaje["estado"] = false;
			echo json_encode($mensaje);
		}
	}


	public function dcierre()
	{
		$id_solicitud =	$this->input->post("id_solicitud", true);
		$sl_observacion	=	$this->input->post("sl_observacion", true);
		$arreglo = array(
			'sl_observacion' => $sl_observacion,
			'sl_estado'	=> 5
		);
		$id_cerrado = $this->Diagnosticadas_model->updateSolicitud($arreglo, $id_solicitud);
		//$data = $this->Diagnosticadas_model->getDataCorreoCierre($id_solicitud);
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
				'soporte' => $data['ts_nombre']
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
				'resolutivo' => $data['rs_descripcion']
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
