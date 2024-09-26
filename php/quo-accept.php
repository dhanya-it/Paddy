




<?php

session_start();
$id = $_GET['acceptid'];

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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $amount = $_POST['amount'];
        $sql = "UPDATE temp_quotations SET amount=? WHERE temp_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $amount, $id);
        $stmt->execute();

    
        header("Location: ../quotation.php");
        exit();
    }
    
  
    $result2 = mysqli_query($conn, "SELECT * FROM temp_quotations WHERE temp_id='".$id."'");
    $row = mysqli_fetch_array($result2);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accept Quotation</title>
        			<!-- google.fonts -->

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Edu+VIC+WA+NT+Beginner:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&di
	splay=swap" rel="stylesheet">

	<!-- font awesome -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- connect. style.css -->
</head>
<body>
    <style> 
        a {
            text-decoration: none;
            color: wheat;
        }

        body {
            
            background:url('../images/bg.jpg');
            background-repeat: no-repeat;
            background-position: 100% 15%;
            background-size: cover;
            padding: 220px 500px;
        }

        .pop-up-titile {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .pop-up {
            background-color: rgb(81, 155, 100);
            width: 600px;
            height : 300px;
            display: flex;
            flex-direction: column;
            gap: 30px;
            justify-content: center;

        }

        .pop-up-body {
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-content: center;
        }

        .pop-up-body-sec {
            display: flex;
            justify-content: space-evenly;
        }

        .pop-up-footer {
            display: flex;
            justify-content: center;
        }

        .green-btn {
    cursor: pointer;
    width: 100px;
    padding: 10px;
    background-color: rgb(120, 195, 116);
    border: none;
	color: white;
	border-radius: 30px;

	
}
        
    </style>
    
    <div id="pop-up" class="pop-up">
        <form  method="POST">
        <div class="pop-up-titile">
            <h2>Menu</h2>
            <a href="../quotation.php"><button > <i class="fa fa-times"></i></button></a>
        </div>
        <div class="pop-up-body">
            <div class="pop-up-body-sec">
                <p>Accepted : </p>
                <input class="pop-up-input" type="text" name="amount" id="amount" value= "<?php echo $row['amount'] ?>">
            </div>
            <div class="pop-up-body-sec">
                <p>Disclined : </p>
                <input class="pop-up-input" type="text" value = "0">
            </div>
        </div>
        <div class="pop-up-footer">
            <button class="green-btn" type="submit" >Submit</button>
        </div>
    </div>
    </form>
</body>
</html>