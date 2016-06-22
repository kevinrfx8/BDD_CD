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
        
        
        $idAuto=$request->{'idAuto'};
        $fecha=$request->{'fecha'};
        $dias=$request->{'dias'};
        $idUsuario=$_SESSION['id'];

        $query="INSERT INTO reservaAuto (idAuto,idUsuario,fecha,dias) VALUES($idAuto,$idUsuario,STR_TO_DATE('$fecha', '%m/%d/%Y'),$dias)";
        $result=$connectionA -> query($query);
        
    
        echo json_encode($request);
        break;
}