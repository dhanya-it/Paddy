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
            // Get User Details
          $query = "Select * from admin where admin_email='$userid'";
          $results = mysqli_query($conn,$query);
  
          if($row = mysqli_fetch_assoc($results))
          {
              $db_pass = $row['admin_password'];
  
              if ($db_pass == $user_pass) {
  
                  $current_name = "Select * from admin where admin_email='$userid'";
                  $results = mysqli_query($conn,$current_name);
                  $row2 = mysqli_fetch_assoc($results);
                  $id = $row2['admin_id'];
                  $name = $row2['admin_name'];
                  $email = $row2['admin_email'];
                  $phone = $row2['admin_phone'];

                  session_start(); // Right at the top of your script
                  $_SESSION['logged']=true;
                  $_SESSION['id']=$id;
                  $_SESSION['name']=$name;
                  $_SESSION['email']=$email;
                  $_SESSION['address']=$address;
                  $_SESSION['phone']=$phone;
                  header("Location: ../Rice Lander.php"); //auto redirect to this page
                  exit();
  
  
              }
              else {
                  echo 'wrong pass';
                  $_SESSION['logged']=false;
                          header("Location: ../AdminLogin.html");
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