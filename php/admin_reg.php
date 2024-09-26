<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "rice_landers";

$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$admin_password = $_POST["password"];


// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

  $sql1 = "INSERT INTO admin (admin_name, admin_email, admin_phone, admin_password)
        VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql1)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssss",
                       $name,
                       $email,
                       $phone,
                       $admin_password);

                       mysqli_stmt_execute($stmt);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>successfully Created</title>
</head>
<body>
    <h1>Account Created successfully <a href="../AdminLogin.html">Back to Login</a></h1>
</body>
</html>