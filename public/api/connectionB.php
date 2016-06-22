<?PHP            
    function connect2(){
        $servername = "25.12.17.29";
        $username = "usuario";
        $password = "1234";
        $database = "BDDB";
        $conn = new mysqli($servername, $username, $password, $database);
        
        if(mysqli_connect_errno()){
            echo "Error conectando a la base de datos: " . mysqli_connect_error();
            exit();
        }
        else{
            $conn->query("SET NAMES 'utf8'");
            return $conn;
        }
        
    }

    function disconnect2($connection){
        $disconnect = mysqli_close($connection);
    }
?>