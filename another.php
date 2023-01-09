<?php
include "code_reg.php";
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans&display=swap" rel="stylesheet" /><link> 
<link href="https://fonts.googleapis.com/css?family=Audiowide&display=swap" rel="stylesheet" />
<style>
body
{
font-family: "Times New Roman", Times, serif;
color: white;
}
.background {
background: url('regimg1.jpg') rgba(0, 0, 0, 0.61);
background-repeat: no-repeat;
background-size: 100%;
position: absolute;
top: 0;
bottom: 0;
left: 0;
right: 0;
width: 1470px;
height: 1100px;
fill-layer-image-opacity: 0.3;
opacity: 0.75;
}
.container {
position:absolute;
width: 667px;
height: 800px;
left: 386px;
top: 40px;
display: flex;
flex-direction: column;
text-align: center;
margin: 10vh auto;
background: rgba(241, 235, 237, 0.6);
box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 50px;
font-family: 'Alegreya Sans';
font-style: normal;
font-weight: 400;
font-size: 15px;
line-height: 22px;
text-align: center;
color: #000000;
}
form {
padding: 10px;
display: flex;
flex-direction: column;
width: 85%;
}
input[type=text], input[type=password],input[type=date]{
width: 50%;
padding: 15px;
margin: 5px 0 22px 0;
display: inline-block;
border: none;
background: #f1f1f1;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}

input[type=text]:focus, input[type=password]:focus,input[type=date]:focus{
background-color: #ddd;
outline: none;
}
hr {
border: 0.5px solid black;
margin-bottom: 30px;
margin-top: 15px;
margin-left: 100px;
margin-right: 100px;
}
.registerbtn {
background: #313030;
border-radius: 30px;
font-family: 'Almendra';
color: white;
padding: 16px 20px;
margin: 8px 0;
border: none;
cursor: pointer;
width: 40%;
opacity: 0.9;
}
.registerbtn:hover {
opacity: 1;
}
a {
color: dodgerblue;
}

.error-message {
	  color: red;
	  margin-top: -25px;
	  margin-bottom: 0px;
	  font-size: 15px;
	}



	#header {
		-moz-align-items: center;
		-webkit-align-items: center;
		-ms-align-items: center;
		align-items: center;
		background: #fff;
		cursor: default;
		height: 6em;
		left: 0;
		line-height: 6em;
		position: fixed;
		top: 0;
		width: 100%;
		z-index: 10001;
		box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.075);
		text-align: left;
	}

		#header .logo {
			color: rgba(205,78,163,1);
			font-family: "Audiowide";
			font-size: 2.5em;
			letter-spacing: 2px;
			margin-top: -5px;
			text-decoration: none;
			display: inline-block;
			margin-left: 125px;
		}
		
		#header .logodes{
			display: flex;
			justify-content: center;
			align-items: center;
			left: 10px;
		}
		
		#header .logodes img{
			width: 70px;
			border-radius: 50px;
		}
		

		#header nav {
			position: absolute;
			top: 0;
			height: inherit;
			line-height: inherit;
		}

			#header nav.left {
				left: 2em;
			}

			#header nav.right {
				right: 2em;
			}

			#header nav .button {
				padding: 0 2em;
				height: 3.25em;
				line-height: 3.25em;
			}

			#header nav a {
				text-decoration: none;
				display: inline-block;
			}

				#header nav a[href="#menu"] {
					text-decoration: none;
					-webkit-tap-highlight-color: transparent;
					font-size: 2em;
					color: #dee1e3;
					z-index: 10005;
				}

					#header nav a[href="#menu"]:before {
						content: "";
						-moz-osx-font-smoothing: grayscale;
						-webkit-font-smoothing: antialiased;
						font-family: FontAwesome;
						font-style: normal;
						font-weight: normal;
						text-transform: none !important;
					}

					#header nav a[href="#menu"] span {
						display: none;
					}

					#header nav a[href="#menu"]:before {
						margin: 0 0.5em 0 0;
					}

	@media screen and (max-width: 980px) {

		body {
			padding-top: 44px;
		}

		#header {
			height: 44px;
			line-height: 44px;
		}

			#header .logo {
				font-size: 1.25em;
				text-align: center;
			}

			#header nav a[href="#menu"] {
				font-size: 1.5em;
			}

			#header nav.left {
				left: 1em;
			}

			#header nav.right {
				display: none;
			}

	}

	@media screen and (max-width: 480px) {

		#header {
			min-width: 320px;
		}

	}

