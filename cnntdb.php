<?php    
    $conn;

    function connect()
    {
        global $conn;
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "rmbkngdb";

        $conn = mysqli_connect("localhost","root","root","rmbkngdb",3307);
       // echo "1";
       

        if ($conn->connect_errno) {
            
            die("<div class=\"alert alert-danger\" role=\"alert\">Connection failed: ".$conn->connect_error()."</div>");
        }
    }

    

?>