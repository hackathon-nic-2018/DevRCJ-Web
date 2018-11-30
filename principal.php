<?php
session_start();
include("utilidades/conexion.php");
if(isset($_SESSION['Username']))
 {?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel de Administracion</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include('includes/librerias.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="principal.php" class="logo">
    <span class="logo-mini"><b>GE</b></span>
      <span class="logo-lg"><b>GranEstadia</b></span>
    </a>
  <?php include('includes/menu.php'); ?>
  </header>
  <?php include('includes/menuLateral.php'); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Administracion
        <small>GranEstadia</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administracion</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Arrendadores</span>
              <a href="productos.php">Ver mas</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-bed"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Habitaciones</span>
             <a href="habitaciones.php">Ver mas</a>
            </div>
          </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-edit"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Reservaciones</span>
              <a href="#">Ver mas</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-gear"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Servicios</span>
               <a href="#">Ver mas</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-globe"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Sitio</span>
              <a href="#">Ver mas</a>
            </div>
          </div>
        </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-lock"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Administradores</span>
              <a href="#">Ver mas</a>
            </div>
          </div>
        </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-line-chart"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Estadisticas</span>
              <a href="#">Ver mas</a>
            </div>
          </div>
        </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-file-pdf-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Reportes</span>
              <a href="#">Ver mas</a>
            </div>
          </div>
        </div>

      </div>
      

    </section>

  </div>
   <?php include('includes/footer.php'); ?>
  <div class="control-sidebar-bg"></div>
</div>
 <?php include('includes/javascript.php'); ?>
</body>
</html>
<?php
}else{
    echo '<script> window.location="index.php"; </script>';
}
?>