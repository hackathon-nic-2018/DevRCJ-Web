<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
//Incluye archivo db.php que contiene los datos para la conexio MysQL

//Definiendo cabecera para tipo json
header('Content-Type: application/json');
$accion = '';

function Insertar(){
    include('../utilidades/conexion.php');

    $nombres = $_GET["nombres"];
    $apellidos = $_GET["apellidos"];
    $email = $_GET["email"];
    $foto = $_GET["foto"];

    $query = "INSERT INTO usuarios(Nombres,Apellidos,email,Foto,Edad,EstadoCivil,Autodescripcion,url,tipo) VALUES('$nombres','$apellidos','$email','$foto',0,'','','','')";
    $result = mysqli_query($con, $query);

    if($result){
            $resultData = array('status' => true, 'message' => 'Nuevo usuario registrado...');
        }else{
            $resultData = array('status' => false, 'message' => 'No se ha podido agregar el usuario...');
        }


    echo json_encode($resultData);

    echo $query;

    }

    Insertar();
