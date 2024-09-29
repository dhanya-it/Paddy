




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

    $sql = "SELECT * FROM temp_quotations WHERE farmer_id = $id";

	$result = $conn->query($sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/farmerDashboard.css">
    <title>Document</title>
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

        <div class="harvest">
            <h1>Manage Harvest</h1>
            <div class="harvest-management">
                <button class="green-btn" ><a href="addHarvest.html">Add</a></button>
            <table>
                <tr>
                    <th>Farmer ID</th>
                    <th>Farmer Name</th>
                    <th>Type</th>
                    <th>Amount</th>

                </tr>
                <?php
                    $i=0;
                    while($row = $result->fetch_assoc()) {
                
                ?>
		        <tr>
                    <td><?php echo $row['farmer_id'] ?> </td>
                    <td><?php echo $row['FarmerName'] ?></td>
                    <td><?php echo $row['rice_type'] ?></td>
                    <td><?php echo $row['amount'] ?></td>
                    <td>
                        <a href="./updateHarvest.php?updateid=<?php echo $row['temp_id'] ?>"><button class="green-btn">Update</button>
                        <a href="./php/delete_harvest.php?deleteid=<?php echo $row['temp_id'] ?>"><button class=red-btn>Delete</button></a>  
                    </td>
                </tr>	
		        <?php } ?>  
            </table>
            </div>
            <div class="dashboard-sec2"></div>
        </div>
        
    </div>
</body>
</html>