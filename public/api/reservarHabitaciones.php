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
        $idUsuario=1;//lo sacará de la sesión

        $query="INSERT INTO reservaVuelo (idVuelo,idUsuario) VALUES($idVuelo,$idUsuario)";
        $result=$connectionA -> query($query);
        
        
        
        $query="UPDATE vueloB SET $tipo=$tipo-1 WHERE idVuelo=$idVuelo";
        $result=$connectionB -> query($query);
        echo json_encode($request);
        break;
}