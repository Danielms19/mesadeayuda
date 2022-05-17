        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo base_url()?>assets/template/dist/img/user.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p> <?php echo $this->session->userdata("tc_apellidos")?></p>
                        <a ><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>     
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header" style="text-align: center; font-size: 13px;">Menu de Navegacion</li>

                    <li class="">
                        <a href="<?php echo base_url();?>dashboard">
                            <i class="fa fa-cog"></i> <span>Panel</span>
                        </a> 
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url();?>dashboard">
                            <i class="fa fa-bars"></i> <span>Modulos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a> 
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/reportadas"><i class="fa fa-circle-o"></i>Reportadas</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/asignadas"><i class="fa fa-circle-o"></i>Asignadas</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/diagnosticadas"><i class="fa fa-circle-o"></i>Diagnosticadas</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/resueltas"><i class="fa fa-circle-o"></i>Resueltas</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/cerradas"><i class="fa fa-circle-o"></i>Cerradas</a></li>
                        </ul>   
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Reportes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>reportes/atendidas"><i class="fa fa-list"></i>Atendidas</a></li>
                            <li><a href="<?php echo base_url();?>reportes/graficos"><i class="fa fa-bar-chart   "></i>Graficos</a></li>
                            <li><a href="<?php echo base_url();?>reportes/porcentajes"><i class="fa fa-bookmark"></i>Porcentajes</a></li>
                        </ul>
                    </li>

                    <?php if(($this->session->userdata('tipo_id') == 1 )){?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i> <span>Administrador</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>administrador/usuarios"><i class="fa fa-user-plus"></i> Usuarios</a></li>
                            <li><a href="<?php echo base_url();?>administrador/solicitudes"><i class="fa fa-outdent"></i> Solicitudes</a></li>
                    </li>
                    <?php } ?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>