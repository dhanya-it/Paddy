




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

  
    $sql = "SELECT * FROM quotations";
	$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Edu+VIC+WA+NT+Beginner:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&di
	splay=swap" rel="stylesheet">

	<!-- font awesome -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- connect. style.css -->

	<link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Document</title>

</head>
    <style>
        body {
            background:url('./images/bg.jpg');
            background-repeat: no-repeat;
            background-position: 100% 15%;
            background-size: cover;
        }
    </style>

<body>

    <div id="header">

    
    <nav id= "navbar">
	<h1>RICE LANDER</h1>
		<ul>
			<li><a href="Rice Lander.php">HOME</a></li>
			<li><a href="payment.html">Payments</a></li>
			<li><a href="quotation.php">Pending Quotations</a></li>
            <li><a href="acceptedQuotations.php">Accepted Quotations</a></li>
		</ul>
		<div class="profile">
				<?php
                        $result2 = mysqli_query($conn, "SELECT * FROM admin WHERE admin_id='".$id."'");
                        $row = mysqli_fetch_array($result2); ?>
			<h3>Hi <?php echo $row["admin_name"]; ?>, </h3>
			<img src="./images/PngItem_786293.png" class="user" alt="" srcset="">
			<a href="php/logout.php" class="nav-item">Log Out</a>
		</div>
</nav>
            <div id="mobile_menu">
                <ul>
                <li><a href="">HOME</a></li>
                <li><a href="">Payments</a></li>
                <li><a href="">Pending Quotations</a></li>
            </ul>
            </div>
    </div>


   
	


<div id= "Quotations">
	<h1 id= "section">Accepted Quotations</h1>

	<table class="q-table">
		<tr>
			<th>Farmer Name</th>
			<th>Rice Type</th>
			<th>Amount</th>
			<th>Action</th>
		</tr>
		
		<?php
              $i=0;
              while($row = $result->fetch_assoc()) {
                
              ?>
		<tr>
            <td><?php echo $row['FarmerName'] ?></td>
            <td><?php echo $row['rice_type'] ?></td>
            <td><?php echo $row['amount'] ?></td>
            <td>
            <a href="./quo_update.php?updateid=<?php echo $row['quo_id'] ?>"><button class="green-btn">Update</button>
            <a href="./php/quo_delete.php?deleteid=<?php echo $row['quo_id'] ?>"><button class=red-btn>Delete</button></a>  
            </td>
        </tr>	
		<?php } ?>  
		
	</table>

</div>

</body>
</html>