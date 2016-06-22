<?php
session_start();
header("Content-Type: application/json;charset=utf-8");
require("connectionA.php");
$connectionA=connect();
$method = $_SERVER['REQUEST_METHOD'];
switch($method){
    case "GET":
        if(isset($_GET['id'])){//regresar solo un objeto
            $idAerolinea=$_GET['id'];
            $query="SELECT * FROM agencia,direccion,estado,municipio WHERE idAgencia='$idAerolinea' and agencia.idDireccion=direccion.idDireccion
            and direccion.idMunicipio=municipio.idMunicipio and municipio.idEstado=estado.idEstado;";
            $result=$connectionA -> query($query);
            $row=$result->fetch_array(MYSQLI_ASSOC);
            $id=$row['idAgencia']; //$respuesta=array("id"=>$row['idAgencia'],"nombre"=>$row['nombre'],"telefono"=>$row['telefono'],"sitioWeb"=>$row['sitioWeb'],"logoUrl"=>$row['logoUrl'],"imgUrl"=>"img/aerolineas/$id.png".time());
            
            $respuesta=array("id"=>$row['idAgencia']);
            echo json_encode($respuesta);
        }
        else{//regresar un array
            //echo json_encode($ar2);
            $query="SELECT * FROM agencia,direccion,estado,municipio WHERE agencia.idDireccion=direccion.idDireccion
            and direccion.idMunicipio=municipio.idMunicipio and municipio.idEstado=estado.idEstado;";
            $result=$connectionA -> query($query);
            $respuesta=array();
            while($row=$result->fetch_array(MYSQLI_ASSOC)){
               $id=$row['idAgencia']; $fila=array("id"=>$row['idAgencia'],"nombre"=>$row['nombre'],"telefono"=>$row['telefono'],"logoUrl"=>$row['logoUrl'],"imgUrl"=>"img/agencias/$id.png?".time(),"estado"=>$row['estado'],"municipio"=>$row['municipio'],"calle"=>$row['calle'],"numero"=>$row['numero'],"codigopostal"=>$row['codigoPostal'],"idEstado"=>$row['idEstado'],"idMunicipio"=>$row['idMunicipio'],"idDireccion"=>$row['idDireccion']);
                //$fila=array("id"=>$row['idAgencia']);
                array_push($respuesta,$fila);
            }
            echo json_encode($respuesta);
        }
        break;
    case "POST":
        $aerolinea=json_decode(file_get_contents('php://input'));
        
        $idEstado=$aerolinea->{'idEstado'};
        $estado=$aerolinea->{'estado'};
        $municipio=$aerolinea->{'municipio'};
        $idMunicipio=$aerolinea->{'idMunicipio'};
        $calle=$aerolinea->{'calle'};
        $numero=$aerolinea->{'numero'};
        $codigopostal=$aerolinea->{'codigopostal'};
        $query="INSERT INTO direccion (calle,numero,codigoPostal,idMunicipio) VALUES ('$calle','$numero','$codigopostal','$idMunicipio')";
        $result=$connectionA -> query($query);
        
        $idDireccion=$connectionA->insert_id;
        
        $nombre=$aerolinea->{'nombre'};
        $telefono=$aerolinea->{'telefono'};
        $query="INSERT INTO agencia (nombre,telefono,logoUrl,idDireccion) values('$nombre','$telefono','image.png','$idDireccion')";
        $result=$connectionA -> query($query);
        //echo $agencia->{'msg'};
        
        $id=$connectionA->insert_id;
        
        $imagen= $aerolinea->{'imagen'};
        if($imagen!=""){
            $imagen = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagen));
            file_put_contents("../img/agencias/$id.png", $imagen);
        }
       //$respuesta=array("ddsf"=>"sd"); 
        $respuesta=array("id"=>$id,"nombre"=>$nombre,"telefono"=>$telefono,"logoUrl"=>"","imgUrl"=>"img/agencias/$id.png?".time(),"estado"=>$estado,"municipio"=>$municipio,"calle"=>$calle,"numero"=>$numero,"codigopostal"=>$codigopostal,"idEstado"=>$idEstado,"idMunicipio"=>$idMunicipio,"idDireccion"=>$idDireccion);
        echo json_encode($respuesta);
        break;
    case "PUT"://modificar
        $aerolinea=json_decode(file_get_contents('php://input'));
        
        $idEstado=$aerolinea->{'idEstado'};
        $estado=$aerolinea->{'estado'};
        $municipio=$aerolinea->{'municipio'};
        $idMunicipio=$aerolinea->{'idMunicipio'};
        $calle=$aerolinea->{'calle'};
        $numero=$aerolinea->{'numero'};
        $codigopostal=$aerolinea->{'codigopostal'};
        $idDireccion=$aerolinea->{'idDireccion'};
        $query="UPDATE direccion SET calle='$calle',numero='$numero',codigoPostal='$codigopostal',idMunicipio='$idMunicipio' WHERE idDireccion=$idDireccion";
        $result=$connectionA -> query($query);
        $id=$aerolinea->{'id'};
        
        $nombre=$aerolinea->{'nombre'};
        $telefono=$aerolinea->{'telefono'};
        $query="UPDATE agencia SET nombre='$nombre',telefono='$telefono',logoUrl='image.png',idDireccion='$idDireccion' WHERE idAgencia='$id'";
        $result=$connectionA -> query($query);
        //echo $agencia->{'msg'};
        
        $imagen= $aerolinea->{'imagen'};
        if($imagen!=""){
            if (file_exists("../img/agencias/$id.png")) {
                unlink("../img/agencias/$id.png");
            }
            $imagen = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagen));
            file_put_contents("../img/agencias/$id.png", $imagen);
        }
        $respuesta=array("id"=>$id,"nombre"=>$nombre,"telefono"=>$telefono,"logoUrl"=>"","imgUrl"=>"img/agencias/$id.png?".time(),"estado"=>$estado,"municipio"=>$municipio,"calle"=>$calle,"numero"=>$numero,"codigopostal"=>$codigopostal,"idEstado"=>$idEstado,"idMunicipio"=>$idMunicipio,"idDireccion"=>$idDireccion);
        echo json_encode($respuesta);
        break;
    case "DELETE"://eliminar
        $idAerolinea=$_GET['id'];
        $query="DELETE FROM agencia WHERE idAgencia=$idAerolinea;";
        $result=$connectionA -> query($query);
        break;
}