<?PHP            
    function connect(){
        $servername = "192.168.93.131";
        $username = "root";
        $password = "1234";
        $database = "BDDA";
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

    function disconnect($connection){
        $disconnect = mysqli_close($connection);
    }
?>