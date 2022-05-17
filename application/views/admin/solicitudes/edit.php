
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Modificar Solicitud
        <small>Modificar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>administrador/solicitud"><i class="fa fa-dashboard"></i> Solicitudes</a></li>
            <li class="active">Modificar solicitud</li>
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
                        <form action="<?php echo base_url();?>administrador/Solicitudes/update" method="POST">
                            <input type="hidden" id="id_tipo_soporte" name="id_tipo_soporte" value="<?php echo $soli->id_tipo_soporte ?>">


                                <div class="col-md-6">
                                     <div class="form-group <?php echo !empty(form_error("ts_padre")) ? 'has-error':''?>">
                                        <label for="ts_padre">Tipo de soporte:</label>
                                        <select name="ts_padre" id="ts_padre" class="form-control"> 
                                            <?php foreach($tsoporte as $tp):?>
                                                <option value="<?php echo $tp->id_tipo_soporte;?>" 
                                                <?php echo $tp->id_tipo_soporte == $soli->id_tipo_soporte ? "selected":"";?>>
                                                <?php echo $tp->ts_nombre;?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?php echo form_error("ts_padre","<span class='help-block'>","</span>");?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group <?php echo !empty(form_error("ts_nombre")) ? 'has-error':''?>">
                                    <label for="ts_nombre">Nombre del soporte:</label>
                                        <input type="text" name="ts_nombre" id="ts_nombre" class="form-control"
                                        value="<?php echo $soli->ts_nombre;?>"
                                        onkeypress="return soloLetras(event)">
                                         <?php echo form_error("ts_nombre","<span class='help-block'>","</span>");?>
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
