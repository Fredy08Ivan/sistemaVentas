<?php 

require_once "../config/conexion.php";

class categoria{

    public  function ___construct(){

    }

    public function insertar($nombre, $descripcion){

        $sql= "INSERT INTO categoria(nombre,descripcion,condicion) VALUES('$nombre', '$descripcion', '1')";
        return ejecutarConsulta($sql);
    }

    public function editar($idCategoria, $nombre, $descripcion){
        $sql="UPDATE categoria SET nombre='$nombre', descripcion='$descripcion' WHERE idCategoria='$idCategoria'";
        return ejecutarConsulta($sql);

    }
    public function desactivar($idCategoria){
        $sql = "UPDATE categoria SET condicion='0' WHERE idCategoria='$idCategoria'";
        return ejecutarConsulta($sql);
    }

    public function activar($idCategoria){
        $sql = "UPDATE categoria SET condicion = '1' WHERE idCategoria='$idCategoria'";
        return ejecutarConsulta($sql);
    }

    public function mostrar($idCategoria){
        $sql= "SELECT * FROM categoria WHERE idCategoria='$idCategoria'";
        return ejecutarConsultaUnica($sql);
    }

    public function listar(){
        $sql = "SELECT * FROM categoria";
        return ejecutarConsulta($sql);
    }




}

?>