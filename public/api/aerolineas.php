<?php
session_start();
header("Content-Type: application/json;charset=utf-8");
require("connectionA.php");
$connectionA=connect();
$method = $_SERVER['REQUEST_METHOD'];
switch($method){
    case "GET":
        if(isset($_GET['id'])){//regresar solo un objeto
            $idAerolinea=$_GET['id'];
            $query="SELECT * FROM aerolinea WHERE idAerolinea='$idAerolinea';";
            $result=$connectionA -> query($query);
            $row=$result->fetch_array(MYSQLI_ASSOC);
            $id=$row['idAerolinea']; $respuesta=array("id"=>$row['idAerolinea'],"nombre"=>$row['nombre'],"telefono"=>$row['telefono'],"sitioWeb"=>$row['sitioWeb'],"logoUrl"=>$row['logoUrl'],"imgUrl"=>"img/aerolineas/$id.png".time());
            echo json_encode($respuesta);
        }
        else{//regresar un array
            //echo json_encode($ar2);
            $query="SELECT * FROM aerolinea;";
            $result=$connectionA -> query($query);
            $respuesta=array();
            while($row=$result->fetch_array(MYSQLI_ASSOC)){
               $id=$row['idAerolinea']; $fila=array("id"=>$row['idAerolinea'],"nombre"=>$row['nombre'],"telefono"=>$row['telefono'],"sitioWeb"=>$row['sitioWeb'],"logoUrl"=>$row['logoUrl'],"imgUrl"=>"img/aerolineas/$id.png?".time());
                array_push($respuesta,$fila);
            }
            echo json_encode($respuesta);
        }
        break;
    case "POST":
        $aerolinea=json_decode(file_get_contents('php://input'));
        $nombre=$aerolinea->{'nombre'};
        $telefono=$aerolinea->{'telefono'};
        $sitioWeb=$aerolinea->{'sitioWeb'};
        $query="INSERT INTO aerolinea (nombre,telefono,sitioWeb,logoUrl) values('$nombre','$telefono','$sitioWeb','image.png')";
        $result=$connectionA -> query($query);
        //echo $agencia->{'msg'};
        $id=$connectionA->insert_id;
        $imagen= $aerolinea->{'imagen'};
        if($imagen!=""){
            $imagen = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagen));
            file_put_contents("../img/aerolineas/$id.png", $imagen);
        }
        /*list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);*/

        //file_put_contents('/tmp/image.png', $data);
        
        
        //echo file_get_contents('php://input');
        $respuesta=array("id"=>$id,"nombre"=>$nombre,"telefono"=>$telefono,"sitioWeb"=>$sitioWeb,"logoUrl"=>"","imgUrl"=>"img/aerolineas/$id.png?".time());
        echo json_encode($respuesta);
        break;
    case "PUT"://modificar
        $id=$_GET['id'];
        $aerolinea=json_decode(file_get_contents('php://input'));
        $nombre=$aerolinea->{'nombre'};
        $telefono=$aerolinea->{'telefono'};
        $sitioWeb=$aerolinea->{'sitioWeb'};
        $query="UPDATE aerolinea SET nombre='$nombre',telefono='$telefono',sitioWeb='$sitioWeb' where idAerolinea=$id";
        $result=$connectionA -> query($query);
        //echo $agencia->{'msg'};
        
        $imagen= $aerolinea->{'imagen'};
        if($imagen!=""){
            if (file_exists("../img/aerolineas/$id.png")) {
                unlink("../img/aerolineas/$id.png");
            }
            $imagen = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagen));
            file_put_contents("../img/aerolineas/$id.png", $imagen);
        }
        $respuesta=array("id"=>$id,"nombre"=>$nombre,"telefono"=>$telefono,"sitioWeb"=>$sitioWeb,"logoUrl"=>"","imgUrl"=>"img/aerolineas/$id.png?".time());
        echo json_encode($respuesta);
        break;
    case "DELETE"://eliminar
        $idAerolinea=$_GET['id'];
        $query="DELETE FROM aerolinea WHERE idAerolinea=$idAerolinea;";
        $result=$connectionA -> query($query);
        break;
}