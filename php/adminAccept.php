




<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "rice_landers";


$paddyType = $_POST["paddyType"] ?? NULL;
$harvestAmount = $_POST["harvestAmount"] ?? NULL;

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql1 = "INSERT INTO quotations ( rice_type, amount)
        VALUES (?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql1)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "si",
                       $paddyType,
                       $harvestAmount
                    );

mysqli_stmt_execute($stmt);





if (isset($farmerId) == true ) {
    header("location: ../farmer-add-harvest.php");
}

?>
