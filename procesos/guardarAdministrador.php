<?php
include('../utilidades/conexion.php');

	if (empty($_POST['descripcion'])||empty($_POST['precio']))
	    {
		echo "<script>alert('Los campos deben estar llenos')</script>";
		echo '<script> window.location="../servicios.php";</script>';
	    }

	else {
		$descripcion =  $_POST['descripcion'];
		$precio = $_POST['precio'];
		$estado = $_POST['estado'];


	$consulta = "insert into servicios (Descripcion,Precio,Estado) values ('".$descripcion."',".$precio.",'".$estado."')";
		$resultado = mysqli_query( $con, $consulta );
	if ($resultado) {
		echo "<script>alert('Servicio agregado correctamente');</script>";
		echo "<script>window.location.href = '../servicios.php';</script>";
   }
   else{
   		echo "<script>alert('No se pudo agregar el Servicio');</script>";
	    echo "<script>window.location.href = '../servicios.php';</script>";
       }
}
?>