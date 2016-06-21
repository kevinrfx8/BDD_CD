<?php
session_start();
header("Content-Type: application/json;charset=utf-8");
require("connectionA.php");
$connectionA=connect();
$method = $_SERVER['REQUEST_METHOD'];
switch($method){
    case "GET":
        if(isset($_GET['id'])){//regresar solo un objeto
        }
        else{//regresar un array
            //echo json_encode($ar2);
            $query="SELECT * FROM estado;";
            $result=$connectionA -> query($query);
            $respuesta=array();
            while($row=$result->fetch_array(MYSQLI_ASSOC)){
               
                $fila=array("id"=>$row['idEstado'],"estado"=>$row['estado']);
                //$fila=array("id"=>$row['idHotel']);
                array_push($respuesta,$fila);
            }
            echo json_encode($respuesta);
        }
        break;
}