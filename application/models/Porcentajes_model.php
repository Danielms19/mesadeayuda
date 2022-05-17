<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Porcentajes_model extends CI_Model {

	public function ratendidas24h(){
		$query = $this->db->query("
			SELECT ROUND((100*(SUM(CAST(Q_CUMPLE AS DECIMAL)))) / (SUM(CAST(Q_CUMPLE AS DECIMAL)) + SUM(CAST(Q_NO_CUMPLE AS DECIMAL)))) AS porcentaje, anios
			FROM v_reporte1
			GROUP BY anios
			ORDER BY anios DESC;");
        return $query->result();
	}

	public function rsoporte24h(){
		$fecha=date("Y");
		$query = $this->db->query("
			SELECT nombre, ROUND((100*(SUM(CAST(Q_CUMPLE AS DECIMAL)))) / (SUM(CAST(Q_CUMPLE AS DECIMAL)) + SUM(CAST(Q_NO_CUMPLE AS DECIMAL)))) AS porcentaje, anios
			FROM v_reporte2
			WHERE anios=$fecha
			GROUP BY nombre
			LIMIT 6;
			");
        return $query->result();
	}

	public function rsoportet(){
		$query = $this->db->query("
			Select ts.ts_nombre as nombre, COUNT(ts.ts_nombre) as total, YEAR(s.sl_fecha_proceso) as anios
			from solicitudes s
			left JOIN asignaciones asg on asg.solicitudes_id_solicitud=s.id_solicitud
			left JOIN diagnosticos dag on dag.asignaciones_id_asignacion=asg.id_asignacion
			left JOIN resolutivos rs on rs.asignaciones_id_asignacion=asg.id_asignacion
			left join tipos_soporte ts on ts.id_tipo_soporte=s.tipos_soporte_id_tipo_soporte
			where  s.sl_estado=5 and YEAR(s.sl_fecha_proceso)=2021
			GROUP BY nombre, anios
			ORDER BY nombre,total desc
			LIMIT 6;
			");
        return $query->result();
	}




	
}