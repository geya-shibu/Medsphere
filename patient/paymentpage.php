<?php
    $pid=base64_decode($_REQUEST['pid']);
    $amt=base64_decode($_REQUEST['amt']);
    $orderid="ORDS".rand(1000,999999);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <input type="submit" value="Checkout">
</form>
</body>
</html>