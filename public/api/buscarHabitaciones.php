<?php
session_start();
header("Content-Type: application/json;charset=utf-8");
require("connectionA.php");
require("connectionB.php");
$connectionA=connect();
$connectionB=connect2();
$method = $_SERVER['REQUEST_METHOD'];
switch($method){
    case "POST":
        $request=json_decode(file_get_contents('php://input'));
        
        
        $idMunicipio=$request->{'idMunicipio'};        
        //$idMunicipio=76;      
        
        
         $query="SELECT * FROM habitacion,tipoHabitacion,hotel,direccion,estado,municipio WHERE municipio.idMunicipio=$idMunicipio and habitacion.idTipoHabitacion=tipoHabitacion.idTipoHabitacion and habitacion.idHotel=hotel.idHotel and hotel.idDireccion=direccion.idDireccion
            and direccion.idMunicipio=municipio.idMunicipio and municipio.idEstado=estado.idEstado;";
        $result=$connectionA -> query($query);
        $respuesta=array();
        
        while($row=$result->fetch_array(MYSQLI_ASSOC)){
            $idAuto=$row['idHabitacion'];
            $row['imgUrl']="img/habitaciones/$idAuto.png?".time();
            $respuesta[]= $row;
        }
        
        
        echo json_encode($respuesta);
        break;
}