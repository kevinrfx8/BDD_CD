<?php
session_start();
header("Content-Type: application/json;charset=utf-8");
require("connectionA.php");
$connectionA=connect();
$method = $_SERVER['REQUEST_METHOD'];
switch($method){
    case "POST":
        $aerolinea=json_decode(file_get_contents('php://input'));
        
        
        $idMunicipio=$aerolinea->{'idMunicipio'};
        $calle=$aerolinea->{'calle'};
        $numero=$aerolinea->{'numero'};
        $codigopostal=$aerolinea->{'codigopostal'};
        $query="INSERT INTO direccion (calle,numero,codigoPostal,idMunicipio) VALUES ('$calle','$numero','$codigopostal','$idMunicipio')";
        $result=$connectionA -> query($query);
        
        $idDireccion=$connectionA->insert_id;
        
        
        $nickname=$aerolinea->{'nickname'};
        $pass=$aerolinea->{'pass'};
        $query="INSERT INTO usuarioA (nickname,contraseña,idDireccion,tipo) values('$nickname','$pass','$idDireccion','1')";
        $result=$connectionA -> query($query);
        //echo $agencia->{'msg'};
        $id=$connectionA->insert_id;
        
       
       //$respuesta=array("ddsf"=>"sd"); 
        $respuesta=array("array"=>"array");
        echo json_encode($respuesta);
        break;
}