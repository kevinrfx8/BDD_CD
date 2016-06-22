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
        
        $array["a"]=1;
        $array["b"]=2;
        $array["c"]=3;
        foreach($array as $key => $value){
            echo $array[$key]." ".$key;
        }
        break;
    case "POST":
        $request=json_decode(file_get_contents('php://input'));
        
        
        $condiciones['fechaSalida']=$request->{'fechaSalida'};
        $condiciones['idEstadoOrigen']=$request->{'idEstadoOrigen'};
        $condiciones['idEstadoDestino']=$request->{'idEstadoDestino'};
        $condiciones['idAerolinea']=$request->{'idAerolinea'};
        
        
        //Revisando Condiciones
     
        $condicion="";
        
        foreach($condiciones as $key => $value){
            if($condiciones[$key]!=""){
               if($key=='fechaSalida'){
                   $condicion.="AND $key=STR_TO_DATE('".$request->{'fechaSalida'}."', '%m/%d/%Y') ";
               }
                else{
                $condicion.="AND $key='".$condiciones[$key]."' ";
                }
            }
        }
        $query="SELECT *, edo.estado as estadoOrigen, edo2.estado as estadoDestino FROM vueloA as v,estado as edo, estado as edo2 WHERE v.idEstadoOrigen=edo.idEstado and v.idEstadoDestino=edo2.idEstado $condicion";
        
        $result=$connectionA -> query($query);
        $respuesta=array();
        
        while($row=$result->fetch_array(MYSQLI_ASSOC)){
            $idVuelo=$row['idVuelo'];
            $row['query']=$query;
            $row['imgUrl']="img/vuelos/$idVuelo.png?".time();
            $query="SELECT * FROM vueloB WHERE idVuelo=$idVuelo";
            $result2=$connectionB -> query($query);
            $row2=$result2->fetch_array(MYSQLI_ASSOC);
            $respuesta[]= (object) array_merge((array) $row, (array) $row2);
        }
        echo json_encode($respuesta);
        break;
}