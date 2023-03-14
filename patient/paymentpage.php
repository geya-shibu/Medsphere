<?php
    include('../connection.php');
    session_start();
    $amt=base64_decode($_REQUEST['amt']);
    $orderid="ORDS".rand(1000,999999);
    $pid=$_SESSION['id'];
	date_default_timezone_set("Asia/Kolkata");
	$current_time = date('H:i:s');
	$today = date("Y-m-d");
	// $query=mysqli_query($con,"insert into tbl_payment(p_id, order_id, amount, pay_date, pay_time) values('$pid','$orderid','$amt', '$today', '$current_time')");
    $query=mysqli_query($con, "INSERT INTO tbl_payment(`p_id`, `order_id`, `amount`, `pay_date`, `pay_time`) VALUES ('$pid','$orderid','$amt','$today','$current_time')");
    // if($query)
	// {
		// echo "<script> alert('Done');</script>";
		// header("location:payment.php");
	// }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body
        {
            text-align:center;
        }
    </style>
</head>
<body>
    <h2>Payment Details</h2>
    <p>Your Order ID : <?php echo $pid; ?></p><br>
    <p>User ID : <?php echo $orderid; ?></p>
    <p>Total Amount : <?php echo $amt; ?></p>

<br>

<form action="PaytmKit/pgRedirect.php" method="POST">
    <input type="hidden" id="ORDER_ID" name="ORDER_ID" tabindex="1" maxlength="20" size="12" autocomplete="off" value="<?php echo $orderid;?>">
    <input type="hidden" id="CUST_ID" name="CUST_ID" tabindex="1" maxlength="20" size="12" autocomplete="off" value="<?php echo $pid;?>">
    <input type="hidden" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" tabindex="1" maxlength="20" size="12" autocomplete="off" value="Retail">
    <input type="hidden" id="CHANNEL_ID" name="CHANNEL_ID" tabindex="1" maxlength="20" size="12" autocomplete="off" value="WEB">
    <input type="hidden" id="TXN_AMOUNT" name="TXN_AMOUNT" tabindex="1" maxlength="20" size="12" autocomplete="off" value="<?php echo $amt;?>"><br>
    <input type="submit" name="submit" value="Checkout">
</form>
</body>
</html>