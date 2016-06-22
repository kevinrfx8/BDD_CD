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
        
        
        $tipo=$request->{'tipo'};
        $idVuelo=$request->{'idVuelo'};
        $condiciones['idEstadoOrigen']=$request->{'idEstadoOrigen'};
        $condiciones['idEstadoDestino']=$request->{'idEstadoDestino'};
        $condiciones['idAerolinea']=$request->{'idAerolinea'};
        
        
        //Revisando Condiciones
     
        
        $query="SELECT *, edo.estado as estadoOrigen, edo2.estado as estadoDestino FROM vueloA as v,estado as edo, estado as edo2 WHERE v.idEstadoOrigen=edo.idEstado and v.idEstadoDestino=edo2.idEstado $condicion";
        
        $result=$connectionA -> query($query);
        
        echo json_encode($request);
        break;
}