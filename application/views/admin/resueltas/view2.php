<div class="container-fluid">
    <h5><strong> Datos de la Solicitud </strong></h5>
    <table class="table table-bordered">
    <tbody>
        <?php  foreach ($reditar as $rpt): ?>
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
        </tr>
        <tr>
        <th scope="row">Tipo de Soporte</th>
        <td colspan=3><?php echo $rpt->ts_nombre;?></td>
        </tr>
        <tr>
        <th scope="row"> Descripción</th>
        <td colspan=3><?php echo $rpt->sl_descripcion;?></td>
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
        <th scope="row">Fecha de Asignación</th>
        <td><?php echo $rpt->as_fecha_asignacion;?></td>
        </tr>
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
        <h5><strong>Resolución</strong></h5>
        <tbody>
            <tr>
                <th scope="row">Fecha de Resolución</th>
                <td ><?php echo $rpt->rs_fecha_resolutivo;?></td>
                </tr>
                <tr>
                <td colspan=4>           
                <form>
                    <div class="form-group">        
                            <textarea class="form-control" rows="3" id="rs_descripcion" name="rs_descripcion" required
                            placeholder="Describa brevemente la Resolución de su solicitud de soporte técnico "><?php echo $rpt->rs_descripcion;?></textarea>      
                    </div>    
                </form>
                </td>
            </tr>
        </tbody>
    </table>
    <?php endforeach ?>
</div>
