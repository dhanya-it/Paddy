<?php




    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "rice_landers";

     // Create connection
    $conn = new mysqli($servername, $username, $password, $db_name);


    //Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_GET['deleteid'])) {
        $userid = $_GET['deleteid'];
    
        $sql = "DELETE FROM farmer WHERE id = '$userid'";
        $result = mysqli_query($conn,$sql);
        if($result) {
            header("location: ../farmerLogin.html");
        }
        else {
            die(mysqli_error($conn));
        }
    }

?>