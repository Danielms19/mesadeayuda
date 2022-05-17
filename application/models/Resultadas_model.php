<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resultadas_model extends CI_Model {

	public function getResultadas(){
        $this->db->select("s.*,as.*,ts.*,d.*,rs.*");
        $this->db->from("asignaciones as");
        $this->db->join("solicitudes s", "as.solicitudes_id_solicitud = s.id_solicitud");
        $this->db->join("diagnosticos d", "as.id_asignacion = d.asignaciones_id_asignacion");
        $this->db->join("tecnicos ts", "as.tecnicos_id_tecnico = ts.id_tecnico");
        $this->db->join("resolutivos rs", "rs.asignaciones_id_asignacion = as.id_asignacion");
        $this->db->where("s.sl_estado","4");
        $this->db->order_by("s.sl_fecha_proceso", "desc"); 
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

    public function getSoporte(){
		$this->db->select("*");
        $this->db->from("tipos_soporte");
        $this->db->where("estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
    }

    public function getResueltasVista(){
		$this->db->select("s.*,as.*,ts.*,d.*,rs.*");
        $this->db->from("asignaciones as");
        $this->db->join("solicitudes s", "as.solicitudes_id_solicitud = s.id_solicitud");
        $this->db->join("diagnosticos d", "as.id_asignacion = d.asignaciones_id_asignacion");
        $this->db->join("tecnicos ts", "as.tecnicos_id_tecnico = ts.id_tecnico");
        $this->db->join("resolutivos rs", "rs.asignaciones_id_asignacion = as.id_asignacion");
        $this->db->where("s.sl_estado","4");
        $this->db->order_by("s.sl_fecha_proceso", "desc"); 
		$this->db->limit(6);
		$resultados = $this->db->get();
		return $resultados->result();
    }

    public function getResuelta($id_asignacion,$id_solicitud,$id_resolutivo){
        $query= $this->db->select('*')
				->from("solicitudes sl")
      			->join("asignaciones asg", "asg.solicitudes_id_solicitud = sl.id_solicitud")
					->join('diagnosticos dg', 'dg.asignaciones_id_asignacion = asg.id_asignacion')
					->join('resolutivos rs', 'rs.asignaciones_id_asignacion = asg.id_asignacion')
					->join('tipos_soporte ts', 'ts.id_tipo_soporte = sl.tipos_soporte_id_tipo_soporte')
					->join('tecnicos tc', 'tc.id_tecnico = asg.tecnicos_id_tecnico')
                    ->where(array("sl.id_solicitud"=>$id_solicitud,"asg.id_asignacion"=>$id_asignacion))
                    ->order_by('sl.sl_fecha_proceso', 'DESC')
					->get();

        return $query->result();
    }

    public function updateResolutivo($data,$id_resolutivo){
		$this->db->where('id_resolutivo', $id_resolutivo);
		$this->db->update('resolutivos', $data); 
		
		return $id_resolutivo;
    }
    
    public function updateSolicitud($data,$id_solicitud){
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


    public function insertSolicitud($ts_nombre,$sl_descripcion,$sl_fecha_proceso,$rs_fecha_resolutivo,$cantidad,$tc_dni)
    {
    	//conectar base de datos externa
        $BD_ACTIVIDADES = $this->load->database('db_control_actividades_dacl',TRUE);
        $BD_ACTIVIDADES->query("CALL registrarActividades('$ts_nombre','$sl_descripcion','$sl_fecha_proceso','$rs_fecha_resolutivo','$cantidad','$tc_dni')");

    }

}
