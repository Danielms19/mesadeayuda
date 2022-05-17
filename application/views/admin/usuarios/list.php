
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuarios
        <small>Listado</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Usuarios</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url();?>administrador/usuarios/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Usuario</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>DNI</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($tecnicos)):?>
                                    <?php $n = 1;foreach($tecnicos as $tc):?>
                                        <tr>
                                            <td><?php echo $n++;?></td> <!--- --->
                                            <td><?php echo $tc->tc_nombres;?></td> <!--- --->
                                            <td><?php echo $tc->tc_apellidos;?></td> <!--- --->
                                            <td><?php echo $tc->tc_dni;?></td> <!--- --->
                                            <td><?php echo $tc->rol;?></td> <!--- --->
                                            <td>
                                                    <?php if ($tc->tc_estado == "1") {
                                                        echo '<span class="label label-success">Activo</span>';
                                                    }else if($tc->tc_estado == "0"){
                                                        echo '<span class="label label-danger">Desactivado</span>';
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <?php if ($tc->tc_estado == 1): ?>
                                                    <a href="<?php echo base_url()?>administrador/usuarios/edit/<?php echo $tc->id_tecnico;?>" 
                                                    class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>administrador/usuarios/delete/<?php echo $tc->id_tecnico;?>" 
                                                    class="btn btn-danger btn-delete"><span class="fa fa-remove"></span></a>
                                                    <?php else: ?>
                                                    <a href="<?php echo base_url();?>administrador/usuarios/activar/<?php echo $tc->id_tecnico;?>" 
                                                    class="btn btn-success btn-activar"><span class="fa fa-check"></span></a>
                                                    <?php endif ?>   
                                                
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
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

<div class="modal fade" id="btn-remove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        <p>You are about to delete <b><i class="title"></i></b> record, this procedure is irreversible.</p>
        <p>Do you want to proceed?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger btn-ok">Delete</button>
      </div>
    </div>
  </div>
</div>