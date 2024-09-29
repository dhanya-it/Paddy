




<?php

session_start();

    $id = $_SESSION["id"];
    $name = $_SESSION['name'];

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
    <link rel="stylesheet" href="./css/addHarvest.css">
    <title>Add Harvest</title>
</head>
<body>
    <h1>Add Harvest</h1>
    <div class="add-harvest-sec">
        <form class="add-harvest-form" action="./php/add_harvest.php" method="POST">
            <label for="">Farmer Id</label>
            <input readonly type="text" value="<?php echo($id) ?>" name="farmerId" >
    
            <label for="">Farmer Name</label>
            <input readonly type="text" value="<?php echo($name) ?>" name="farmerName" >
    
            <label for="">Paddy Type</label>
            <select name="paddyType" id="paddyType">
                <option value="" disabled selected>Select Paddy Type</option>
                <option value="white_raw">White Raw</option>
                <option value="red_raw_samba">Red Raw Samba</option>
                <option value="white_raw_samba">White Raw Samba</option>
                <option value="nadu">Nadu</option>
                <option value="basmati">Basmati</option>
                <option value="suwandel">Suwandel</option>
                <option value="madathawalu">Madathawalu</option>
                <option value="pachchaperumal">Pachchaperumal</option>
            </select>
    
            <label for="">Paddy Amount</label>
            <input type="number" value="" name="harvestAmount" >
            
            <button class="button-3" type="submit">Add Harvest</button>
    
        </form>
    </div>
</body>
</html>