<?php
  include('connection.php');
  session_start();
  $error = "Invalid Email or Password";

  if(isset($_POST['submit']))
  {
    $email=$_POST["email"];
    $password=md5($_POST["password"]);
    $sql="SELECT * from tbl_login where email='".$email."' AND password='".$password."'";
    $res=mysqli_query($con, $sql);
    if(mysqli_num_rows($res)>0)
    {
      $res_fetch=mysqli_fetch_assoc($res);
      $email=$res_fetch['email'];
      $password=$res_fetch['password'];
      $type=$res_fetch['type'];
      $verified=$res_fetch['verified'];
      $_SESSION['type']="$type";
      $_SESSION['email']="$email";
      if($verified=='1')
      {
        if($_SESSION['type']=='patient')
        {
          $_SESSION['message']="Welcome User";
          $_SESSION['email']="$email";
          $_SESSION['id']=$res_fetch['login_id'];
          header("location:patient/homepage.php");
          exit(0);
        }
        elseif($_SESSION['type']=='doctor')
        {
          $_SESSION['message']="Welcome Doctor";
          $_SESSION['id']=$res_fetch['login_id'];
          header("location:doctor/doctor.php");
          exit(0);
        }
        elseif($_SESSION['type']=='admin')
        {
          $_SESSION['message']="Welcome";
          header("location:adminpage.php");
          exit(0);
        }
      }
      else
      {
        echo "<script> alert('Please verify the email'); </script>";
      }
    }
    else
    {
      $_SESSION["error"] = $error;
      header("location:login.php");
      exit(0);
    }
  }
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="assets/images/logo1.png" />
  <link rel="stylesheet" href="assets/css/css1/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/css1/fontawsom-all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/login.css" />
</head>

<body class="h-100">
<?php
include_once('includes/header.php');
?>
<div class="login">
  <div class="login-box">
    <h2>Login</h2>
      <form action="login.php" method="POST">
      <?php
          if(isset($_SESSION["error"]))
          {
            $error = $_SESSION["error"];
          ?>
          <div class="alert alert-danger text-center">
            <?php echo "<h3 style='color:red; text-align:center; font-size:15px;'>$error</h3>";?>
          </div>
          <?php
          }
        ?>                    
          <div class="user-box">
              <input type="text" id="email" name="email" required="">
              <label>Email</label>
          </div>
          <div class="user-box">
              <input type="password" id="password" name="password" required="">
              <label>Password</label>
          </div>
          <span class="span1">
              <!-- <label class="container">
                  <input type="checkbox">
                  <span class="checkmark"></span>Remember me
              </label> -->
              <a href="forgot_password.php"> Forgot password ?
          </span>
          <button type="submit" name="submit" id="login" class="submit">Login </button>
        </form>
            <p class="no-c">Not a member yet? <a href="signup.php" style="color:#2030F4;font-weight:bold;">Create your Account</a></p>
    </div>
</div>
<?php
        unset($_SESSION["error"]);
      ?>
<?php
include_once('includes/footer.php');
?>
</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>        
<script src="assets/js/script.js"></script>
</html>