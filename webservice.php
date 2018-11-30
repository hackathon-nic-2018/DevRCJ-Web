<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
//Incluye archivo db.php que contiene los datos para la conexio MysQL
include('utilidades/conexion.php');
//Definiendo cabecera para tipo json
header('Content-Type: application/json');

if($accion == "insertarUsuario"){
 
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $estadocivil = $_POST["estadocivil"];
    $descripcion = $_POST["descripcion"];
    $foto = $_POST["foto"];
    $url = $_POST["url"];
    $tipo = $_POST["tipo"];
    

    if(!empty($nombres) && !empty($apellidos)&& !empty($edad)&& !empty($estadocivil)&& !empty($descripcion)){
$query = "INSERT INTO usuarios(Nombres,Apellidos,Edad,EstadoCivil,Autodescripcion,Foto,url,tipo) VALUES('$nombres', '$apellidos','$edad,'$estadocivil','$descripcion','$foto','$url','$tipo')";
        $result = mysqli_query($con, $query);
        if($result){
            $resultData = array('status' => true, 'message' => 'Nuevo usuario registrado...');
        }else{
            $resultData = array('status' => false, 'message' => 'No se ha podido agregar el usuario...');
        }
    }
    else{
        $resultData = array('status' => false, 'message' => 'Ingresar Detalles...');
    }
 
    echo json_encode($resultData);
}
if($accion == "ModificarUsuario"){
    
    $id = $_POST["idUsuario"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $estadocivil = $_POST["estadocivil"];
    $descripcion = $_POST["descripcion"];
    $foto = $_POST["foto"];
    $url = $_POST["url"];
    $tipo = $_POST["tipo"]; 
 
    if(!empty($nombres) && !empty($apellidos)&& !empty($edad)&& !empty($estadocivil)&& !empty($descripcion)){
$query = "update usuarios set  Nombres=$nombres,Apellidos=$apellidos,Edad=$edad,EstadoCivil=$estadocivil,Autodescripcion=$descripcion,Foto=$foto,url=$url,tipo=$tipo where idUsuario=$id)";
        $result = mysqli_query($con, $query);
        if($result){
            $resultData = array('status' => true, 'message' => 'Usuario Modificado...');
        }else{
            $resultData = array('status' => false, 'message' => 'No se ha podido modificar el usuario...');
        }
    }
    else{
        $resultData = array('status' => false, 'message' => 'Ingresar Detalles...');
    }
 
    echo json_encode($resultData);
}
if($accion == "BorrarUsuario"){
    
    $id = $_POST["idUsuario"];
    $query = "delete from usuarios where idUsuario=$id)";
        $result = mysqli_query($con, $query);
        if($result){
            $resultData = array('status' => true, 'message' => 'Usuario Borrado...');
        }else{
            $resultData = array('status' => false, 'message' => 'No se ha podido borrar el usuario...');
        }
    }
 
    echo json_encode($resultData);
}

    function getUsuarios()
    {
    global $con;
    $sql = 'SELECT * from usuarios order by Nombres';
    $arr = array();
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result))
        {
        $arr[] = $row;
        }

    echo json_encode($arr, JSON_PRETTY_PRINT | 32 | JSON_UNESCAPED_UNICODE);
    }

if($accion == "insertarReservaciones"){
 
    $idUsuario = $_POST["idUsuario"];
    $idHabitacion = $_POST["idHabitacion"];
    $FechaEntrada = $_POST["fechaEntrada"];
    $FechaSalida = $_POST["fechaSalida"];
    $precio = $_POST["precio"];
    
    
    if(!empty($precio)){
        $query = "INSERT INTO reservaciones(idUsuario,idHabitacion,FechaEntrada, FechaSalida, PrecioEstadiad) VALUES('$idUsuario', '$idHabitacion','$FechaEntrada,'$FechaSalida','$precio')";
        $result = mysqli_query($con, $query);
        if($result){
            $resultData = array('status' => true, 'message' => 'Nueva reservacion registrada...');
        }else{
            $resultData = array('status' => false, 'message' => 'No se ha podido agregar la reserva...');
        }
    }
    else{
        $resultData = array('status' => false, 'message' => 'Ingresar Detalles...');
    }
 
    echo json_encode($resultData);
}


function getHabitaciones()
    {
    global $con;
    $sql = 'SELECT * from habitaciones order by Descripcion';
    $arr = array();
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result))
        {
        $arr[] = $row;
        }

    echo json_encode($arr, JSON_PRETTY_PRINT | 32 | JSON_UNESCAPED_UNICODE);
    }


function getReservaciones()
    {
    global $con;
    $sql = 'SELECT * from reservaciones ORDER BY idReservacion desc limit 6 ';
    $arr = array();
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result))
        {
        $arr[] = $row;
        }

    echo json_encode($arr, JSON_PRETTY_PRINT | 32 | JSON_UNESCAPED_UNICODE);
    }

    function getReservacionesByUsuario()
    {
    global $con;
    $id = $_GET['idusuario'];
    $sql = "SELECT * from reservaciones where idUsuario = '".$tipo."'";
    $arr = array();
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result))
        {
        $arr[] = $row;
        }

    echo json_encode($arr, JSON_PRETTY_PRINT | 32 | JSON_UNESCAPED_UNICODE);
    }

//Obtiene fecha de actualizacion
function getUpdate()
    {
    global $con;
    $sql = 'SELECT * from f_update';
    $arr = array();
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result))
        {
        $arr[] = $row;
        }

    echo json_encode($arr, JSON_PRETTY_PRINT | 32 | JSON_UNESCAPED_UNICODE);
    }