.btn {
			padding: 8px 20px;
			margin: 7px 0;
			border-radius: 8px;
			background: none;
			color: rgba(205,78,163,1);
			cursor: pointer;
			font-size: 20px;
			font-family: 'Alegreya Sans';
			box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
		}
</style>
</head>
<body>

<!-- Header -->
			<header id="header">
				<nav class="left">
					<div class="logodes">
						<img src= "logo.jpg">
					</div>
				</nav>
				
				<a href="index.html" class="logo">NEOMETER</a>
				
			</header>
			
<form name="myform" action="code_reg.php" method="POST" onkeyup = "return formValidation()" >
<div class="background">
<div class="container" >
<br></br>
<h1><b>SIGN UP<b></h1>
<hr>

<label for="name"><b>NAME</b></label><br>
<input type="text" placeholder="Enter name" name="name" id="name" required><p class="error-message"></p><br>
<label for="dt"><b>DATE OF BIRTH</b></label><br>
<input type="date" placeholder="Enter Date of Birth" name="dt" id="dt" required><p class="error-message"></p><br>
<label for="email"><b>EMAIL</b></label><br>
<input type="text" placeholder="Enter Email" name="remail" id="email" required><p class="error-message"></p><br>
<label for="psw"><b>PASSWORD</b></label><br>
<input type="password" placeholder="Enter Password" name="rpsw" id="psw" required><p class="error-message"></p><br>
<label for="psw"><b>CONFIRM PASSWORD</b></label><br>
<input type="password" placeholder="Enter to confirm password" name="cpsw" id="cpsw" required><p class="error-message"></p><br>
<button type="submit" id="btnsub" class="registerbtn" name="submit">SIGN UP</button>
<p>Already have an account? <a href="lp.php">Sign in</a>.</p></center>
</div>
</div>
</form>



<script>
function formValidation() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('psw').value;
	var conpassword = document.getElementById('cpsw').value;
	//var button = document.getElementById('btnsub');
    var text = "";
  
  if (Name(name)) {
  }
  if (Email(email)) {
  }
  if (Password(password)) {
  }
  if(Confirm(conpassword,password)){
  }
  return false;
}

/*Name input validation*/
function Name(name) {
  var message = document.getElementsByClassName("error-message");
  var letters = /^[A-Za-z ]+$/;
  if ( name ==" " || name.match(letters)) {
    text="";
    message[0].innerHTML = text;
    document.getElementById('btnsub').disabled = false;
	return true;
  }
  
  else {
    text="Name should contain only letters";
    message[0].innerHTML = text;
    document.getElementById('btnsub').disabled = true;
	return false;
  }
}


/*email address input validation*/
function Email(email) {
  var message = document.getElementsByClassName("error-message");
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
  var atpos = email.indexOf("@");
  var dotpos = email.lastIndexOf(".");
          
  if ( email =="" || email.match(mailformat) || atpos > 1 && ( dotpos - atpos > 2 )) {
    text="";
    message[2].innerHTML = text;
	document.getElementById('btnsub').disabled = false;
   return true;
  }
         
  else {
    text="Wrong email format";
    message[2].innerHTML = text;
	document.getElementById('btnsub').disabled = true;
    return false;
  }
}


/*validate password*/
function Password(password) {
  var message = document.getElementsByClassName("error-message");
  var illegalChars = /[\W_]/; // allow only letters and numbers
  if (illegalChars.test(password)) { 
    text="Password contains illegal characters";
    message[3].innerHTML = text;
	document.getElementById('btnsub').disabled = true;
    return false;
  }
  else if ( (password.search(/[0-9]+/)==-1) ) {
    text="Password should contain at least one number";
    message[3].innerHTML = text;
	document.getElementById('btnsub').disabled = true;
    return false;
  }
  else {
    text="";
    message[3].innerHTML = text;
	document.getElementById('btnsub').disabled = false;
    return true;
  }
}

