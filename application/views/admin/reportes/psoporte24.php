
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Reporte de porcentaje de soportes atendidos dentro de las 24 horas
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">Año:</label>
                              <div class="col-md-3">
                              <input type="numeric" class="form-control" id="anios" name="anios"
                              minlength="4" maxlength="4"
                              onkeypress="return soloNumeros(event)"
                                    >
                              </div>
                              <div class="col-md-4">
                                <input type="submit" class="btn btn-primary" name="buscar" value="Buscar">
                              </div>
                            </div>       
                    </form>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table id="psoporte" class="table table-bordered table-hover">
                        <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo de Soporte</th>
                                    <th>Porcentaje</th>
                                    <th>Año</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $n=1; foreach ($psoporte24 as $r2): ?>
                                <tr>
                                    <td><?php echo $n++;?></td>
                                    <td><?php echo $r2->nombre;?></td>
                                    <td><?php echo $r2->porcentaje;?>%</td>
                                    <td><?php echo $r2->anios;?></td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
