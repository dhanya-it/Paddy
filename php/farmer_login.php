<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "rice_landers";

$userid = $_POST["email"];
$user_pass = $_POST["user_pass"];

 // Create connection
 $conn = new mysqli($servername, $username, $password, $db_name);


 // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
  
  if (isset($_POST['btn-loggin']))
  {
      if (empty($userid) || empty($user_pass))
      {
          echo " Please fill blanks";
      }
      else 
      {
          $query = "Select * from farmer where email='$userid'";
          $results = mysqli_query($conn,$query);
  
          if($row = mysqli_fetch_assoc($results))
          {
              $db_pass = $row['password'];
  
              if ($db_pass == $user_pass) {
  
                  $current_name = "Select * from farmer where email='$userid'";
                  $results = mysqli_query($conn,$current_name);
                  $row2 = mysqli_fetch_assoc($results);
                  $id = $row2['id'];
                  $name = $row2['name'];
                  $age = $row2['age'];
                  $email = $row2['email'];
                  $address = $row2['address'];
                  $phone = $row2['phone'];

                  session_start(); // Right at the top of your script
                  $_SESSION['logged']=true;
                  $_SESSION['id']=$id;
                  $_SESSION['name']=$name;
                  $_SESSION['age']=$age;
                  $_SESSION['email']=$email;
                  $_SESSION['address']=$address;
                  $_SESSION['phone']=$phone;
                  echo "logged";
                  header("Location: ../farmer-dashboard.php");
                  exit();
  
  
              }
              else {
                  echo 'wrong pass';
                  $_SESSION['logged']=false;
                          header("Location: ../farmerLogin.html");
                          exit();
              }
          }
          else
          {
              echo ' please check the inputs';
          }
      }
  }

?>