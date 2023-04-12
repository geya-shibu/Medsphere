<?php
    include('../connection.php');
	session_start();
    if(!isset($_SESSION["email"])) 
	{
		header("Location:../login.php");
	}
    if(isset($_GET['payment']))
    {
        $pid=$_GET['payment'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Portal</title>
    <link rel="shortcut icon" href="../assets/images/logo1.png"/>
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> -->
    <style>
        h1
        {
            margin-left:680px;
            margin-top:50px;
        }
        h2
        {
            margin-left:620px;
        }
        button
        {
            margin-left:690px;
        }
        body
        {
            /* background-image:url('../images/payment.jpg'); */
            background-size:cover; 
            font-size:20px;
        }
    </style>
</head>
<body>
    <h1>Thank you!</h1>
    <h2>Your slot has confirmed </h2>
    <?php
    $pid=base64_encode('pat'.rand(1000,1000));
    $amount=base64_encode(300);

    ?>
    <a href="paymentpage.php?pid=<?php echo $pid;?>&amt=<?php echo $amount;?>" style="margin-left:700px; color:blue;">Proceed to Pay</a>
    <!-- <form action="paymentpage.php" method="GET">
        <button type="submit" name="payment" class="btn btn-primary">Proceed to Pay</button>
    </form> -->
</body>
</html>