function Confirm(conpassword,password) {
	
	var message = document.getElementsByClassName("error-message");
	if (password == conpassword) { 
	
		text="";
		message[4].innerHTML = text;
		document.getElementById('btnsub').disabled = false;
		return true;
		
  }
 
  else {
	  text="Password does not match";
		message[4].innerHTML = text;
		document.getElementById('btnsub').disabled = true;
		return false;
    
  }
 
}

</script>

</body>
</html>

<div class="container-fluid full-bg h-100">
          <div class="container h-100">
              <div class="row no-margin h-100">
                  <div class="bg-layer d-flex col-md-4">
                      <div class="login-box row">
                        <div class="img">
                        <img src="assets/images/logo1.png" alt="">
                        </div>
                          <h3>Login</h3>
                        
                          <form action="" method="POST">
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                              <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <?php
                              if(isset($_SESSION["error"]))
                              {
                                $error = $_SESSION["error"];
                                echo "<h3 style='color:red; text-align:center; font-size:13px;'>$error</h3>";
                              }
                            ?>  
                            <p>
                            <!-- <label class="container">
                              <input type="checkbox">
                              <span class="checkmark"></span>Remember me
                            </label> -->
                            <a href="forgot_password.php"> Forgot password ?
                            </p>
                            
                            <button type="submit" name="submit" class="btn btn-success">Login</button>
                            </form>
                            <p class="no-c">Not a member yet? <a href="signup.php" style="color:#2030F4;font-weight:bold;">Create your Account</a></p>
                      </div>
                  </div>    
              </div>
          </div>
      </div>
      <?php
        unset($_SESSION["error"]);
      ?>


