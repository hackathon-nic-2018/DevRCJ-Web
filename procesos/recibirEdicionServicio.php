<?php
include('../utilidades/conexion.php');

if(isset($_POST["enviarEdicionProducto"])){      //verificamos si dimos click en el boton editar
	        $idproducto = $_POST["idproducto"];
            $idcategoria = $_POST["comboCategoria"];
            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $precio = $_POST["precio"];
            $estado = $_POST["estado"];
            $oferta = $_POST["oferta"];
            $observaciones = $_POST["observaciones"];
            $imagen = $_POST["foto"];

	//Guardando la imagen
	$rutaservidor='../../imagenes/productos/';
	$rutatemporal=$_FILES['foto']['tmp_name'];   //obtenemos la ruta temporal
	$nombrefoto=$_FILES['foto']['name'];         //obtenemos el nombre de la imagen
	 $tipo = $_FILES['foto']['type'];           //obtenemos el tipo de imagen
	$rutadestino=$rutaservidor.'/'.$nombrefoto;//esta es la ruta de la imagen en el directorio de carpetas
	$rutafinal = substr($rutadestino, 6);//aqui le estamos quitando los primeros 6 caracteres a la ruta
	move_uploaded_file($rutatemporal, $rutadestino); //movemos a imagen de la carpeta donde estaba a la carpeta del proyecto

    //verificar que el tipo de archivo seleccinado sea imagen
    if($tipo=="image/png"||$tipo=="image/jpg"||$tipo=="image/jpeg")
    {
    $rutadestino=$rutaservidor.'/'.$nombrefoto;
	$rutafinal = substr($rutadestino, 6);
	move_uploaded_file($rutatemporal, $rutadestino);

	$sql = "update productos set idcategoria = $idcategoria, nombre='$nombre', descripcion='$descripcion', precio='$precio', estado='$estado', oferta='$oferta' , observaciones='$observaciones' , imagen='$rutafinal' where idproducto = $idproducto";

   $guardar = mysqli_query($con,$sql);

			    if($guardar){
			   echo "<script>alert('Hemos modificado tu producto') </script>"; //Mensaje de exito
			   echo '<script> window.location="../productos.php";</script>';  //Redireccionamos a la pagina productos
			         }
			         else{
			      echo "<script>alert('Error al modificar el producto')</script>";
			      echo '<script> window.location="../productos.php";</script>';  
			     }
    }
    else{
    	 echo "<script>alert('Debes seleccionar un archivo de imagen') </script>";
	   	 echo '<script> window.location="../productos.php";</script>'; 
    }
  }
  else{
  	echo "<script>alert('Error editar el Producto. Intenta de nuevo')</script>";
  	echo '<script> window.location="../productos.php";</script>'; 
  }
?>