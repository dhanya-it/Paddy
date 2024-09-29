




<?php
session_start();

$id = $_SESSION["id"];

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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Dashboard</title>
    <link rel="stylesheet" href="./css/farmerDashboard.css">
</head>
<body>
    <div class="dashboard">
        <div class="navbar">
            <h1 class="logo">Rice Lander </h1>
            <ul class="navList">
            <li><a href="farmer-dashboard.php" class="navList-item">Profile</a></li>
            <li><a href="farmer-add-harvest.php" class="navList-item">Manage Harvest</a></li>
            </ul>
            <div>
                <HR></HR>
                <div class="logout-sec">
                    <a href="#">Log Out</a>
                </div>
            </div>
        </div>
        <div class="dashboard-sec1">
        
        

            <div class="dashboard-sec1-top">
                <div class="profile-sec">
                    <img src="./assets/user.png" class="profile-photo"></img>  
                    <?php
                        $result2 = mysqli_query($conn, "SELECT * FROM farmer WHERE id='".$id."'");
                        $row = mysqli_fetch_array($result2); ?>
                    <h1 class="profile-sec-name"><?php echo $row["name"]; ?></h1>
                    
                    <p>Farmer</p> 
                    
                </div>
                
                <div class="profile-info">
                    <div class="profile-info-item">
                        <p class="profile-header">Name</p>
                        
                        <p class="profile-desc"><?php echo $row["name"]; ?></p>
                    </div>
                    
                    <div class="profile-info-item">
                        <p class="profile-header">Age</p>
                        <p class="profile-desc"><?php echo $row["age"]; ?></p>
                    </div>

                    <div class="profile-info-item">
                        <p class="profile-header">Email</p>
                        <p class="profile-desc"><?php echo $row["email"]; ?></p>
                    </div>
                    <div class="profile-info-item">
                        <p class="profile-header">Phone Number</p>
                        <p class="profile-desc"><?php echo $row["phone"]; ?></p>
                    </div>
                    <div class="profile-info-item">
                        <p class="profile-header">Address</p>
                        <p class="profile-desc"><?php echo $row["address"]; ?></p>
                    </div>
                    <button class="p-edit-btn"><a href="./farmer-edit-profile.php">Edit</a></button>
                    <button class="p-delete-btn"><a href="./php/farmer-delete-acc.php?deleteid=<?php echo $row['id'] ?>">Delete</a></button>
                </div>
            </div>
            <div class="dashboard-sec2"></div>
        </div>
    </div>
</body>
</html>