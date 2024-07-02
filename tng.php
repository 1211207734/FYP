<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>TNG E-wallet</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/tng.css">
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
</head>

<?php
include('database.php');
if (isset($_GET['eml'])) {
    $emml = $_GET['eml'];}
if (isset($_GET['tt'])) {
		$total = $_GET['tt'];}
		$co= isset($_GET['cod']) ? $_GET['cod'] : null;

	
	$result = mysqli_query($connect, "SELECT * FROM tng where Customer_ID='$emml'");
	if (mysqli_num_rows($result)==0) {
		$ss="INSERT INTO tng (Customer_ID, Balance) VALUES ('$emml', 0)";
		mysqli_query($connect, $ss);
		echo '<script>';
				echo 'window.location.href = "tng.php?eml=' . $emml . '&tt='.$total.'";';	 
				echo '</script>';	
				exit();
	}
	if($row = mysqli_fetch_assoc($result)) {
?>

<body>
<header>
	<div>
		<img style="height: 200px;width:250px" src="images/ewallet.png" class="mlogo">
	</div>  
</header>
	<div class="con">
		<div>Total Amount Needed to Pay : <?php echo $total ?> </div>
		<div>Balance of JBP Wallet : <a><?php echo $b=$row['Balance']?></a></div>
	</div>	
	
		<form method="post">
			<div class="b">
				<button type="submit" name="backc" class="button">Back to Cart</a><button type="submit" name="pay"class="button">Proceed Payment</button>
			</div>
			<div class="reload">
				<div>Reload Amount:</div>
				<button class="button" type="submit" name="r50">Reload RM50</button><button class="button" type="submit" name="r100">Reload RM100</button>
				<label class="input_label">Others Amount</label>
					<br>RM <input class="input_field" type="text" name="name" placeholder="Others Amount">
					<button class="button" type="submit" name="am">Reload</button>
			</div>
			
		</form>
	
</body>

<?php }
else {
	echo '<script>';
	echo 'alert("Error! Please try again!") ;';	 
	echo '</script>';	
}
if (isset($_POST['r50'])) {
	$tng = 50;
	echo '<script>';
	echo 'window.location.href = "payment.php?eml='.$emml.'&cod='.$co.'&tt='.$total.'&ba='.$tng.'";';
	echo '</script>';
	exit();
}
else if (isset($_POST['r100'])) {
	$tng = 100;
	echo '<script>';
	echo 'window.location.href = "payment.php?eml='.$emml.'&tt='.$total.'&ba='.$tng.'&cod='.$co.'";'; 
	echo '</script>';	
	exit();	
}
else if (isset($_POST['am'])) {
	$tng=$_POST['name'];
	
	echo '<script>';
	echo 'window.location.href = "payment.php?eml=' . $emml . '&tt='.$total.'&ba='.$tng.'&cod='.$co.'";'; 
	echo '</script>';	
	exit();	
}
if (isset($_POST['pay'])) {
	if ($b >= $total){
	 echo '<script>';
	 echo 'window.location.href = "checkout.php?eml='. $emml . '&pm=TNG&ba='.$b.'&tt='.$total.'&cod='.$co.'";';
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
	echo 'window.location.href = "cart.php?eml='.$emml.'&cod='.$co.'&nt='.$total.'";';
	echo '</script>';
}
?>

</html>

