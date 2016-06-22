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
            $idUsr=$_SESSION['id'];
            $query="SELECT * FROM reservaHabitacion,habitacion,tipoHabitacion,hotel,direccion,estado,municipio WHERE reservaHabitacion.idUsuario=$idUsr and reservaHabitacion.idHabitacion=habitacion.idHabitacion and habitacion.idTipoHabitacion=tipoHabitacion.idTipoHabitacion and habitacion.idHotel=hotel.idHotel and hotel.idDireccion=direccion.idDireccion
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
   
}