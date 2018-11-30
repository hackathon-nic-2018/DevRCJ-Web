<?php
include('../utilidades/conexion.php');

if(isset($_POST["enviarEliminacion"])){ 
	$id = $_POST["idadmin"];

	$sql = "Delete from administrador where idAdministrador = $id";
			    if(mysqli_query($con, $sql))
			    {
				   echo "<script>alert('Hemos eliminado tu producto') </script>";
				   echo '<script> window.location="../productos.php";</script>'; 
			    }
		         else{
				      echo "<script>alert('Error al eliminar el producto')</script>";
				      echo '<script> window.location="../productos.php";</script>';  
		             }		
  }
  else {
  	echo "<script>alert('Error borrar el producto')</script>";
       }
?>