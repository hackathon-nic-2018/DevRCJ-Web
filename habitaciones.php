<?php
session_start();
include("utilidades/conexion.php");
if(isset($_SESSION['user']))
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
        Gestion de Habitaciones
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Habitaciones</li>
      </ol>
    </section>

    <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
             
    
    <section class="content">
      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background:#3c8dbc; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Agregar un Habitacion</b></h4>
              </div>
              <div class="modal-body">
                      <div class="box-body">
                        <form action="procesos/guardarProducto.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Categoria</font></font></label>
                        <div class="col-sm-10">
                          <select class="form-control" name="categoria" required="true">
                             <?php 
                             $consulta1="select idcategoria, descripcion from categorias";
                              $categoria=mysqli_query($con, $consulta1);
                              while($fila=mysqli_fetch_row($categoria)){
                              echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                              }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nombre" required="true">
                        </div>
                      </div>
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
                             <option value="1">Activo</option>
                             <option value="0">Inactivo</option>
                          </select>
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oferta</font></font></label>
                        <div class="col-sm-10">
                           <select class="form-control" name="oferta" style="width:100%;">
                             <option value="1">Con Oferta</option>
                             <option value="0">Sin Oferta</option>
                          </select>
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Observ.</font></font></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="observaciones" required="true">
                        </div>
                      </div>
                      
                      
                   
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Imagen</font></font></label>

                        <div class="col-sm-10">
                          <input type="file" class="form-control" id="files" name="foto" multiple="true" />
                        </div>
                           <br />
                           
                          <br />
                          <div class="row">
                             <div class="col-md-4"></div>
                             <div class="col-md-4"><br><div id="lista_imagenes" style="width: 150px; height: 150px; border:1px solid green;"></div></div>
                             <div class="col-md-4"></div>
                          </div>
                         

                       <script>
                          function archivo(evt) {
                              var files = evt.target.files; // FileList object
                              // Obtenemos la imagen del campo "file".
                              for (var i = 0, f; f = files[i]; i++) {
                                //Solo admitimos imágenes.
                                if (!f.type.match('image.*')) {
                                    continue;
                                }
                                var reader = new FileReader();
                                reader.onload = (function(theFile) {
                                    return function(e) {
                                      // Insertamos la imagen
                                     document.getElementById("lista_imagenes").innerHTML = ['<img style="width:150px; height:150px;" class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                                    };
                                })(f);
                              reader.readAsDataURL(f);
                              }
                          }
                          document.getElementById('files').addEventListener('change', archivo, true);
                     </script>

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