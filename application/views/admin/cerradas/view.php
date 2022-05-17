<div class="container-fluid">
    <h5><strong> Datos de la Solicitud</strong></h5>
    <table class="table table-bordered">
    <tbody>
        <?php  foreach ($rcerradas as $rpt): ?>
        <input type="hidden" id="id_solicitud" name="id_solicitud" value="<?php echo $rpt->id_solicitud;?>">
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
        <?php if($rpt->id_tecnico==null){?>
        <td><?php echo "No tiene técnico"?></td>
        <?php }else{?>
        <td><?php echo $rpt->tc_nombres." ".$rpt->tc_apellidos;?></td>
        <?php }?>
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
        <?php if($rpt->id_tecnico==null){?>
        <th scope="row"></th>
        <?php }else{?>
        <th scope="row">Fecha de Asignación</th>
        <td><?php echo $rpt->as_fecha_asignacion;?></td>
        <?php }?>
        </tr>
        </tr>
    </tbody>
    </table>
    <table class="table table-bordered">
        <h5><strong>Diagnóstico</strong></h5>
        <tbody>
            <tr><?php if($rpt->dg_fecha_diagnostico==null){?>
                <td colspan=4><?php echo "No tiene diagnostico"?></td>
                </tr>
            <?php }else{?>
                <th scope="row">Fecha de Diagnóstico</th>
                <td ><?php echo $rpt->dg_fecha_diagnostico;?></td>
                </tr>
                <tr>
            <td colspan=4><?php echo $rpt->dg_descripcion;?></td>
            <?php }?>
        </tbody>
    </table>

    <table class="table table-bordered">
        <h5><strong>Resolución</strong></h5>
        <tbody>
            <tr>
            <tr><?php if($rpt->rs_descripcion==null){?>
                <td colspan=4><?php echo "No tiene resolutivo"?></td>
                </tr>
            <?php }else{?>
                <th scope="row">Fecha de Resolución</th>
                <td ><?php echo $rpt->rs_fecha_resolutivo;?></td>
                </tr>
                <tr>
            <td colspan=4><?php echo $rpt->rs_descripcion;?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>

    <table class="table table-bordered">
        <h5><strong>Motivo de Cierre</strong></h5>
        <tbody>
            <tr>
            <tr><?php if($rpt->sl_observacion==null){?>
                <td colspan=4><?php echo "No tiene motivo de cierre"?></td>
                </tr>
            <?php }else{?>
                <tr>
            <td colspan=4><?php echo $rpt->sl_observacion;?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    <?php endforeach ?>
</div>