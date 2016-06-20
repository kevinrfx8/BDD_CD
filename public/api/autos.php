<?php
session_start();
header("Content-Type: application/json;charset=utf-8");
require("connectionA.php");
require("connectionB.php");
$connectionA=connect();
$connectionB=connect2();
$method = $_SERVER['REQUEST_METHOD'];
switch($method){
    case "GET":
        /*
        if(isset($_GET['id'])){//regresar solo un objeto
            $idAerolinea=$_GET['id'];
            $query="SELECT * FROM hotel,direccion,estado,municipio WHERE idHotel='$idAerolinea' and hotel.idDireccion=direccion.idDireccion
            and direccion.idMunicipio=municipio.idMunicipio and municipio.idEstado=estado.idEstado;";
            $result=$connectionA -> query($query);
            $row=$result->fetch_array(MYSQLI_ASSOC);
            $id=$row['idAerolinea']; //$respuesta=array("id"=>$row['idHotel'],"nombre"=>$row['nombre'],"telefono"=>$row['telefono'],"sitioWeb"=>$row['sitioWeb'],"logoUrl"=>$row['logoUrl'],"imgUrl"=>"img/aerolineas/$id.png".time());
            
            $respuesta=array("id"=>$row['idHotel']);
            echo json_encode($respuesta);
        }
        else{//regresar un array*/
            //echo json_encode($ar2);
            $idAgencia=$_GET['id'];
            $query="SELECT * FROM autoA,tipoAuto,agencia,direccion,estado,municipio WHERE autoA.idAgencia=$idAgencia and autoA.idTipoAuto=tipoAuto.idTipoAuto and autoA.idAgencia=agencia.idAgencia and agencia.idDireccion=direccion.idDireccion
            and direccion.idMunicipio=municipio.idMunicipio and municipio.idEstado=estado.idEstado;";
            $result=$connectionA -> query($query);
            $respuesta=array();
            while($row=$result->fetch_array(MYSQLI_ASSOC)){
                $idAuto=$row['idAuto'];
                $row['imgUrl']="img/autos/$idAuto.png?".time();
                $query="SELECT * FROM autoB where autoB.idAuto=$idAuto";
                $result2=$connectionB -> query($query);
                $row2=$result2->fetch_array(MYSQLI_ASSOC);
                
                $respuesta[]= (object) array_merge((array) $row, (array) $row2);
            }
            echo json_encode($respuesta);
       // }
        break;
    case "POST":
        $aerolinea=json_decode(file_get_contents('php://input'));
        
        $precio=$aerolinea->{'precio'};
        $modelo=$aerolinea->{'modelo'};
        $idTipo=$aerolinea->{'idTipoAuto'};
        $idAgencia=$aerolinea->{'idAgencia'};
        //$idDireccion=$connectionA->insert_id;
        
        $query="INSERT INTO autoA (precio,modelo,imgUrl,idTipoAuto,idAgencia) values('$precio','$modelo','image.png','$idTipo','$idAgencia')";
        $result=$connectionA -> query($query);
        //echo $agencia->{'msg'};
        $id=$connectionA->insert_id;
        
        $imagen= $aerolinea->{'imagen'};
        if($imagen!=""){
            $imagen = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagen));
            file_put_contents("../img/autos/$id.png", $imagen);
        }
       //$respuesta=array("ddsf"=>"sd"); 
        //$respuesta=array("id"=>$id,"nombre"=>$nombre,"telefono"=>$telefono,"logoUrl"=>"","imgUrl"=>"img/hoteles/$id.png?".time(),"estado"=>$estado,"municipio"=>$municipio,"calle"=>$calle,"numero"=>$numero,"codigopostal"=>$codigopostal,"idEstado"=>$idEstado,"idMunicipio"=>$idMunicipio,"idDireccion"=>$idDireccion);
        $respuesta=$aerolinea;
        echo json_encode($respuesta);
        break;
    case "PUT"://modificar
        $aerolinea=json_decode(file_get_contents('php://input'));
        
        $idEstado=$aerolinea->{'idEstado'};
        $estado=$aerolinea->{'estado'};
        $municipio=$aerolinea->{'municipio'};
        $idMunicipio=$aerolinea->{'idMunicipio'};
        $calle=$aerolinea->{'calle'};
        $numero=$aerolinea->{'numero'};
        $codigopostal=$aerolinea->{'codigopostal'};
        $idDireccion=$aerolinea->{'idDireccion'};
        $query="UPDATE direccion SET calle='$calle',numero='$numero',codigoPostal='$codigopostal',idMunicipio='$idMunicipio' WHERE idDireccion=$idDireccion";
        $result=$connectionA -> query($query);
        $id=$aerolinea->{'id'};
        
        $nombre=$aerolinea->{'nombre'};
        $telefono=$aerolinea->{'telefono'};
        $query="UPDATE hotel SET nombre='$nombre',telefono='$telefono',logoUrl='image.png',idDireccion='$idDireccion' WHERE idHotel='$id'";
        $result=$connectionA -> query($query);
        //echo $agencia->{'msg'};
        
        $imagen= $aerolinea->{'imagen'};
        if($imagen!=""){
            if (file_exists("../img/hoteles/$id.png")) {
                unlink("../img/hoteles/$id.png");
            }
            $imagen = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagen));
            file_put_contents("../img/hoteles/$id.png", $imagen);
        }
        $respuesta=array("id"=>$id,"nombre"=>$nombre,"telefono"=>$telefono,"logoUrl"=>"","imgUrl"=>"img/hoteles/$id.png?".time(),"estado"=>$estado,"municipio"=>$municipio,"calle"=>$calle,"numero"=>$numero,"codigopostal"=>$codigopostal,"idEstado"=>$idEstado,"idMunicipio"=>$idMunicipio,"idDireccion"=>$idDireccion);
        echo json_encode($respuesta);
        break;
    case "DELETE"://eliminar
        $id=$_GET['id'];
        $query="DELETE FROM autoA WHERE idAuto=$id;";
        $result=$connectionA -> query($query);
        $query="DELETE FROM autoB WHERE idAuto=$id;";
        $result=$connectionB -> query($query);
        break;
}