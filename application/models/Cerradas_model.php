<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cerradas_model extends CI_Model {

    public function getReportadasCerradas(){
        $this->db->select("*");
        $this->db->from("solicitudes s");
        $this->db->join("asignaciones as", "as.solicitudes_id_solicitud = s.id_solicitud", 'left');
        $this->db->join("diagnosticos d", "as.id_asignacion = d.asignaciones_id_asignacion", 'left');
        $this->db->join("resolutivos r", "as.id_asignacion = r.asignaciones_id_asignacion", 'left');
        $this->db->join("tecnicos t", "as.tecnicos_id_tecnico = t.id_tecnico",'left');
        $this->db->join("tipos_soporte ts", "ts.id_tipo_soporte = s.tipos_soporte_id_tipo_soporte",'left');
        $this->db->where("s.sl_estado","5");
        $this->db->limit(6);
        $this->db->order_by("s.sl_fecha_proceso", "desc"); 
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function getCerradas(){
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

    public function getCerrada($id_solicitud){
        $this->db->select("*");
        $this->db->from("solicitudes s");
        $this->db->join("asignaciones as", "as.solicitudes_id_solicitud = s.id_solicitud", 'left');
        $this->db->join("diagnosticos d", "as.id_asignacion = d.asignaciones_id_asignacion", 'left');
        $this->db->join("resolutivos r", "as.id_asignacion = r.asignaciones_id_asignacion", 'left');
        $this->db->join("tecnicos t", "as.tecnicos_id_tecnico = t.id_tecnico",'left');
        $this->db->join("tipos_soporte ts", "ts.id_tipo_soporte = s.tipos_soporte_id_tipo_soporte",'left');
        $this->db->where("s.id_solicitud",$id_solicitud);
        $this->db->where("s.sl_estado","5");
        $this->db->order_by("s.sl_fecha_proceso", "desc"); 
        $resultados = $this->db->get();
        return $resultados->result();
    }
    

}
