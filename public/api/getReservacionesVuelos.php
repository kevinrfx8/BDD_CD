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
            $query="SELECT *, edo.estado as estadoOrigen, edo2.estado as estadoDestino FROM reservaVuelo,vueloA as v,estado as edo, estado as edo2 WHERE  reservaVuelo.idUsuario=$idUsr and reservaVuelo.idVuelo=v.idVuelo and v.idEstadoOrigen=edo.idEstado and v.idEstadoDestino=edo2.idEstado";
            $result=$connectionA -> query($query);
            $respuesta=array();
            while($row=$result->fetch_array(MYSQLI_ASSOC)){
                $idVuelo=$row['idVuelo'];
                $row['imgUrl']="img/vuelos/$idVuelo.png?".time();
                $query="SELECT * FROM vueloB where idVuelo=$idVuelo";
                $result2=$connectionB -> query($query);
                $row2=$result2->fetch_array(MYSQLI_ASSOC);
                
                $respuesta[]= (object) array_merge((array) $row, (array) $row2);
            }
            echo json_encode($respuesta);
       // }
        break;
    
}