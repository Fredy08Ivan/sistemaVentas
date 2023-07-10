<?php 

require_once "../models/categoria.php";


$categoria = new Categoria();


$idCategoria=isset($_POST["idCatgeoria"])? limpiarCadena($_POST["idCategoria"]):"";

$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";

$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";


// localhotst.com?op=guardarEditar

switch($_GET["op"]){
    case 'guardarEditar':

        if(empty($idCategoria)){

            $respuesta=$categoria->insertar($nombre, $descripcion);
            echo $respuesta? "Categoria registrada" :  "Categoria no se pudo registrar";
        }else{
            $respuesta=$categoria->editar($idCategoria, $nombre, $descripcion);
            echo $respuesta? "Categoria actualizada" : "Categoria no se pudo actualizar";
        }
        
    break;


    case 'desactivar':
        $respuesta=$categoria->desactivar($idCategoria);
        echo $respuesta ? "Categoria Desactivada" : "Categoria no se puede desactivar";
        break;

    break;


    case 'activar':
        $respuesta=$categoria->activar($idCategoria);
        echo $respuesta ? "Categoria activada" : "Categoria no se puede activar";
        break;

    break;


    case 'mostrar':
        $respuesta=$categoria->mostrar($idCategoria);
        echo json_encode($respuesta);
        break;

    break;

    
    case 'listar':
        $respuesta=$categoria->listar();
        $data=Array();

        while($resp=$respuesta->fetch_object()){
            $data[]=array(
                "0"=>$resp->idCategoria,
                "1"=>$resp->nombre,
                "2"=>$resp->descripcion,
                "3"=>$resp->condicion,

            );

        }

        $result= array(
            "echo"=>1,
            "totalrecords"=>count($data),
            "iTotalDisplay"=>count($data),
            "aaData"=>$data,
        );

        echo json_encode($result);

    break;


}



?>