<?php
  include('connection.php');
  session_start();
  $error = "Invalid Email or Password";

  if(isset($_POST['submit']))
  {
    $email=$_POST["email"];
    $password=$_POST["password"];
    $sql="select * from tbl_login where email='".$email."' AND password='".$password."'";
    $res=$con->query($sql);
    if(mysqli_num_rows($res)>0)
    {
      foreach($res as $data)
      {
        $email=$data['email'];
        $password=$data['password'];
        $type=$data['type'];
      }
      $_SESSION['type']="$type";
      $_SESSION['email']="$email";

      if($_SESSION['type']=='patient')
      {
        $_SESSION['message']="Welcome User";
        header("location:homepage.php");
        exit(0);
      }
      elseif($_SESSION['type']=='doctor')
      {
        $_SESSION['message']="Welcome Doctor";
        header("location:doctorpage.php");
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
      // echo "<script> alert('Invalid Username or Password'); </script>";
      $_SESSION["error"] = $error;
      header("location:login.php");
      exit(0);
    }
  }
?>


<!-- Sign up -->
<div class="container-fluid full-bg h-100">
           <div class="container h-100">
               <div class="row no-margin h-100">
                   <div class="bg-layer d-flex col-md-4">
                        <div class="login-box row">
                            <h3>Registration</h3>
                            <form action="" method="POST" auto_complete="off">
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="name" id="name" onkeyup="validateForm()" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1" required>
                              <h6 class="error-message" id="name_err"></h6>
                            </div>

                            <div class="input-group mb-3">
                              <input type="email" class="form-control" name="email" id="email" onkeyup="validateForm()" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" required>
                              <br><h6 class="error-message" id="mail_err"></h6>
                            </div>

                            <div class="input-group mb-3"> 
                              <input type="text" class="form-control" name="phone" id="phone" onkeyup="validateForm()" placeholder="Phone Number" aria-label="Username" aria-describedby="basic-addon1" required>
                              <h6 class="error-message" id="ph_err"></h6>
                            </div>

                             <div class="input-group mb-3">
                              <input type="password" class="form-control" name="password" id="password" onkeyup="validateForm()" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" required>
                              <h6 class="error-message" id="pwd_err"></h6>
                            </div>

                            <div class="input-group mb-3">
                              <input type="password" class="form-control" name="cpassword" id="cpassword" onkeyup="validateForm()" placeholder="Confirm Password" aria-label="Username" aria-describedby="basic-addon1">
                              <h6 class="error-message" id="cpwd_err"></h6>
                            </div>
                            
                            <button class="btn btn-success" name="submit" id="signup_btn">Sign Up</button>
                            
                            <p class="no-c">Already  an Account? <a href="login.php">Login</a></p>
                            </form>
                        </div>
                    </div>    
               </div>
           </div><?php
											$doc_id=$_SESSION['id'];
											$sql="SELECT * from tbl_doctor where login_id='$doc_id'";
											$result=$con->query($sql);
      										if ($result-> num_rows > 0){
        									while ($row=$result-> fetch_assoc()) {?>
											<h4><?=$row["doc_name"]?>cc</h4>
											<?php }
										}?>





profile.php

<?php
                                        $query="SELECT * from tbl_login WHERE login_id='$p_id'";
									    $query_run=mysqli_query($con, $query);
									    foreach($query_run as $data1){
									    ?>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Password 
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" value="<?=$data1['password'] ?>" id="val-password" name="val-password">
                                            </div>
                                        </div>
                                        <?php }?>

                                        <a class="col" href="logout.php">Log out</a>


                                        <span>
									<?php
									$doc_id=$_SESSION['id'];
									$sql="SELECT * from tbl_doctor where login_id='$doc_id'";
									$result=$con->query($sql);
									if ($result-> num_rows > 0){
									while ($row=$result-> fetch_assoc()) {?>
									<h4><?=$row["doc_name"]?></h4>
									<?php }
										}?>
									<span class="user-level">Doctor</span>
									<!-- <span class="caret"></span> -->
								</span>




















                <?php
  include('../connection.php');
  session_start();


  if(isset($_POST['add_schedule']))
{
	$s_date=$_POST['s_date'];
	$s_stime=$_POST['s_stime'];
    $s_etime=$_POST['s_etime'];
    $s_nop=$_POST['s_nop'];
    $s_session=$_POST['session'];
	$duplicate=mysqli_query($con, "SELECT * from tbl_schedule WHERE session='$s_session' AND s_day='$s_date' AND
                                    start_time='$s_stime' AND end_time='$s_etime'");
    
      if(mysqli_num_rows($duplicate)>0)
      {
        echo "<script> alert('Already Added');</script>";
        // header('location:department.php');
      }
    else
    {
		$d_id=$_SESSION['id'];
		$sql="SELECT * from tbl_doctor where login_id='$d_id'";
		$sql_run=mysqli_query($con, $sql);
			if($sql_run)
			{
				$val_fetch=mysqli_fetch_assoc($sql_run);
				$d_id=$val_fetch['login_id'];
				$ins="INSERT INTO tbl_schedule (session, doc_id, s_day, start_time, end_time, nop) VALUES ('$s_session', $d_id, '$s_date', '$s_stime', '$s_etime', '$s_nop')";
				if($con->query($ins)=== TRUE)
          		{
            		echo "<script> alert('Record Added Successfully'); </script>";
					// header('location:schedule.php');
				}
			}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>MedSphere</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="shortcut icon" href="../assets/images/logo1.png" />
	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">
        
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
    <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
    type="text/css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>
</head>
<body>
	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<p style="font-size:20px; color:white; margin-top:15px; margin-left:15px; font-weight:20px;">MedSphere</p>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<!-- <div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div> -->
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<!-- <li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li> -->
						<!-- <li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope"></i>
							</a>
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title d-flex justify-content-between align-items-center">
										Messages 									
										<a href="#" class="small">Mark all as read</a>
									</div>
								</li>
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-img"> 
													<img src="assets/img/jm_denis.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jimmy Denis</span>
													<span class="block">
														How are you ?
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="assets/img/chadengle.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Chad</span>
													<span class="block">
														Ok, Thanks !
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="assets/img/mlane.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jhon Doe</span>
													<span class="block">
														Ready for the meeting today...
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="assets/img/talha.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Talha</span>
													<span class="block">
														Hi, Apa Kabar ?
													</span>
													<span class="time">17 minutes ago</span> 
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li> -->
						<!-- <li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">4</span>
							</a> -->
							<!-- <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li> 
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
												<div class="notif-content">
													<span class="block">
														New user registered
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
												<div class="notif-content">
													<span class="block">
														Rahmad commented on Admin
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="assets/img/profile2.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="block">
														Reza send messages to you
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
												<div class="notif-content">
													<span class="block">
														Farrah liked Admin
													</span>
													<span class="time">17 minutes ago</span> 
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li> -->
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4>Hizrian</h4>
											<p class="text-muted"><?php echo $_SESSION['email']?></p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">My Profile</a>
									<!-- <a class="dropdown-item" href="#">My Balance</a> -->
									<a class="dropdown-item" href="#">Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Account Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="../logout.php">Logout</a>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
								<?php
									$doc_id=$_SESSION['id'];
									$sql="SELECT * from tbl_doctor where login_id='$doc_id'";
									$result=$con->query($sql);
									if ($result-> num_rows > 0){
									while ($row=$result-> fetch_assoc()) {?>
									<h4><?=$row["doc_name"]?></h4>
									<?php }
										}?>
									<span class="user-level">Doctor</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item">
							<a href="doctor.php">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item active">
							<a href="schedule.php">
								<i class="fas fa-home"></i>
								<p>Schedule</p>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Patients</p>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="">
								<i class="fas fa-pen-square"></i>
								<p>Reports</p>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						
						<li class="nav-item">
							<a href="profile.php">
								<i class="fas fa-home"></i>
								<p>Profile</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
					<button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
				        Add Session
				    </button>
                    </div>
				</div>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h2 class="modal-title" id="staticBackdropLabel">Add Session</h2>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form action="" method="POST">

								<div class="form-group">
									<input type="date" id="date_picker" min="'.date('Y-m-d').'" name="s_date" class="form-control" placeholder="Enter Date">
                                    <script language="javascript">
                                        var today = new Date();
                                        var dd = String(today.getDate()).padStart(2, '0');
                                        var mm = String(today.getMonth() + 1).padStart(2, '0');
                                        var yyyy = today.getFullYear();

                                        today = yyyy + '-' + mm + '-' + dd;
                                        $('#date_picker').attr('min',today);
                                    </script>
								</div>
                                <div class="form-group">
									<input type="time" name="s_stime" class="form-control" placeholder="Enter Start Time">
								</div>
                                <div class="form-group">
									<input type="time" name="s_etime" class="form-control" placeholder="Enter End Time">
								</div>
								<div class="form-group">
									<input type="text" name="s_nop" class="form-control" placeholder="Enter Number of Patients">
								</div>
                                <div class="form-group">
									<!-- <input type="text" name="session" class="form-control" placeholder="Enter Session"> -->
                                    <label>Select session : </label>
                                    <select name="session">
                                        <option value="Morning">Morning</option>
                                        <option value="Afternoon">Afternoon</option>
                                        <option value="Evening">Evening</option>
                                    </select>       
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									<button type="submit" name="add_schedule" class="btn btn-primary">Add</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

<div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Sl No</th>
            <th> Session</th>
			<th> Date</th>
            <th> Start Time </th>
            <th> End Time</th>
            <th> Number of Patient</th>
            <th> Edit</th>
            <th> Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr>
		  	<?php
				$e=$_SESSION['email'];
				$sql="SELECT * from tbl_schedule where doc_id='2' AND status!='1'";
				$result=$con->query($sql);
      			$count=1;
      			if ($result->num_rows>0){
        			while ($row=$result-> fetch_assoc()) {
						
			?>
            <td> <?=$count?></td>
            <td> <?=$row["session"]?></td>
			<td> <?=$row["s_day"]?></td>
            <td> <?=$row["start_time"]?></td>
            <td> <?=$row["end_time"]?></td>
			<td> <?=$row["nop"]?></td>
		
            <td>
                <form action="edit_session.php" method="POST">
                    <!-- <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button> -->
					<button class="btn btn-primary" name="edit_btn" value="<?=$row['schedule_id']?>" style="height:40px">Edit</button>
                </form>
				
			</td>
            <td>
                <form action="del_session.php" method="POST">
                  <!-- <input type="hidden" name="delete_id" value="">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button> -->
				  <button class="btn btn-danger"  name="d_btn" value="<?=$row['schedule_id']?>" style="height:40px">Delete</button>
                </form>
            </td>
          </tr>
		  <?php
            $count=$count+1;
          }
		  
        }
		else{echo "No rows";}
      ?>
        
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
			</div>
		</div>
		
				
		
		<!-- End Custom template -->
	</div>
</div>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="assets/js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Bootstrap Toggle -->
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Google Maps Plugin -->
<script src="assets/js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Azzara JS -->
<script src="assets/js/ready.min.js"></script>

<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="assets/js/setting-demo.js"></script>
<script src="assets/js/demo.js"></script>
</body>
</html>




<div class="checkboxes">
										<input type="checkbox" name="day" value="Monday" class="ml-3">Monday
										<input type="checkbox" name="day" value="Tuesday" class="ml-4">Tuesday
										<input type="checkbox" name="day" value="Wednesday" class="ml-4">Wednesday
										<input type="checkbox" name="day" value="Thurday" class="ml-4">Thursday
										<div class="row mt-3">
										<input type="checkbox" name="day" value="Friday" class="ml-5">Friday
										<input type="checkbox" name="day" value="Saturday" class="ml-4">Saturday
										<input type="checkbox" name="day" value="Sunday" class="ml-4">Sunday
									</div>
									</div>

<!-- doctor email view -->
<?php
						$l_id=$row["login_id"];
						$sql2="SELECT * from tbl_login where login_id='$l_id'";
						$result=$con-> query($sql2);
						$count=1;
						if ($result->num_rows > 0){
							while ($row1=$result-> fetch_assoc()) {?>
								<td> <?=$row1["email"]?></td>
								<?php }}?>


								
								<div class="form-group">
                <?php
					$sql="SELECT * from tbl_dept";
					$result = mysqli_query($con, $sql);
					?>
					<select name="dept" class="form-control">
					<option value>Select the department</option>
					<?php while($row = $result->fetch_assoc()) {?>
						<option value="<?php echo $row["dept_id"];?>">
							<?php echo $row['dept_name'] ?>
						</option>
					
					<?php
					}
					?>
					</select>
                </div>
				</div>

				if(!empty($_POST["doctor"])) 
    {
    $sql=mysqli_query($con,"select * from tbl_doctor where doc_id='".$_POST['doctor']."'");
    while($row=mysqli_fetch_array($sql))
        {?>
    <option value="<?php echo htmlentities($row['doc_fees']); ?>"><?php echo htmlentities($row['doc_fees']); ?></option>
    <?php
    }
    }

	<?php $ret=mysqli_query($con,"select * from tbl_schedule where doc_id='1'");
                        while($row=mysqli_fetch_array($ret))
                        {
                        ?>
                        <option value="<?php echo htmlentities($row['s_day']);?>">
                            <?php echo htmlentities($row['s_day']);?>
                        </option>
                        
                        <?php 
                    } ?>


					<div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="#" enctype="multipart/form-data" method="post">
                                    <?php
                                    $p_id=$_SESSION['id'];
									$query="SELECT * from tbl_patient WHERE login_id='$p_id'";
									$query_run=mysqli_query($con, $query);
									foreach($query_run as $data){
                                        $image=$data['image'];
									?>
                                    <div class="form-group row">
                                        <form class="form" id = "form" action="update_profile.php" enctype="multipart/form-data" method="post">
                                            <div class="upload">
                                            <img src="../images/<?php echo $image; ?>" width = 140 height = 150 title="<?php echo $image; ?>">
                                                <div class="rounded round">
                                                <input type="hidden" name="id" value="">
                                                <input type="hidden" name="name" value="">
                                                <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
                                                <i class = "fa fa-camera" style = "color: #fff;"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Name 
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$data['name'] ?>" id="val-username" name="val-username">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Email 
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$_SESSION['email']?>" id="val-email" name="val-email" placeholder="Your valid email.." disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-phoneus">Phone
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" name="phone" class="form-control" value="<?=$data['phone'] ?>" id="val-phoneus" name="val-phoneus">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-currency">Gender
                                            </label>
                                            <div class="col-lg-1 flex-item">
                                                <input type="radio" class="form-control" id="val-currency" name="val-currency" > Male
                                                <input type="radio" class="form-control" id="val-currency" name="val-currency" > Female
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-website">Date of Birth
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="val-website" name="val-website" placeholder="Date of Birth">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Marital Status
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="val-digits" placeholder="Marital Status">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-suggestions">Address 
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" id="val-suggestions" name="val-suggestions" rows="5" placeholder="Enter Address Here"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="update_profile" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>