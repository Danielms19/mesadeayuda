<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UGEL 04 | HELPDESK</title>
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/template/dist/img/ugel5.jpg" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.css">
      <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/Ionicons/css/ionicons.min.css">
     <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/datatables.net-bs/css/datatables.bootstrap.min.css">
    <!--- DATATABLES EXPORT  --->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/datatables-export/css/buttons.datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/datatables-export/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/datatables-export/css/buttons.jqueryui.min.css">
    <!--- FIN DATATABLES EXPORT  --->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/sweetalert2/sweetalert.css">
      <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/timepicker/bootstrap-timepicker.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/fullcalendar/fullcalendar.min.css">


    <link rel="stylesheet" href="<?php echo base_url();?>assets/template//bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">

</head>
<body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
        <header class="main-header">  
        <a href="<?php echo base_url();?>dashboard" class="logo">     
            <span class="logo-mini"><b>U05</b></span>
            <span class="logo-lg"><b>HELPDESK</b></span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img src="<?php echo base_url()?>assets/template/dist/img/user.png" class="user-image" 
                alt="User Image">
                <span class="hidden-xs">Hola, <?php echo $this->session->userdata("tc_apellidos")?>  </span>
                </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo base_url()?>assets/template/dist/img/user.png" class="img-circle" alt="User Image">
                <p><?php echo $this->session->userdata("tc_apellidos")?>
                <?php echo $this->session->userdata("tc_nombres")?>
                <?php  $this->session->userdata("tipo_id")?>
                  <small>ETI - UGEL 04</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                <a  type="button" href="<?php echo base_url(); ?>auth/logout" 
                class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div> 
    </nav>
  </header>