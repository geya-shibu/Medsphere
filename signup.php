<?php
  include 'connection.php';
  // $email = "";
  // $name = "";
  // $errors = array();
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  function sendMail($email, $v_code)
  {
    require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");
    $mail = new PHPMailer(true);
    try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'ggsjgeya1@gmail.com';                     //SMTP username
      $mail->Password   = 'wjutgwizogvkwjuq';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      $mail->setFrom('ggsjgeya1@gmail.com', 'Geya');
      $mail->addAddress($email);    
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Email Verification From MedSphere';
      $mail->Body    = "Thanks for registering! Click the link to verify the email address
                        <a href='http://localhost/portal/verify.php?email=$email&code=$v_code'>Verify</a>";
      $mail->send();
      return true;
  } catch (Exception $e) {
      // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      return false;
  }
  }
  if(isset($_POST["submit"]))
  {
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $password=md5($_POST["password"]);
    $cpassword=md5($_POST["cpassword"]);
    
    // if($password !== $cpassword){
    //   $errors['password'] = "Confirm password not matched!";
    // }
    $duplicate=mysqli_query($con, "SELECT * from tbl_login WHERE email='$email'");
      if(mysqli_num_rows($duplicate)>0)
      {
        echo "<script> alert('Already Registered'); </script>";
        header('location:signup.php');
        // $errors['email'] = "Email that you have entered is already exist!";
      }
      else
      {
        $code=bin2hex(random_bytes(16));
        $sql="INSERT INTO tbl_login(email, password, code) VALUES ('$email', '$password', '$code')";
        $sql_run=mysqli_query($con, $sql);
        if($sql_run)
        {
            $val="SELECT login_id from tbl_login where email='".$email."'";
            $val_run=mysqli_query($con, $val);
            if($val_run)
            {
              $val_fetch=mysqli_fetch_assoc($val_run);
                $login_id=$val_fetch['login_id'];
                $sql1="INSERT INTO tbl_patient(login_id, name, phone) VALUES ('$login_id','$name', '$phone')";
                if($con->query($sql1)=== TRUE && sendMail($email, $code))
                {
                  echo "<script> alert('Registered Successfully Please verify using email'); </script>";
                  // header('location:login.php');
                }
            }
          }
      }
  }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up</title>
    <link rel="shortcut icon" href="assets/images/logo1.png" />
    <link rel="stylesheet" href="assets/css/css1/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/css1/fontawsom-all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/signup.css" />
    <script src="assets/js/validate.js"></script>
    <style>
      .error-message
      {
        color:red;
        font-size:14px;
        margin-top:-20px;
      }
    </style>
</head>

<body class="h-100">
  <?php
  include_once('includes/header.php');
  ?>
<div class="login">
    <div class="login-box">
        <h2>Registration</h2>
        <form action="" method="POST">
            <div class="user-box">
                <input type="text" name="name" id="name" onkeyup="validateName()" required>
                <label>Name</label>
                <h6 class="error-message" id="name_err"></h6>
            </div>
            <div class="user-box">
                <input type="text" name="email" id="email" onkeyup="validateEmail()" required>
                <label>Email</label>
                <h6 class="error-message" id="mail_err"></h6>
            </div>
            <div class="user-box">
                <input type="text" name="phone" id="phone" onkeyup="validatePhone()" required>
                <label>Phone Number</label>
                <h6 class="error-message" id="ph_err"></h6>
            </div>
            <div class="user-box">
                <input type="password" name="password" id="password" onkeyup="validatePassword()" required>
                <label>Password</label>
                <h6 class="error-message" id="pwd_err"></h6>
            </div>
            <div class="user-box">
                <input type="password" name="cpassword" id="cpassword" onkeyup="validateConfirm()" required>
                <label>Confirm Password</label>
                <h6 class="error-message" id="cpwd_err"></h6>
            </div>
          
            <button type=submit name="submit" id="signup_btn">Sign Up</button>
        </form>
        <p class="no-c">Already have an Account? <a href="login.php" style="color:#2030F4;font-weight:bold;">Login</a></p>
      </div>
</div>
  
  <?php
  include_once('includes/footer.php');
  ?>
</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>        
<script src="assets/js/script.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>