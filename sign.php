<?php
  include 'connection.php';
  
  if(isset($_POST["submit"]))
  {
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    
    $duplicate=mysqli_query($con, "SELECT * from tbl_login WHERE email='$email'");
    
      if(mysqli_num_rows($duplicate)>0)
      {
        //echo "<script> alert('Already Registered'); </script>";
        header('location:signup.php');
      }
      else
      {
        $sql="INSERT INTO tbl_login(email, password) VALUES ('$email', '$password')";
        if($con->query($sql)=== TRUE)
        {
            $val="SELECT login_id from tbl_login where email='".$email."'";
            if($res=$con->query($val))
            {
              foreach($res as $data)
              {
                $login_id=$data['login_id'];
                $sql1="INSERT INTO tbl_patient(login_id, name, phone) VALUES ('$login_id','$name', '$phone')";
                if($con->query($sql1)=== TRUE)
                {
                  //echo "<script> alert('Registered Successfully'); </script>";
                  header('location:login.php');
                }
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
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/css1/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/css1/fontawsom-all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/css1/style.css" />

</head>

<body class="h-100">
  <!-- ################# Header Starts Here#######################--->
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
        <!--##################### Header Ends Here #####################-->

        <!-- <div class="container-fluid full-bg h-100">
           <div class="container h-100">
               <div class="row no-margin h-100">
                   <div class="bg-layer d-flex col-md-4">
                        <div class="login-box row">
                            <h3>Registration</h3>
                            <form action="#" method="POST" auto_complete="off">
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="name" id="name" placeholder="Name" 
                              onblur="validateName()" aria-label="Username" aria-describedby="basic-addon1" required>
                              <small>Error</small>
                            </div>

                            <div class="input-group mb-3">
                              <input type="email" class="form-control" name="email" id="email" placeholder="Email" 
                              onblur="validateEmail()" aria-label="Username" aria-describedby="basic-addon1" required>
                              <div id="emailerr" class="emsg">Error Message</div>
                            </div>

                            <div class="input-group mb-3"> 
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" 
                              onblur="validatePhone()"aria-label="Username" aria-describedby="basic-addon1" required>
                              <span id="error">Error Message</span>
                            </div>

                             <div class="input-group mb-3">
                              <input type="password" class="form-control" name="password" id="password" placeholder="Password" 
                              onblur="validatePassword()" aria-label="Username" aria-describedby="basic-addon1" required>
                              <span id="error">Error Message</span>
                            </div>

                            <div class="input-group mb-3">
                              <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" aria-label="Username" aria-describedby="basic-addon1">
                              <span id="error">Error Message</span>
                            </div>
                            
                            <button class="btn btn-success" name="submit">Sign Up</button>
                            
                            <p class="no-c">Already  an Account? <a href="login.php">Login</a></p>
                            </form>
                        </div>
                    </div>    
               </div>
           </div> -->

          <div class="formdiv">
	          <div class="header">
		          <h2>Create Account</h2>
	          </div>
	          <form id="form" class="form">
              <div class="form-control">
                <input type="text" placeholder="florinpop17" id="username" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
              </div>
              <div class="form-control">
                <input type="email" placeholder="a@florin-pop.com" id="email" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
              </div>
              <div class="form-control">
                <input type="password" placeholder="Password" id="password"/>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
              </div>
              <div class="form-control">
                <input type="password" placeholder="Password two" id="password2"/>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
              </div>
              <button>Submit</button>
            </form>
          </div>
        

<!-- ################# Footer Starts Here#######################--->
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
                        Email: <a href="mailto:info@medsphere.com" class="">info@bluedart.in</a><br>
                        Web: <a href="www.medsphere.com" class="">www.bluedart.in</a>
                    </address>

                </div>
            </div>
        </div>
        

    </footer>
    <div class="copy">
            <div class="container">
                <a>2022 &copy; All Rights Reserved | Designed and Developed by MedSphere</a>
            </div>

        </div>
    </body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>        
<script src="assets/js/script.js"></script>
<script src="assets/js/validate.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>