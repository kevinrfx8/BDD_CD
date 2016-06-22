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
        
        
        $nickname=$request->{'nickname'};
        $pass=$request->{'pass'};

        $query="SELECT * FROM usuarioA WHERE nickname='$nickname' and contraseña='$pass'";
        $result=$connectionA -> query($query);
        $row=$result->fetch_array(MYSQLI_ASSOC);
        
        if($result->num_rows==0){
            $respuesta=array("estado"=>false);    
        }
        else{
            $respuesta=array("estado"=>true);
            $_SESSION['id']=$row['idUsuario'];
            $_SESSION['tipo']=1;
        }
        echo json_encode($respuesta);
        break;
}