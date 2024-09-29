




<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "rice_landers";

$farmerId = $_POST["farmerId"] ?? NULL;
$farmerName = $_POST["farmerName"] ?? NULL;
$paddyType = $_POST["paddyType"] ?? NULL;
$harvestAmount = $_POST["harvestAmount"] ?? NULL;

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql1 = "INSERT INTO temp_quotations (farmer_id, FarmerName, rice_type, amount)
        VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql1)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sssi",
                       $farmerId,
                       $farmerName,
                       $paddyType,
                       $harvestAmount
                    );

mysqli_stmt_execute($stmt);


if (isset($farmerId) == true ) {
    header("location: ../farmer-add-harvest.php");
}

?>
