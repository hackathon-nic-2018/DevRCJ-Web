<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
//Incluye archivo db.php que contiene los datos para la conexio MysQL

//Definiendo cabecera para tipo json
header('Content-Type: application/json');
$accion = '';

function ActualizarUsuario(){
    include('../utilidades/conexion.php');
    
    $idusuario = $_GET["idusuario"];
    $nombres = $_GET["nombres"];
    $apellidos = $_GET["apellidos"];
    $email = $_GET["email"];
    $foto = $_GET["edad"];
    $foto = $_GET["estadocivil"];
    $foto = $_GET["descripcion"];
    $foto = $_GET["url"];
    $foto = $_GET["tipo"];

    $query = "update usuarios set Nombres='$nombres',Apellidos='$apellidos',email='$email',Foto=$foto,Edad='$edad',EstadoCivil='$estadocivil',Autodescripcion='$descripcion',url='$url',tipo='$tipo' where idUsuario = $idusuario )";
    $result = mysqli_query($con, $query);

    if($result){
            $resultData = array('status' => true, 'message' => 'Usuario actualizado...');
        }else{
            $resultData = array('status' => false, 'message' => 'No se ha podido actualizar el usuario...');
        }
    echo json_encode($resultData);
    echo $query;
    }

    ActualizarUsuario();
