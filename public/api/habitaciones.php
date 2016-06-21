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
            $idHotel=$_GET['id'];
            $query="SELECT * FROM habitacion,tipoHabitacion,hotel,direccion,estado,municipio WHERE habitacion.idHotel='$idHotel' and habitacion.idTipoHabitacion=tipoHabitacion.idTipoHabitacion and habitacion.idHotel=hotel.idHotel and hotel.idDireccion=direccion.idDireccion
            and direccion.idMunicipio=municipio.idMunicipio and municipio.idEstado=estado.idEstado;";
            $result=$connectionA -> query($query);
            $respuesta=array();
            while($row=$result->fetch_array(MYSQLI_ASSOC)){
                $idHabitacion=$row['idHabitacion'];
                $row['imgUrl']="img/habitaciones/$idHabitacion.png?".time();
                $respuesta[]= $row;
            }
            echo json_encode($respuesta);
       // }
        break;
    case "POST":
        $aerolinea=json_decode(file_get_contents('php://input'));
        
        $precio=$aerolinea->{'precio'};
        $descripcion=$aerolinea->{'descripcion'};
        $idTipo=$aerolinea->{'idTipoHabitacion'};
        $idHotel=$aerolinea->{'idHotel'};
        //$idDireccion=$connectionA->insert_id;
        
        $query="INSERT INTO habitacion (precio,descripcion,imgUrl,idTipoHabitacion,idHotel) values('$precio','$descripcion','image.png','$idTipo','$idHotel')";
        
         $result=$connectionA -> query($query);
        //echo $agencia->{'msg'};
        $id=$connectionA->insert_id;
            
        $imagen= $aerolinea->{'imagen'};
        if($imagen!=""){
            $imagen = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagen));
            file_put_contents("../img/habitaciones/$id.png", $imagen);
        }
        $aerolinea->{'imgUrl'}="img/habitaciones/$id.png?".time();
        $aerolinea->{'idHabitacion'}=$id;
        $respuesta=$aerolinea;
        echo json_encode($respuesta);
        break;
    case "PUT"://modificar
        $aerolinea=json_decode(file_get_contents('php://input'));
        
        $precio=$aerolinea->{'precio'};
        $descripcion=$aerolinea->{'descripcion'};
        $idTipo=$aerolinea->{'idTipoHabitacion'};
        $idHabitacion=$aerolinea->{'idHabitacion'};
        //$idDireccion=$connectionA->insert_id;
        
        $query="UPDATE habitacion SET precio='$precio', descripcion='$descripcion', imgUrl='image.png', idTipoHabitacion='$idTipo' WHERE idHabitacion='$idHabitacion';";
        $result=$connectionA -> query($query);
        
        //echo $agencia->{'msg'};
        
        $imagen= $aerolinea->{'imagen'};
        if($imagen!=""){
            if (file_exists("../img/habitaciones/$idHabitacion.png")) {
                unlink("../img/habitaciones/$idHabitacion.png");
            }
            $imagen = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagen));
            file_put_contents("../img/habitaciones/$idHabitacion.png", $imagen);
        }
        //$respuesta=array("id"=>$id,"nombre"=>$nombre,"telefono"=>$telefono,"logoUrl"=>"","imgUrl"=>"img/hoteles/$id.png?".time(),"estado"=>$estado,"municipio"=>$municipio,"calle"=>$calle,"numero"=>$numero,"codigopostal"=>$codigopostal,"idEstado"=>$idEstado,"idMunicipio"=>$idMunicipio,"idDireccion"=>$idDireccion);
        $aerolinea->{'imgUrl'}="img/autos/$idHabitacion.png?".time();
        
        $respuesta=$aerolinea;
        echo json_encode($respuesta);
        break;
    case "DELETE"://eliminar
        $id=$_GET['id'];
        $query="DELETE FROM habitacion WHERE idHabitacion=$id;";
        $result=$connectionA -> query($query);
        break;
}