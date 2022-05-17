<div class="container-fluid">
    <h5><strong> Datos de la Solicitud </strong></h5>
    <table class="table table-bordered">
    <tbody>
        <?php  foreach ($rasignar as $rpt): ?>
        <input type="hidden" id="id_solicitud" name="id_solicitud" value="<?php echo $rpt->id_solicitud;?>">
        <tr>
        <th scope="row">Número de Solicitud</th>
        <td><?php echo $rpt->id_solicitud;?></td>
        <th scope="row">Área</th>
        <td><?php echo $rpt->sl_area;?></td>
        </tr>
        <tr>
        <th scope="row">Nombre del Solicitante</th>
        <td  colspan=3><?php echo $rpt->sl_nombres;?></td>        
        </tr>
        <tr>
        <th scope="row">Tipo de Soporte</th>
        <td><?php echo $rpt->ts_nombre;?></td>
        <th scope="row">Fecha de Proceso</th>
        <td><?php echo $rpt->sl_fecha_proceso;?></td>
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
        <?php endforeach ?>
    </tbody>
    </table>
    <form>
    <h5><strong>Técnico  a Asignar</strong></h5>
    <div class="form-group">
        <select class="form-control" id="id_tecnico" name="id_tecnico">
        <?php foreach($rtecnico as $rt):?>
            <option value="<?php echo $rt->id_tecnico;?>">
                <?php echo $rt->tc_nombres." ".$rt->tc_apellidos; ?>
            </option>
        <?php endforeach; ?>
        </select>
    </div>
</form> 
</div>
