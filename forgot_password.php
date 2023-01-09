<?php
include 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  function send_password_mail($email, $token)
  {
    require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");
    $mail = new PHPMailer(true);
    try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //Enable verbose debug output
      $mail->isSMTP();                                           //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                      //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                  //Enable SMTP authentication
      $mail->Username   = 'ggsjgeya1@gmail.com';                 //SMTP username
      $mail->Password   = 'wjutgwizogvkwjuq';                    //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           //Enable implicit TLS encryption
      $mail->Port       = 465;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      $mail->setFrom('ggsjgeya1@gmail.com', 'Geya');
      $mail->addAddress($email);    
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Password Reset Link';
      $mail->Body    = "Your Password Reset Link
                        <a href='http://localhost/portal/change_password.php?email=$email&token=$token'>Click Here</a>";
      $mail->send();
      return true;
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      return false;
  }
  }

if(isset($_POST['check_mail']))
{
    $email=$_POST['email'];
    $token=md5(rand());
    $check_email="SELECT email from tbl_login where email='$email'";
    $check_email_run=mysqli_query($con, $check_email);
    if(mysqli_num_rows($check_email_run)>0)
    {
        $row=mysqli_fetch_assoc($check_email_run);
        $update_token="UPDATE tbl_login SET verify_token='$token' where email='$email'";
        $update_token_run=mysqli_query($con,$update_token);
        if($update_token_run)
        {
            send_password_mail($email, $token);
            echo "<script> alert('Link is sent to mail'); </script>";
        }
        else{
            echo "<script> alert('Wrong'); </script>";
        }
    }
    else{
        echo "<script> alert('No email found'); </script>";
        //header('location:forgot_password.php');
    }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="assets/images/fav.jpg">
  <link rel="stylesheet" href="assets/css/css1/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/css1/fontawsom-all.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/fp.css" />
</head>

<body class="h-100">

<!-- ######################## Header Starts Here##############################--->
<header id="menu-jk">
<div id="nav-head" class="header-nav">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 no-padding col-sm-12 nav-img">
                <img src="assets/images/logo.jpg" alt="">
                <a data-toggle="collapse" data-target="#menu" href="#menu" ><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
            </div>
            <div id="menu" class="col-lg-8 col-md-9 d-none d-md-block nav-item">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#services">Services</a></li>
                    <li><a href="index.php#about_us">About Us</a></li>
                    <li><a href="index.php#gallery">Our Team</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</header>
<!--############### Header Ends Here ###############-->

<div class="login">
    <div class="login-box">
        <h2>Reset Password</h2>
        <form action="forgot_password.php" method="POST">
            <div class="user-box">
                <input type="email" name="email" required>
                <label>Enter Email address</label>
            </div>
            <button type="submit" name="check_mail" class="submit">Send</button>
        </form>
    </div>
</div>

<!--##################### Footer Starts Here ######################--->
<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                  <h2>About Us</h2>
                    <p>
                        MedSphere is a leading provider of health care, consulting, and business process services. Our dedicated employees offer strategic insights, technological expertise and industry experience.
                    </p>
                    <p>We focus on technologies that promise to reduce costs, streamline processes and speed time-to-market, Backed by our strong quality processes and rich experience managing global... </p>
                </div>

                <div class="col-md-4 col-sm-12 map-img">
                  <h2>Contact Us</h2>
                    <address class="md-margin-bottom-40">
                        MedSphere <br>
                        Kochi (K.K District) <br>
                        Kerala, IND <br>
                        Phone: +91 9159669599 <br>
                        Email: <a href="mailto:info@medsphere.com" class="">info@medsphere.in</a><br>
                        Web: <a href="www.medsphere.com" class="">www.medsphere.in</a>
                    </address>
                </div>
            </div>
        </div>
    </footer>
    <div class="copy">
        <div class="container">
              <a>2022 &copy; All Rights Reserved | Designed and Developed by MedSphere</a>
              <!-- <span>
              <a><i class="fab fa-google-plus-g"></i></a>
              <a><i class="fab fa-twitter"></i></a>
              <a><i class="fab fa-facebook-f"></i></a>
              </span> -->
        </div>

    </div>
</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>        
<script src="assets/js/script.js"></script>
</html>