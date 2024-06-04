<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>TNG E-wallet</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/tng.css">
</head>
<style>
        .con {
			color: white;
			margin-top: 10px;
			text-align: center;
            width: 400px;
            border:5px solid black;
            padding: 10px;
			font-size:20px;
			margin-left: auto;
			margin-right: auto;
        }

		.button {
			background-color: white;
			color: black;
			border: 2px solid #04AA6D; /* Green */
			transition-duration: 0.4s;
			width:auto;
		}

		.button:hover {
			box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
		}

		.b {
			margin-top: 10px;
			text-align: center;
            width: 400px;
            border:5px solid black;
            padding: 10px;
			font-size:20px;
			margin-left: auto;
			margin-right: auto;
		}

		.reload {
			color: white;
			margin-top: 10px;
			text-align: center;
            width: 400px;
            border:5px solid black;
            padding: 10px;
			font-size:20px;
			margin-left: auto;
			margin-right: auto;
		}

		body {
			background-color: #3366ff;
		}
    </style>
<?php
include('database.php');
if (isset($_GET['eml'])) {
    $emml = $_GET['eml'];}
if (isset($_GET['tt'])) {
		$total = $_GET['tt'];}
	$connect= mysqli_connect("localhost","root","","jbp");
	$result = mysqli_query($connect, "SELECT * FROM tng where Customer_ID='$emml'");
	while($row = mysqli_fetch_assoc($result)) {
?>
<header>
	<div>
		<img src="images/tng.png" class="mlogo">
	</div>  
</header>
<body>
	<div class="con">
		<div>Total Amount Needed to Pay : <?php echo $total ?> </div>
		<div>Balance of TNG Wallet : <a><?php echo $b=$row['Balance']?></a></div>
	</div>	
	
		<form method="post">
			<div class="b">
				<button type="submit" name="backc" class="button">Back to Cart</a><button type="submit" name="pay"class="button">Proceed Payment</button>
			</div>
			<div class="reload">
				<div>Reload Amount:</div>
				<button class="button" type="submit" name="r50">Reload RM50</button><button class="button" type="submit" name="r100">Reload RM100</button>
			</div>
			<?php
			if (isset($_POST['r50'])) {
				$b += 50;
				$update = mysqli_query($connect, "UPDATE tng SET Balance='$b' WHERE Customer_ID='$emml'");
				echo '<script>';
				echo 'alert("Reload RM50 Successfully!") ;';
				echo 'window.location.href = "tng.php?eml=' . $emml . '&tt='.$total.'";';	 
				echo '</script>';
				exit();
			}
			else if (isset($_POST['r100'])) {
				$b += 100;
				$update = mysqli_query($connect, "UPDATE tng SET Balance='$b' WHERE Customer_ID='$emml'");
				echo '<script>';
				echo 'alert("Reload RM100 Successfully!") ;';
				echo 'window.location.href = "tng.php?eml=' . $emml . '&tt='.$total.'";';	 
				echo '</script>';	
				exit();	
			}?>
		</form>
	
</body>
<?php }
if (isset($_POST['pay'])) {
	if ($b >= $total){
	 echo '<script>';
	 echo 'window.location.href = "checkout.php?eml='. $emml . '&pm=TNG&ba='.$b.'";';
	 echo '</script>';
	}

 	else {

	 echo '<script>';
	 echo 'alert("Low Balance ! Please Reload !") ;';	 
	 echo '</script>';  }                      
} 
else if (isset($_POST['backc']))
{
	echo '<script>';
	echo 'window.location.href = "cart.php?eml='.$emml.'";';
	echo '</script>';
}
?>
