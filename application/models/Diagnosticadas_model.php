<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosticadas_model extends CI_Model
{

  public function getDiagnosticadas()
  {
    $this->db->select("s.*,as.*,ts.*,d.*");
    $this->db->from("asignaciones as");
    $this->db->join("solicitudes s", "as.solicitudes_id_solicitud = s.id_solicitud");
    $this->db->join("diagnosticos d", "as.id_asignacion = d.asignaciones_id_asignacion");
    $this->db->join("tecnicos ts", "as.tecnicos_id_tecnico = ts.id_tecnico");
    $this->db->where("s.sl_estado", "3");
    $this->db->order_by("s.sl_fecha_proceso", "desc");
    $resultados = $this->db->get();
    return $resultados->result();
  }

  public function getTecnico()
  {
    $this->db->select("*");
    $this->db->from("tecnicos");
    $this->db->where("tc_estado", "1");
    $resultados = $this->db->get();
    return $resultados->result();
  }

  public function getDiagnosticadasVista()
  {
    $this->db->select("s.*,as.*,ts.*,d.*");
    $this->db->from("asignaciones as");
    $this->db->join("solicitudes s", "as.solicitudes_id_solicitud = s.id_solicitud");
    $this->db->join("diagnosticos d", "as.id_asignacion = d.asignaciones_id_asignacion");
    $this->db->join("tecnicos ts", "as.tecnicos_id_tecnico = ts.id_tecnico");
    $this->db->where("s.sl_estado", "3");
    $this->db->order_by("s.sl_fecha_proceso", "desc");
    $this->db->limit(6);
    $resultados = $this->db->get();
    return $resultados->result();
  }

  public function getDiagnosticar($id_solicitud, $id_asignacion)
  {
    $query = $this->db->select('*')
      ->from("solicitudes s")
      ->join("asignaciones asg", "asg.solicitudes_id_solicitud = s.id_solicitud")
      ->join('tipos_soporte ts', 'ts.id_tipo_soporte = s.tipos_soporte_id_tipo_soporte')
      ->join("diagnosticos d", "asg.id_asignacion = d.asignaciones_id_asignacion")
      ->join('tecnicos tc', 'tc.id_tecnico = asg.tecnicos_id_tecnico', 'both')
      ->where(array("s.id_solicitud" => $id_solicitud, "asg.id_asignacion" => $id_asignacion))
      ->get();
    return $query->result();
  }

  public function getSoporte()
  {
    $this->db->select("*");
    $this->db->from("tipos_soporte");
    $this->db->where("estado", "1");
    $resultados = $this->db->get();
    return $resultados->result();
  }

  public function insertResolutivo($data)
  {
    $this->db->insert('resolutivos', $data);
    return $this->db->insert_id();
  }

  public function updateSolicitud($data, $id_solicitud)
  {
    $this->db->where('id_solicitud', $id_solicitud);
    $this->db->update('solicitudes', $data);
    $updated_status = $this->db->affected_rows();
    if ($updated_status) {
      return $id_solicitud;
    } else {
      return false;
    }
  }

  public function updateDiagnostico($data, $id_diagnostico)
  {
    $this->db->where('id_diagnostico', $id_diagnostico);
    $this->db->update('diagnosticos', $data);
    return $id_diagnostico;
  }

  // Funciones para envío de correos
  public function getDataCorreoResolucion($id_solicitud)
  {
    $sql = "SELECT s.*,ts.ts_nombre , asig.as_fecha_asignacion  , res.rs_descripcion
    FROM solicitudes as s 
		INNER JOIN tipos_soporte as ts ON s.tipos_soporte_id_tipo_soporte = ts.id_tipo_soporte
    INNER JOIN asignaciones as asig ON s.id_solicitud = asig.solicitudes_id_solicitud
    INNER JOIN resolutivos as res ON asig.id_asignacion = res.asignaciones_id_asignacion
		WHERE s.id_solicitud = '$id_solicitud'";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function getDataCorreoCierre($id_solicitud)
  {
    $this->db->select("s.*,ts.ts_nombre");
    $this->db->from("solicitudes s");
    $this->db->join("tipos_soporte ts", "s.tipos_soporte_id_tipo_soporte = ts.id_tipo_soporte");
    $this->db->where("s.id_solicitud", $id_solicitud);
    $resultados = $this->db->get();
    return $resultados->result_array();
  }
}
