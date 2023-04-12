<?php
include('connection.php');
use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  function sendMail($email, $password)
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
      $mail->Subject = 'MedSphere';
      $mail->Body    = "Welcome to be a part of MedSphere.We look forward to your services.<br> 
	  					You can login to the portal using<br> Email=$email <br> Password=$password";
      $mail->send();
      return true;
  } catch (Exception $e) {
      // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      return false;
  }
}

if(isset($_POST['add_doctor']))
{
	$doc_email=$_POST['doc_email'];
	$doc_name=$_POST['doc_name'];
	$dept_name=$_POST['dept'];
	$password=rand();
	$pass=md5($password);
	$duplicate=mysqli_query($con, "SELECT * from tbl_login WHERE email='$doc_email'");
    if(mysqli_num_rows($duplicate)>0)
    {
        echo "<script> alert('Already Registered');</script>";
        //header('location:doctors.php');
    }
	else
	{
		$sql="INSERT INTO tbl_login(email, password, verified, type) VALUES ('$doc_email', '$pass', '1', 'doctor')";
		if($con->query($sql)=== TRUE && sendMail($doc_email, $password))
			{
				$sql1="SELECT login_id from tbl_login where email='$doc_email'";
				$sql1_run=mysqli_query($con, $sql1);
				if($sql1_run)
				{
					$val_fetch=mysqli_fetch_assoc($sql1_run);
					$login_id=$val_fetch['login_id'];
					$sql2="INSERT INTO tbl_doctor(login_id, dept_id, doc_name) VALUES ('$login_id','$dept_name', '$doc_name')";
					if($con->query($sql2))
					{
					echo "<script> alert('Doctor Added Successfully'); </script>";
					exit();
					}
				}
			}
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<link rel="shortcut icon" href="assets/images/logo1.png" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/css_admin/admin.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/css_admin/sb-admin-2.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	

	
	<title>Admin</title>

	<link href="assets/css/app.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          			<span class="align-middle">Admin</span>
        		</a>

				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a class="sidebar-link" href="adminpage.php">
							<i class="bi bi-sliders2-vertical"></i>
              				<span class="align-left">Dashboard</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="department.php">
							<i class="bi bi-building"></i>
              				<span class="align-middle">Departments</span>
            			</a>
					</li>

					<li class="sidebar-item active" >
						<a class="sidebar-link" href="doctors.php">
						<i class="bi bi-person-hearts"></i>
						<span class="align-middle">Doctors</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="admin_patient.php">
						<i class="bi bi-person-heart"></i>
						<span class="align-middle">Patients</span>
            			</a>
					</li>

					<!-- <li class="sidebar-item">
						<a class="sidebar-link" href="pages-invoice.html">
						<i class="bi bi-file-earmark-bar-graph"></i></i> 
						<span class="align-middle">Reports</span>
            			</a>
					</li> -->


					<li class="sidebar-item">
						<a class="sidebar-link" href="admin_payment.php">
						<i class="bi bi-paypal"></i> 
						<span class="align-middle">Payment</span>
            			</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          			<i class="hamburger align-self-center"></i>
        		</a>

				<form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" class="form-control" placeholder="Search…" aria-label="Search">
						<button class="btn" type="button">
              				<i class="align-middle" data-feather="search"></i>
            			</button>
					</div>
				</form>
				<div class="navbar-collapse collapse">
						<ul class="navbar-nav navbar-align">
							<li class="nav-item dropdown">
								<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
									<i class="align-middle" data-feather="settings"></i>
								</a>				
								<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
									<img src="assets/images/avatars/avatar.jpg" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span class="text-dark">Admin</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
									<!-- <a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics</a> -->
									<div class="dropdown-divider"></div>
									<!-- <a class="dropdown-item" href="pages-settings.html"><i class="align-middle mr-1" data-feather="settings"></i> Settings & Privacy</a>
									<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="help-circle"></i> Help Center</a>
									<div class="dropdown-divider"></div> -->
									<a class="dropdown-item" href="logout.php">Log out</a>
								</div>
							</li>
						</ul>
					</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong>DOCTORS</strong></h3>
						</div>

						<div class="col-auto ml-auto text-right mt-n1">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<!-- <li class="breadcrumb-item"><a href="#">Dashboards</a></li> -->
									<li class="breadcrumb-item active" aria-current="page">Doctors</li>
								</ol>
							</nav>
						</div>
						<!-- Button trigger modal -->
				<div class="container">
				<button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
				Add Doctor
				</button>

				<!-- Modal -->
			<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticBackdropLabel">Add Doctor</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form action="" method="POST">
								<div class="form-group">
									<input type="text" name="doc_email" class="form-control" placeholder="Enter Email ID">
								</div>
								<div class="form-group">
									<input type="text" name="doc_name" class="form-control" placeholder="Enter Doctor Name">
								</div>
								<?php
								$sql="SELECT * from tbl_dept";
								$result = mysqli_query($con, $sql);
								?>
								<select name="dept">
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
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									<button type="submit" name="add_doctor" class="btn btn-primary">Add</button>
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
            <th> Doctor Name</th>
			<th> Doctor Email</th>
            <!-- <th> EDIT </th> -->
            <th> DELETE </th>
          </tr>
        </thead>
        <tbody>
          	<tr>
		  		<?php
				$sql="SELECT * from tbl_doctor where status!='1'";
				$result=$con-> query($sql);
      			$count=1;
      			if ($result->num_rows > 0){
        			while ($row=$result-> fetch_assoc()) 
					{
						$sql1="SELECT * from tbl_login where login_id=".$row["login_id"]."";
						$result1=$con-> query($sql1);
						$count=1;
						if ($result1->num_rows > 0){
							while ($row1=$result1-> fetch_assoc()) 
							{
								$sql2="SELECT * from tbl_dept where dept_id=".$row["dept_id"]."";
								$result2=$con-> query($sql2);
								$count=1;
								if ($result2->num_rows > 0){
									while ($row2=$result2-> fetch_assoc()) 
									{
							?>
								<td> <?=$count?></td>
								<td> <?=$row["doc_name"]?></td>
								<td> <?=$row1["email"]?></td>
								<td> <?=$row2["dept_name"]?></td>
								<!-- <td>
									<form action="edit_dept.php" method="POST">
										<input type="hidden" name="edit_id" value="">
										<button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
										<button class="btn btn-primary" name="edit_btn" value="" style="height:40px">Edit</button>
									</form>
								</td> -->
							<td>
								<form action="del_doctor.php" method="POST">
								<!-- <input type="hidden" name="delete_id" value="">
								<button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button> -->
								<button class="btn btn-danger"  name="d_btn" value="<?=$row['doc_id']?>" style="height:40px">Delete</button>
								</form>
							</td>
						</tr>
						<?php
            				$count=$count+1;
						}
						}}}}}
				?>
          	
        </tbody>
      </table>

    </div>
  </div>
</div>
</div>

    
                    </div>
                </div>
			</main>
		</div>
	</div>

	<script src="js/app.js"></script>
	<script src="assets/js/sb-admin-2.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new JsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				}
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span class=\"fas fa-chevron-left\" title=\"Previous month\"></span>",
				nextArrow: "<span class=\"fas fa-chevron-right\" title=\"Next month\"></span>",
			});
		});
	</script>

</body>

</html>