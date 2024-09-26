






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


    if(count($_POST)>0) {
        $sql = "UPDATE farmer SET name='".$_POST['name']."', phone='".$_POST['phone']."' , address='".$_POST['address']."' , password='".$_POST['password']."' , age='".$_POST['age']."' , email='".$_POST['email']."' WHERE id='".$id."'";
        $result = mysqli_query($conn,$sql);
        header("location: farmer-dashboard.php");
    }
  
    $result2 = mysqli_query($conn, "SELECT * FROM farmer WHERE id='".$id."'");
    $row = mysqli_fetch_array($result2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/edit-profile.css">
    <title>Document</title>
</head>
<body>
    <style>
        body {
            overflow-y: scroll;
        }
    </style>
    <div class="edit-profile">
        <h1>Edit Profile</h1>
        <form class="edit-section" method = "POST">
        <img src="./assets/user.png" alt="" height="200px">
        <div>
            <label for="">Name</label>
            <input class="edit-profile-in" type="text" id="name" name="name" value="<?php echo $row['name'] ?>" >
        </div>
        <div>
            <label for="">Phone</label>
            <input class="edit-profile-in" type="tel" id="phone" name = "phone" value="<?php echo $row['phone'] ?>" >
        </div>
        <div>
            <label for="">Email</label>
            <input class="edit-profile-in" type="email" id="email" name = "email" value="<?php echo $row['email'] ?>" >
        </div>

        <div>
            <label for="">Age</label>
            <input class="edit-profile-in" type="number" id="age" name = "age" value="<?php echo $row['age'] ?>" >
        </div>

        <div>
            <label for="">Address</label>
            <input class="edit-profile-in" type="text" id="address" name = "address" value="<?php echo $row['address'] ?>" > 
        </div>

        <div>
            <label for="">Password</label>
            <input class="edit-profile-in" type="password" id="password" name = "password" value="<?php echo $row['password'] ?>" >
        </div>

        <button type="submit" class="green-btn">Update</button>
    </form>
    </div>
</body>
</html>