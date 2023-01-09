<?php
    include('../connection.php');
	session_start();
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
    <style>
        h1
        {
            margin-left:680px;
            margin-top:50px;
        }
        h2
        {
            margin-left:650px;
        }
        button
        {
            margin-left:690px;
        }
    </style>
</head>
<body>
    <h1>Thank you</h1>
    <h2>Your slot has confirmed </h2>
    <form action="paymentpage.php" method="GET">
    <button type="submit" name="payment" class="btn btn-primary">Proceed to Pay</button>
    </form>
</body>
</html>