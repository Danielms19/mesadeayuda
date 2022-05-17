<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignadas_model extends CI_Model {

	public function getAsignadas(){
        $this->db->select("*");
        $this->db->from("solicitudes s");
        $this->db->join("asignaciones as", "as.solicitudes_id_solicitud = s.id_solicitud");
        $this->db->join("tecnicos ts", "as.tecnicos_id_tecnico = ts.id_tecnico");
        $this->db->where("s.sl_estado","2");
        $this->db->order_by("s.sl_fecha_proceso", "desc"); 
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function getAsignar($id_solicitud,$id_asignacion){
        $query= $this->db->select('*')
            ->from("solicitudes sl")
            ->join("asignaciones asg", "asg.solicitudes_id_solicitud = sl.id_solicitud")
              ->join('tipos_soporte ts', 'ts.id_tipo_soporte = sl.tipos_soporte_id_tipo_soporte')
              ->join('tecnicos tc', 'tc.id_tecnico = asg.tecnicos_id_tecnico')
              ->where(array("sl.id_solicitud"=>$id_solicitud,"asg.id_asignacion"=>$id_asignacion))
              ->get();
        return $query->result();
    }
    

     public function getTecnico(){
		$this->db->select("*");
        $this->db->from("tecnicos");
        $this->db->where("tc_estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
    }

    public function getAsignadasVista(){
		$this->db->select("s.*,as.*");
        $this->db->from("asignaciones as");
        $this->db->join("solicitudes s", "as.solicitudes_id_solicitud = s.id_solicitud");
        $this->db->where("s.sl_estado","2");
		$this->db->order_by("s.sl_fecha_proceso", "desc");
		$this->db->limit(6);
		$resultados = $this->db->get();
		return $resultados->result();
    }
    
    public function insertDiagnostico($data)
	{
        $this->db->insert('diagnosticos',$data);
        return $this->db->insert_id();
    } 

    public function updateAsignacion($data,$id_asignacion)
	{
		$this->db->where('id_asignacion', $id_asignacion);
		$this->db->update('asignaciones', $data); 
		return $id_asignacion;
    }
    
    public function updateSolicitud($data,$id_solicitud)
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
    // Funciones para el correo
    public function getDataCorreoDiagnosticar($id_solicitud){
        $sql="SELECT s.*,ts.ts_nombre , asig.as_fecha_asignacion , diag.dg_descripcion
        FROM solicitudes as s 
        INNER JOIN tipos_soporte as ts ON s.tipos_soporte_id_tipo_soporte = ts.id_tipo_soporte
        INNER JOIN asignaciones as asig ON s.id_solicitud = asig.solicitudes_id_solicitud
        INNER JOIN diagnosticos as diag ON diag.asignaciones_id_asignacion = asig.id_asignacion
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