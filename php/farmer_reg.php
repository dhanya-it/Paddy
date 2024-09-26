<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "rice_landers";

$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$address = $_POST["address"];
$age = $_POST["age"];
$user_password = $_POST["password"];


// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

  $sql1 = "INSERT INTO farmer (name, phone, address, password, age, email)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql1)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssssis",
                       $name,
                       $phone,
                       $address,
                       $user_password,
                       $age,
                       $email);

                       mysqli_stmt_execute($stmt);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Account Created successfully <a href="../farmerLogin.html">Back to Login</a></h1>
</body>
</html>