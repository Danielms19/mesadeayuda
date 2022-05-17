<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportadas_model extends CI_Model {

	public function getReportadas(){
        $this->db->select("*");
        $this->db->from("solicitudes s");
        $this->db->where("s.sl_estado","1");
		$this->db->order_by("s.sl_fecha_proceso", "desc"); 
		$resultados = $this->db->get();
		return $resultados->result();
    }

    public function getAsignar($id_solicitud){
        $this->db->select("s.*,ts.ts_nombre");
        $this->db->from("solicitudes s");
        $this->db->join("tipos_soporte ts","s.tipos_soporte_id_tipo_soporte = ts.id_tipo_soporte");
        $this->db->where("s.id_solicitud",$id_solicitud);
		$resultados = $this->db->get();
		return $resultados->result();
    }

     public function getTecnico(){
		$this->db->select("*");
        $this->db->from("tecnicos");
        $this->db->where("tc_estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}


    public function getReportadasVista(){
		$this->db->select("*");
        $this->db->from("solicitudes");
        $this->db->where("sl_estado","1");
		$this->db->order_by("sl_fecha_proceso", "desc"); 
		$this->db->limit(6);
		$resultados = $this->db->get();
		return $resultados->result();
	}


	public function insertAsignar($data)
	{
        $this->db->insert('asignaciones',$data);
        return $this->db->insert_id();
    } 

	public function updatesolicitud($data,$id_solicitud)
	{
		$this->db->where('id_solicitud', $id_solicitud);
		$this->db->update('solicitudes', $data); 
		$updated_status = $this->db->affected_rows();

		if($updated_status)
		{
			return $id_solicitud;
		}else{
			return false;
		}
	}

	//Funciones para envio de correos
	public function getDataCorreoAsignacion($id_solicitud){
		$sql = "SELECT s.*,ts.ts_nombre , asig.as_fecha_asignacion , tec.tc_nombres , tec.tc_apellidos FROM solicitudes as s 
		INNER JOIN tipos_soporte as ts ON s.tipos_soporte_id_tipo_soporte = ts.id_tipo_soporte
		INNER JOIN asignaciones as asig ON s.id_solicitud = asig.solicitudes_id_solicitud
		INNER JOIN tecnicos as tec ON asig.tecnicos_id_tecnico = tec.id_tecnico
		WHERE s.id_solicitud = '$id_solicitud'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function getDataCorreoCierre($id_solicitud){
		$this->db->select("s.*,ts.ts_nombre");
        $this->db->from("solicitudes s");
        $this->db->join("tipos_soporte ts","s.tipos_soporte_id_tipo_soporte = ts.id_tipo_soporte");
        $this->db->where("s.id_solicitud",$id_solicitud);
		$resultados = $this->db->get();
		return $resultados->result_array();
	}
}
