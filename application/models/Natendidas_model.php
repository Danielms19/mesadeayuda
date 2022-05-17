<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Natendidas_model extends CI_Model {



	public function getNatendidas(){
		$query = $this->db->query("
			Select ts.ts_nombre as nombre, COUNT(ts.ts_nombre) as total, YEAR(s.sl_fecha_proceso) as anios
			from solicitudes s
			left JOIN asignaciones asg on asg.solicitudes_id_solicitud=s.id_solicitud
			left JOIN diagnosticos dag on dag.asignaciones_id_asignacion=asg.id_asignacion
			left JOIN resolutivos rs on rs.asignaciones_id_asignacion=asg.id_asignacion
			left join tipos_soporte ts on ts.id_tipo_soporte=s.tipos_soporte_id_tipo_soporte
			where  s.sl_estado=5 and YEAR(s.sl_fecha_proceso)=2021
			GROUP BY nombre, anios
			ORDER BY nombre,total asc;
			");
        return $query->result();
	}

	public function getNatendidasAnios($anios){
		$query = $this->db->query("
			Select ts.ts_nombre as nombre, COUNT(ts.ts_nombre) as total, YEAR(s.sl_fecha_proceso) as anios
			from solicitudes s
			left JOIN asignaciones asg on asg.solicitudes_id_solicitud=s.id_solicitud
			left JOIN diagnosticos dag on dag.asignaciones_id_asignacion=asg.id_asignacion
			left JOIN resolutivos rs on rs.asignaciones_id_asignacion=asg.id_asignacion
			left join tipos_soporte ts on ts.id_tipo_soporte=s.tipos_soporte_id_tipo_soporte
			where  s.sl_estado=5 and YEAR(s.sl_fecha_proceso)=$anios
			GROUP BY nombre, anios
			ORDER BY nombre,total asc;
			");
        return $query->result();
	}

	public function getAnios(){
		$query = $this->db->query("
			Select YEAR(s.sl_fecha_proceso) as anios
			from solicitudes s
			left JOIN asignaciones asg on asg.solicitudes_id_solicitud=s.id_solicitud
			left JOIN diagnosticos dag on dag.asignaciones_id_asignacion=asg.id_asignacion
			left JOIN resolutivos rs on rs.asignaciones_id_asignacion=asg.id_asignacion
			left join tipos_soporte ts on ts.id_tipo_soporte=s.tipos_soporte_id_tipo_soporte
			where  s.sl_estado=5
			GROUP BY anios
			ORDER BY anios DESC;");
        return $query->result();
	}




	
}