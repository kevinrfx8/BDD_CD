<?php
session_start();
header("Content-Type: application/json;charset=utf-8");
require("connectionA.php");
$connectionA=connect();
$method = $_SERVER['REQUEST_METHOD'];
switch($method){
    case "GET":
        if(isset($_GET['id'])){//regresar solo un objeto
            $id=$_GET['id'];
            $query="SELECT * FROM municipio where idEstado=$id;";
            $result=$connectionA -> query($query);
            $respuesta=array();
            while($row=$result->fetch_array(MYSQLI_ASSOC)){
               
                $fila=array("id"=>$row['idMunicipio'],"municipio"=>$row['municipio']);
                //$fila=array("id"=>$row['idHotel']);
                array_push($respuesta,$fila);
            }
            echo json_encode($respuesta);
        }
        else{//regresar un array
            //echo json_encode($ar2);
            
        }
        break;
}