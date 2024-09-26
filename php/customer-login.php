<?php
// Include database connection file
include 'db_connect.php'; // Ensure this file contains the correct database connection code

session_start(); // Start a new session or resume the existing session

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insert data directly into the database
    $sql = "SELECT password FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    // Check if the username exists
    if ($result->num_rows > 0) {
        // Fetch the password from the database
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verify the password (no hashing check)
        if ($password == $hashedPassword) {
            // Password is correct, set session variables
            $_SESSION['username'] = $username;
            header("Location: ./Customer Home.php"); // Redirect to the customer home page
            exit();
        } else {
            echo "Error: Incorrect password.";
        }
    } else {
        echo "Error: Username not found.";
    }
}

// Close the database connection
$conn->close();
?>
