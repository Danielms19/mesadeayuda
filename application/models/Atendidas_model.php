<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atendidas_model extends CI_Model {

	public function getAtendidas(){
        $this->db->select("*");
		$this->db->from("solicitudes s");
        $this->db->join("asignaciones as", "as.solicitudes_id_solicitud = s.id_solicitud", 'left');
        $this->db->join("diagnosticos d", "as.id_asignacion = d.asignaciones_id_asignacion", 'left');
        $this->db->join("resolutivos r", "as.id_asignacion = r.asignaciones_id_asignacion", 'left');
        $this->db->join("tecnicos t", "as.tecnicos_id_tecnico = t.id_tecnico",'left');
        $this->db->join("tipos_soporte ts", "ts.id_tipo_soporte = s.tipos_soporte_id_tipo_soporte",'left');
        $this->db->where("s.sl_estado","5");
        $this->db->order_by("s.sl_fecha_proceso", "desc"); 
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function getTecnicos(){
		$this->db->select("*");
        $this->db->from("tecnicos");
        $this->db->where("tc_estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function years(){
		$this->db->select("YEAR(sl_fecha_proceso) as year");
		$this->db->from("solicitudes");
		$this->db->group_by("year");
		$this->db->order_by("year","desc");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function montos($year){
		$this->db->select("MONTH(s.sl_fecha_proceso) as mes, SUM(s.sl_estado) as monto");
		 $this->db->from("asignaciones as");
        $this->db->join("solicitudes s", "as.solicitudes_id_solicitud = s.id_solicitud",'left');
		$this->db->where("s.sl_fecha_proceso >=",$year."-01-01");
		$this->db->where("s.sl_fecha_proceso <=",$year."-12-31");
		$this->db->where("s.sl_estado","5");
		$this->db->group_by("mes");
		$this->db->order_by("mes");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getAtendidasDate($fechainicio,$fechafin){
		$this->db->select("*");
        $this->db->from("solicitudes s");
        $this->db->join("asignaciones as", "as.solicitudes_id_solicitud = s.id_solicitud", 'left');
        $this->db->join("diagnosticos d", "as.id_asignacion = d.asignaciones_id_asignacion", 'left');
        $this->db->join("resolutivos r", "as.id_asignacion = r.asignaciones_id_asignacion", 'left');
        $this->db->join("tecnicos t", "as.tecnicos_id_tecnico = t.id_tecnico",'left');
        $this->db->join("tipos_soporte ts", "ts.id_tipo_soporte = s.tipos_soporte_id_tipo_soporte",'left');
        $this->db->where("s.sl_estado","5");
		$this->db->where("s.sl_fecha_proceso >=",$fechainicio);
		$this->db->where("s.sl_fecha_proceso <=",$fechafin);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}

	public function getAtendidasTecnico($tecnico){
		$this->db->select("*");
        $this->db->from("solicitudes s");
        $this->db->join("asignaciones as", "as.solicitudes_id_solicitud = s.id_solicitud", 'left');
        $this->db->join("diagnosticos d", "as.id_asignacion = d.asignaciones_id_asignacion", 'left');
        $this->db->join("resolutivos r", "as.id_asignacion = r.asignaciones_id_asignacion", 'left');
        $this->db->join("tecnicos t", "as.tecnicos_id_tecnico = t.id_tecnico",'left');
        $this->db->join("tipos_soporte ts", "ts.id_tipo_soporte = s.tipos_soporte_id_tipo_soporte",'left');
        $this->db->where("s.sl_estado","5");
		$this->db->where("t.id_tecnico",$tecnico);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}


	public function getAtendidasTecnicoDate($fechainicio,$fechafin,$tecnico){
		$this->db->select("*");
        $this->db->from("solicitudes s");
        $this->db->join("asignaciones as", "as.solicitudes_id_solicitud = s.id_solicitud", 'left');
        $this->db->join("diagnosticos d", "as.id_asignacion = d.asignaciones_id_asignacion", 'left');
        $this->db->join("resolutivos r", "as.id_asignacion = r.asignaciones_id_asignacion", 'left');
        $this->db->join("tecnicos t", "as.tecnicos_id_tecnico = t.id_tecnico",'left');
        $this->db->join("tipos_soporte ts", "ts.id_tipo_soporte = s.tipos_soporte_id_tipo_soporte",'left');
        $this->db->where("s.sl_estado","5");
        $this->db->where("s.sl_fecha_proceso >=",$fechainicio);
		$this->db->where("s.sl_fecha_proceso <=",$fechafin);
		$this->db->where("t.id_tecnico",$tecnico);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}


	// ROL ///

	public function getAtendidasTecnicoRol($tecnico,$rol){
		$this->db->select("*");
        $this->db->from("solicitudes s");
        $this->db->join("asignaciones as", "as.solicitudes_id_solicitud = s.id_solicitud", 'left');
        $this->db->join("diagnosticos d", "as.id_asignacion = d.asignaciones_id_asignacion", 'left');
        $this->db->join("resolutivos r", "as.id_asignacion = r.asignaciones_id_asignacion", 'left');
        $this->db->join("tecnicos t", "as.tecnicos_id_tecnico = t.id_tecnico",'left');
        $this->db->join("tipos_soporte ts", "ts.id_tipo_soporte = s.tipos_soporte_id_tipo_soporte",'left');
        $this->db->where("s.sl_estado","5");
		$this->db->where("t.id_tecnico",$tecnico);
		$this->db->where("s.sl_rol",$rol);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}


	public function getAtendidasTecnicoDateRol($fechainicio,$fechafin,$tecnico,$rol){
		$this->db->select("*");
        $this->db->from("solicitudes s");
        $this->db->join("asignaciones as", "as.solicitudes_id_solicitud = s.id_solicitud", 'left');
        $this->db->join("diagnosticos d", "as.id_asignacion = d.asignaciones_id_asignacion", 'left');
        $this->db->join("resolutivos r", "as.id_asignacion = r.asignaciones_id_asignacion", 'left');
        $this->db->join("tecnicos t", "as.tecnicos_id_tecnico = t.id_tecnico",'left');
        $this->db->join("tipos_soporte ts", "ts.id_tipo_soporte = s.tipos_soporte_id_tipo_soporte",'left');
        $this->db->where("s.sl_estado","5");
        $this->db->where("s.sl_fecha_proceso >=",$fechainicio);
		$this->db->where("s.sl_fecha_proceso <=",$fechafin);
		$this->db->where("t.id_tecnico",$tecnico);
		$this->db->where("s.sl_rol",$rol);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
}