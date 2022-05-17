<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UGEL 04 | SISTEMA HELPDESK</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">
  <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/template/dist/img/ugel5.jpg" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/dist/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/dist/vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/dist/vendor/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/dist/vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/dist/vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/dist/vendor/animsition/css/animsition.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/dist/vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/dist/vendor/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/dist/vendor/css/main.css">
    
</head>
<body>
<div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form" action="<?php echo base_url();?>auth/login" method="post">
          <span class="login100-form-title p-b-34">
            Sistema de Mesa de Ayuda
          </span>
          
          <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Ingresar usuario">
            <input id="first-name" class="input100" type="text" name="username" placeholder="usuario">
            <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Ingresar contraseña">
            <input class="input100" type="password" name="password" placeholder="contraseña">
            <span class="focus-input100"></span>
          </div>

          <?php if($this->session->flashdata("error")):?>
                    <div class="alert alert-danger">
                    <p style="color: #f9f7f7";><?php echo $this->session->flashdata("error")?></p>
                  </div>
          <?php endif; ?>
          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Ingresar
            </button>
          </div>
          <div class="w-full text-center p-t-27 p-b-239">
          <span class="login100" style="font-size: 15px;">
						Equipo de Tecnologias de la Información - <a target="_blank" href="http://www.ugel04.gob.pe" 
            style="text-decoration-color: red;"> UGEL 04</a>
          </div>

        </form>

        <div class="login100-more" style="background-image: url('<?php echo base_url();?>assets/template/dist/vendor/images/bg-03.jpg');"></div>
      </div>
    </div>
  </div>

    <script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/template/dist/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url();?>assets/template/dist/vendor/animsition/js/animsition.min.js"></script>
  <script src="<?php echo base_url();?>assets/template/dist/vendor/bootstrap/js/popper.js"></script>
  <script src="<?php echo base_url();?>assets/template/dist/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/template/dist/vendor/select2/select2.min.js"></script>
  <script src="<?php echo base_url();?>assets/template/dist/vendor/daterangepicker/moment.min.js"></script>
  <script src="<?php echo base_url();?>assets/template/dist/vendor/countdowntime/countdowntime.js"></script>
  <script src="<?php echo base_url();?>assets/template/dist/vendor/js/main.js"></script>
</body>
</html>
