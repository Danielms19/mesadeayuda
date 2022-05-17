
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuarios
        <small>Editar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>administrador/usuarios"><i class="fa fa-dashboard"></i> Usuarios</a></li>
            <li class="active">Usuarios Modificiar</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>administrador/usuarios/update" method="POST">
                            <input type="hidden" name="id_tecnico" value="<?php echo $tecnico->id_tecnico ?>">

                            <div class="col-md-6">
                                    <div class="form-group <?php echo !empty(form_error("tc_nombres")) ? 'has-error':''?>">
                                    <label for="tc_nombres">Nombre:</label>
                                        <input type="text" name="tc_nombres" id="tc_nombres" class="form-control"
                                        value="<?php echo $tecnico->tc_nombres;?>"
                                        onkeypress="return soloLetras(event)">
                                         <?php echo form_error("tc_nombres","<span class='help-block'>","</span>");?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                     <div class="form-group <?php echo !empty(form_error("tc_apellidos")) ? 'has-error':''?>">
                                     <label for="tc_apellidos">Apellidos:</label>
                                        <input type="text" name="tc_apellidos" id="tc_apellidos" class="form-control"
                                        value="<?php echo $tecnico->tc_apellidos;?>"
                                        onkeypress="return soloLetras(event)">
                                        <?php echo form_error("tc_apellidos","<span class='help-block'>","</span>");?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group <?php echo !empty(form_error("tc_dni")) ? 'has-error':''?>">
                                        <label for="tc_dni">DNI:</label>
                                        <input type="text" name="tc_dni" id="tc_dni" class="form-control"
                                        value="<?php echo $tecnico->tc_dni;?>"
                                        onkeypress="return soloNumeros(event)" minlength="8" maxlength="9">
                                        <?php echo form_error("tc_dni","<span class='help-block'>","</span>");?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group <?php echo !empty(form_error("tipo_soporte")) ? 'has-error':''?>">
                                        <label for="tipo_soporte">Rol:</label>
                                        <select name="tipo_soporte" id="tipo_soporte" class="form-control"> 
                                            <?php foreach($tipo_soporte as $tp):?>
                                                <option value="<?php echo $tp->id_tipo_usuario;?>" 
                                                <?php echo $tp->id_tipo_usuario == $tecnico->tipos_usuario_id_tipo_usuario ? "selected":"";?>>
                                                <?php echo $tp->tu_nombre;?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?php echo form_error("tipo_soporte","<span class='help-block'>","</span>");?>
                                    </div>
                                </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Guardar">
                                </div>
                            </div>
                        </form>
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
