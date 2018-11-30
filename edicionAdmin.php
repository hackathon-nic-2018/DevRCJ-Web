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
  <title>Panel de Administracion / Edicion</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <link rel="shortcut icon" href="imagenes/logo.ico" type="image/x-icon">
  <?php include('includes/librerias.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="principal.php" class="logo">
      <span class="logo-mini"><b>GE</b></span>
      <span class="logo-lg"><b>Gran Estadia</b></span>
    </a>
  <?php include('includes/menu.php'); ?>
  </header>
  <?php include('includes/menuLateral.php'); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Administracion
        <small>Administrador</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Edicion de Administradores</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
          <?php
          if(isset($_POST["editarAdmin"])){ 
            $idAdmin = $_POST["idadmin"];
            $nombre = $_POST["nombre"];
            $user = $_POST["username"];
            $pass = $_POST["pass"];
            $estado = $_POST["estado"];

          }
          ?>
        <div class="col-md-7">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b style="color:green;">Modificacion de Datos del Administrador<b></font></font></h3>
              <div  class="box-body">
                   <form method="post" action="procesos/recibirEdicionAdministrador.php">
                    <input type="hidden" name="idservicio" value="<?php echo $idservicio; ?>">
                       

                         <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre:</font></font></label>
                            <div class="col-sm-10">
      <input type="text" class="form-control" name="nombre" required="true" value="<?php echo $descripcion; ?>">
                            </div> 
                        </div>

                         <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Username:</font></font></label>
                            <div class="col-sm-10">
              <input type="text" class="form-control" required="true" name="username" value="<?php echo $precio; ?>">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Password:</font></font></label>
                            <div class="col-sm-10">
              <input type="text" class="form-control" required="true" name="pass" value="<?php echo $precio; ?>">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado:</font></font></label>
                            <div class="col-sm-10">
                              <select class="form-control" name="estado">
                                <?php
                               if ($estado=='Activo') {
                                echo "<option selected>Activo</option>";
                                echo "<option>Inactivo</option>";
                               }
                               else{
                                  echo "<option>Activo</option>";
                                  echo "<option selected>Inactivo</option>";
                               }
                              ?>
                              </select>
                            </div> 
                        </div><br><br>

          <button type="submit" name="enviarEdicionProducto" class="btn btn-success">Modificar Datos</button>                                            
                        </form>                    
            </div></div></div>
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