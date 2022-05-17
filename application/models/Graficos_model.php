<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Graficos_model extends CI_Model {

	public function years(){
		$this->db->select("YEAR(s.sl_fecha_proceso) as year");
		$this->db->from("solicitudes s");
        $this->db->join("asignaciones as", "as.solicitudes_id_solicitud = s.id_solicitud", 'left');
        $this->db->join("diagnosticos d", "as.id_asignacion = d.asignaciones_id_asignacion", 'left');
        $this->db->join("resolutivos r", "as.id_asignacion = r.asignaciones_id_asignacion", 'left');
        $this->db->join("tecnicos t", "as.tecnicos_id_tecnico = t.id_tecnico",'left');
        $this->db->join("tipos_soporte ts", "ts.id_tipo_soporte = s.tipos_soporte_id_tipo_soporte",'left');
        $this->db->where("s.sl_estado","5");
		$this->db->group_by("year");
		$this->db->order_by("year","desc");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function years2(){
		$this->db->select("YEAR(s.sl_fecha_proceso) as year");
		$this->db->from("solicitudes s");
        $this->db->join("asignaciones as", "as.solicitudes_id_solicitud = s.id_solicitud", 'left');
        $this->db->join("diagnosticos d", "as.id_asignacion = d.asignaciones_id_asignacion", 'left');
        $this->db->join("resolutivos r", "as.id_asignacion = r.asignaciones_id_asignacion", 'left');
        $this->db->join("tecnicos t", "as.tecnicos_id_tecnico = t.id_tecnico",'left');
        $this->db->join("tipos_soporte ts", "ts.id_tipo_soporte = s.tipos_soporte_id_tipo_soporte",'left');
        $this->db->where("s.sl_estado","5");
		$this->db->group_by("year");
		$this->db->order_by("year","desc");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function montos($year){
		$this->db->select("MONTH(s.sl_fecha_proceso) as mes, COUNT(s.sl_estado) as monto");
		$this->db->from("solicitudes s");
        $this->db->join("asignaciones as", "as.solicitudes_id_solicitud = s.id_solicitud", 'left');
        $this->db->join("diagnosticos d", "as.id_asignacion = d.asignaciones_id_asignacion", 'left');
        $this->db->join("resolutivos r", "as.id_asignacion = r.asignaciones_id_asignacion", 'left');
        $this->db->join("tecnicos t", "as.tecnicos_id_tecnico = t.id_tecnico",'left');
        $this->db->join("tipos_soporte ts", "ts.id_tipo_soporte = s.tipos_soporte_id_tipo_soporte",'left');
        $this->db->where("s.sl_estado","5");
		$this->db->where("s.sl_fecha_proceso >=",$year."-01-01");
		$this->db->where("s.sl_fecha_proceso <=",$year."-12-31");
		$this->db->group_by("mes");
		$this->db->order_by("mes");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function montos2($year){
		$query = $this->db->query("
			SELECT ROUND((100*(SUM(CAST(Q_CUMPLE AS DECIMAL)))) / (SUM(CAST(Q_CUMPLE AS DECIMAL)) + SUM(CAST(Q_NO_CUMPLE AS DECIMAL)))) AS porcentaje, anios
			FROM v_grafico2 v
			WHERE v.sl_fecha_proceso>='$year-01-01' and v.sl_fecha_proceso<='$year-12-31';
			");
        return $query->result();
	}

	public function rowCount1($tabla){
		if ($tabla != "tecnicos") {
		}
		$this->db->where("tc_estado","1");
		$resultados = $this->db->get($tabla);
		return $resultados->num_rows();
	}

	public function rowCount2(){
		$this->db->select("*");
        $this->db->from("solicitudes s");
        $this->db->join("asignaciones as", "as.solicitudes_id_solicitud = s.id_solicitud", 'left');
        $this->db->join("diagnosticos d", "as.id_asignacion = d.asignaciones_id_asignacion", 'left');
        $this->db->join("resolutivos r", "as.id_asignacion = r.asignaciones_id_asignacion", 'left');
        $this->db->join("tecnicos t", "as.tecnicos_id_tecnico = t.id_tecnico",'left');
        $this->db->join("tipos_soporte ts", "ts.id_tipo_soporte = s.tipos_soporte_id_tipo_soporte",'left');
        $this->db->where("s.sl_estado","5");
		$resultados = $this->db->get();
		return $resultados->num_rows();
	}




	
}