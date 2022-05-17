<div class="container-fluid">
    <h5><strong> Datos de la Solicitud </strong></h5>
    <table class="table table-bordered">
    <tbody>
        <?php  foreach ($recierre as $rpt): ?>
        <input type="hidden" id="id_asignacion" name="id_asignacion" value="<?php echo $rpt->id_asignacion;?>">
        <input type="hidden" id="id_solicitud" name="id_solicitud" value="<?php echo $rpt->id_solicitud;?>">
        <input type="hidden" id="id_resolutivo" name="id_resolutivo" value="<?php echo $rpt->id_resolutivo;?>">
        <tr>
        <th scope="row">Número de Solicitud</th>
        <td><?php echo $rpt->id_solicitud;?></td>
        <th scope="row">Área</th>
        <td><?php echo $rpt->sl_area;?></td>
        </tr>
        <tr>
        <th scope="row">Nombre del Solicitante</th>
        <td><?php echo $rpt->sl_nombres;?></td>  
        <th scope="row">Técnico Asignado</th>
        <td><?php echo $rpt->tc_nombres." ".$rpt->tc_apellidos;?></td>
        <input type="hidden" id="tc_dni" name="tc_dni" value="<?php echo $rpt->tc_dni;?>">     
        </tr>
        <tr>
        <th scope="row">Tipo de Soporte</th>
        <td colspan=3><?php echo $rpt->ts_nombre;?></td>
        <input type="hidden" id="ts_nombre" name="ts_nombre" value="<?php echo $rpt->ts_nombre;?>">
        </tr>
        <tr>
        <th scope="row"> Descripción</th>
        <td colspan=3><?php echo $rpt->sl_descripcion;?></td>
        <input type="hidden" id="sl_descripcion" name="sl_descripcion" value="<?php echo $rpt->sl_descripcion;?>">
        </tr>
        <tr>
        <th scope="row">Correo</th>
        <td><?php echo $rpt->sl_correo;?></td>
        <th scope="row">Celular</th>
        <td><?php echo $rpt->sl_celular;?></td>
        </tr>
        <tr>
        <th scope="row">Fecha de Solicitud</th>
        <td><?php echo $rpt->sl_fecha_proceso;?></td>
        <input type="hidden" id="sl_fecha_proceso" name="sl_fecha_proceso" value="<?php echo $rpt->sl_fecha_proceso;?>">
        <th scope="row">Fecha de Asignación</th>
        <td><?php echo $rpt->as_fecha_asignacion;?></td>
        <input type="hidden" id="as_fecha_asignacion" name="as_fecha_asignacion" value="<?php echo $rpt->as_fecha_asignacion;?>">
        </tr>        
    </tbody>
    </table>
    <table class="table table-bordered">
    <h5><strong>Diagnóstico</strong></h5>
    <tbody>
        <tr>
            <th scope="row">Fecha de Diagnóstico</th>
            <td ><?php echo $rpt->dg_fecha_diagnostico;?></td>
            </tr>
            <tr>
        <td colspan=4><?php echo $rpt->dg_descripcion;?></td>
        </tr>
    </tbody>
    </table>
    <table class="table table-bordered">
    <h5><strong>Resolutivo</strong></h5>
    <tbody>
        <tr>
            <th scope="row">Fecha de Resolutivo</th>
            <td ><?php echo $rpt->rs_fecha_resolutivo;?></td>
            <input type="hidden" id="rs_fecha_resolutivo" name="rs_fecha_resolutivo" value="<?php echo $rpt->rs_fecha_resolutivo;?>">
            </tr>
            <tr>
        <td colspan=4><?php echo $rpt->rs_descripcion;?></td>
        <td colspan=4><input type="hidden" id="cantidad" name="cantidad" value="<?php echo date("H", strtotime($rpt->rs_fecha_resolutivo))-date("H", strtotime($rpt->as_fecha_asignacion));?>"></td>
        </tr>
    </tbody>
    </table>
    <?php endforeach ?>
    <form>
    <h5><strong>Cierre</strong></h5>
        <div class="form-group">
            <textarea class="form-control" rows="3" id="sl_observacion" name="sl_observacion" required
            placeholder="Describa brevemente el motivo de cierre de su solicitud de soporte técnico "></textarea>
        </div>
    </form>
</div>


