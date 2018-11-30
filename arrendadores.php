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
  <link rel="stylesheet" type="text/css" href="datatables/dataTables.bootstrap.min.css"/>
      <link rel="shortcut icon" href="imagenes/logo.ico" type="image/x-icon">
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
        Gestion de Arrendadores
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Arrendadores</li>
      </ol>
    </section>

    <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
             
    
    <section class="content">

                <table class="table table-responsive table-bordered" id="ejemplo">                  
                   <thead>
                     <td>Cod.</td>
                     <td>Foto 1</td>
                     <td>Foto 2</td>
                     <td>Foto 3</td>
                     <td>Foto 4</td>
                     <td>Descripcion</td>
                     <td>Precio</td>
                     <td>Condiciones</td>
                     <td>Estado</td>
                   
                   </thead> 
                       <tbody>
                           <?php
                          include('utilidades/conexion.php');
                          $registro = mysqli_query($con, "SELECT * from habitaciones");
                          if(mysqli_num_rows($registro)>0)
                          {
                            while($registro2 = mysqli_fetch_array($registro))
                            {
                               $idHabitacion = $registro2['idHabitacion'];
                               $foto1 = $registro2['Foto1'];
                               $foto2 = $registro2['Foto2'];
                               $foto3 = $registro2['Foto3'];
                               $foto4 = $registro2['Foto4'];
                                $descripcion = $registro2['Descripcion'];
                                $precio = $registro2['Precio'];
                                $condiciones = $registro2['Condiciones'];
                                $estado = $registro2['Estado'];
                                
                                $imagen1 = '<img src="'.$foto1.'" width="100" height="100">';
                                $imagen2 = '<img src="'.$foto2.'" width="100" height="100">';
                                $imagen3 = '<img src="'.$foto3.'" width="100" height="100">';
                                $imagen4 = '<img src="'.$foto4.'" width="100" height="100">';
                              echo '<tr>
                                 <td>'.$idHabitacion.'</td>
                                 <td>'.$imagen1.'</td>
                                 <td>'.$imagen2.'</td>
                                 <td>'.$imagen3.'</td>
                                 <td>'.$imagen4.'</td>
                                 <td>'.$descripcion.'</td>
                                 <td>'.$precio.'</td>
                                 <td>'.$condiciones.'</td>
                                 '?>
                                 <?php
                                 if($estado=='Desocupada'){
                                      echo'<td><span class="label label-success">'.$estado.'</span></td>';    
                                  }
                                  else{
                                      echo'<td><span class="label label-danger">'.$estado.'</span></td>';    
                                  }
                               
                                 ?> 

                                 <?php   
                            }
                          }else{
                               echo'<tr><td colspan="9">No se encontraron resultados</td></tr>';
                               }
                          echo '</table>';
                          ?>  
                    </tbody>
                </table>

        </section>
      </div> </div> </div><br><br><br><br><br><br>

  </div>
   <?php include('includes/footer.php'); ?>
  <div class="control-sidebar-bg"></div>
</div>

          <script type="text/javascript">
              function confirmation() {
                  if(confirm("Realmente desea eliminar?"))
                  {
                      return true;
                  }
                  return false;
              }
          </script>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
 $(document).ready(function() {
  $('#ejemplo').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
</script>

</body>
</html>
<?php
}else{
    echo '<script> window.location="index.php"; </script>';
}
?>