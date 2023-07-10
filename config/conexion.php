<?php 

require_once "global.php";

$conexion= new mysqli(DB_HOST, DB_USERNAME,DB_PASSWORD, DB_NAME);
mysqli_query($conexion, 'SET NAMES "'.DB_ENCONDE. '" ');

if(mysqli_connect_errno()){

    printf("Fallo la conexion a la base de datos: %\n", mysqli_connect_errno());
    exit(); 

}


// es compo para devolver todo los usuarios
function ejecutarConsulta($sql){
    
    global $conexion;

    $query = $conexion->query($sql);
    return $query;
}

// para devolver todo
function ejecutarConsultaUnica($sql){

    global $conexion;
    $query = $conexion->query($sql);
    $row =$query->fetch_assoc();
    return $row;

}

function ejecutarConsutaRetornarUnId($sql){
    global $conexion;
    $query=$conexion->query($sql);
    return $conexion->insert_id;
}

function limpiarCadena($str){
    global $conexion;
    $str = mysqli_real_escape_string($conexion, trim($str));
    return htmlspecialchars($str);
}

?>