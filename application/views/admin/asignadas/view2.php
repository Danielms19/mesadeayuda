<div class="container-fluid">
    <h5><strong> Datos de la Solicitud </strong></h5>
    <table class="table table-bordered">
    <tbody>
        <?php  foreach ($artecnico as $rpt): ?>
        <input type="hidden" id="id_asignacion" name="id_asignacion" value="<?php echo $rpt->id_asignacion;?>">
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
        <td>
        <form>
        <select name="id_tecnico" id="id_tecnico" class="form-control">
            <?php foreach($atecnico as $atec):?>
                <option value="<?php echo $atec->id_tecnico;?>" 
                <?php echo $atec->id_tecnico == $rpt->tecnicos_id_tecnico ? "selected":"";?>>
                <?php echo $atec->tc_nombres." ".$atec->tc_apellidos;?></option>
            <?php endforeach;?>
        </select>
        </form>
        </td>        
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
        <?php endforeach ?>
    </tbody>
    </table>
</div>