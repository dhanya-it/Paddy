<?php
$servername = "localhost";  // Update with your server details
$username = "root";         // Your MySQL username
$password = "";             // Your MySQL password
$dbname = "rice_landers";  // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo "Connected successfully";
}
?>
