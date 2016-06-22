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
        
            
            $idUser=$_SESSION['id'];
            $query="SELECT * FROM reservaAuto,autoA,tipoAuto,agencia,direccion,estado,municipio WHERE reservaAuto.idUsuario=$idUser and reservaAuto.idAuto=autoA.idAuto and autoA.idTipoAuto=tipoAuto.idTipoAuto and autoA.idAgencia=agencia.idAgencia and agencia.idDireccion=direccion.idDireccion
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
   
}