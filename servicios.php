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
      <link rel="shortcut icon" href="imagenes/logo.ico" type="image/x-icon">
  <?php include('includes/librerias.php'); ?>
  <link rel="stylesheet" type="text/css" href="datatables/dataTables.bootstrap.min.css"/>
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
        Gestion de Servicios
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Servicios</li>
      </ol>
    </section>

    <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
             
    
    <section class="content">
 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">Agregar Servicio</button><br><br>

    <section class="content">
      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background:#3c8dbc; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Agregar un Servicio</b></h4>
              </div>
              <div class="modal-body">
                      <div class="box-body">
                        <form action="procesos/guardarProducto.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descripcion</font></font></label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="descripcion" required="true">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Precio</font></font></label>

                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="precio" required="true">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado</font></font></label>
                        <div class="col-sm-10">
                           <select class="form-control" name="estado" style="width:100%;">
                             <option>Activo</option>
                             <option>Inactivo</option>
                          </select>
                        </div>
                      </div>      
                    </div>
              </div>
              <div class="modal-footer">
                
                <button type="submit" name="enviarArticulo" class="btn btn-success">Guardar</button>
              </form>
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

                <table class="table table-responsive table-bordered" id="ejemplo">                  
                   <thead>
                     <td>Cod.</td>
                     <td>Descripcion</td>
                     <td>Precio</td>
                     <td>Estado</td>
                     <td>Opciones</td>                  
                   </thead> 
                       <tbody>
                           <?php
                          include('utilidades/conexion.php');
                          $registro = mysqli_query($con, "SELECT * from servicios");
                          if(mysqli_num_rows($registro)>0)
                          {
                            while($registro2 = mysqli_fetch_array($registro))
                            {
                               $idServicio = $registro2['idServicio'];
                               $descripcion = $registro2['Descripcion'];
                               $precio = $registro2['Precio'];
                               $estado = $registro2['Estado'];

                              echo '<tr>
                                 <td>'.$idServicio.'</td>
                                 <td>'.$descripcion.'</td>
                                 <td>'.$precio.'</td>   
                                 '?>
                                 <?php
                                 if($estado=='Activo'){
                                      echo'<td><span class="label label-success">'.$estado.'</span></td>';    
                                  }
                                  else{
                                      echo'<td><span class="label label-danger">'.$estado.'</span></td>';    
                                  }
                               
                                 ?> 

                                  <?php
                                 echo '
                                 <td>
                                <div class="row">
                                  <div class="col-md-6">
                                    <form action="edicionProducto.php" method="post">
                                    <input type="hidden" name="idproducto" value="'.$idServicio.'">
                                  <input type="hidden" name="idcategoria" value="'.$descripcion.'">
                                    <input type="hidden" name="nombre" value="'.$precio.'">
                            <button name="editarProducto" type="submit" class="btn btn-info"><i class="fa fa-pencil-square-o"> Editar</i></button>
                                    </form>
                                  </div>

                                 <div class="col-md-6">
                                      <form action="procesos/recibirEliminacionProducto.php" method="post" onsubmit="return confirmation()">
                                       <input type="hidden" name="idproducto" value="'.$idServicio.'">
                                        <button type="submit" name="enviarEliminacion" class="btn btn-danger"><i class="fa fa-trash"> Borrar</i></button>
                                     </form>
                                 </div>
                                </div>

                                   </td>
                                  </tr>';
                            }
                          }else{
                            echo '<tr>
                                  <td colspan="6">No se encontraron resultados</td>
                                </tr>';
                          }
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