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
		$duplicate=mysqli_query($con, "SELECT * from tbl_schedule WHERE session='$s_session' AND date='$s_date' AND
										start_time='$s_stime' AND end_time='$s_etime'");
		if(mysqli_num_rows($duplicate)>0)
		{
			echo "<script> alert('Already Added');</script>";
			// header('location:department.php');
		}
		else
		{
			$ins="INSERT INTO tbl_schedule (session, date, start_time, end_time, nop) VALUES ('$s_session', '$s_date', '$s_stime', '$s_etime', '$s_nop')";
			if($con->query($ins)=== TRUE)
			{
				echo "<script> alert('Record Added Successfully'); </script>";
				// header('location:schedule.php');

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
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">
	<link rel="stylesheet" href="assets/css/demo.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	
</head>
<body>
	<div class="wrapper">
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
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
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
											<p class="text-muted">hello@example.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">My Profile</a>
									<a class="dropdown-item" href="#">My Balance</a>
									<a class="dropdown-item" href="#">Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Account Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Logout</a>
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
							<div class="avatar-sm ml-4" style="height:120px; width:120px;">
								<img src="../patient/images/no_image.jpg" alt="..." class="avatar-img rounded-circle">
							</div>
							<div class="info">
								<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
									<span class="text-center mt-2">
									<?php
										$doc_id=$_SESSION['id'];
										$sql="SELECT * from tbl_doctor where login_id='$doc_id'";
										$result=$con->query($sql);
										if ($result-> num_rows > 0){
										while ($row=$result-> fetch_assoc()) {?>
										<h4><?=$row["doc_name"]?></h4>
										<?php }
											}?>
									</span>
										<span class="text-center">Doctor</span>
										<!-- <span class="caret"></span> -->
								</a>
							</div>
						</div>
				
						<ul class="nav">
						<li class="nav-item">
							<a href="index.html">
							<i class="fa-solid fa-bars"></i>
								<p>Dashboard</p>
								<!-- <span class="badge badge-count">5</span> -->
							</a>
						</li>
						<li class="nav-item">
							<a href="schedule.php">
							<i class="fa-regular fa-calendar"></i>
								<p>Schedule</p>
								<!-- <span class="badge badge-count">5</span> -->
							</a>
						</li>
						<li class="nav-item">
							<a href="appointment.php">
							<i class="fa-solid fa-user"></i>
								<p>Appointment</p>
								<!-- <span class="caret"></span> -->
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
							<a href="patient_page.php">
								<i class="fas fa-pen-square"></i>
								<p>Details</p>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						
						<li class="nav-item active">
							<a href="profile.php">
							<i class="fa-solid fa-circle-user"></i>
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
				<div class="container-fluid mt-5">
					<div class="row">
						<div class="col-xl-3">
							<div class="card mb-l-2">
								<form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
									<div class="col mt-5 mb-5">
									<?php
										$p_id=$_SESSION['id'];
										$sql="SELECT * from tbl_doctor where login_id='$p_id'";
										$result=$con->query($sql);
										if ($result-> num_rows > 0){
										while ($row=$result-> fetch_assoc()) {
											$image=$row['image'];?>
											<img src="../images/<?php echo $image; ?>" width = 140 height = 150 title="<?php echo $image; ?>">
											<?php }}?>
										<div class="round">
											<input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
											<i class = "fa fa-camera" style = "color: #fff;"></i>
										</div>
									</div>
								</form>

								<script type="text/javascript">
								document.getElementById("image").onchange = function(){
									document.getElementById("form").submit();
								};
								</script>

								<!-- Image Upload -->
								<?php
								if(isset($_FILES["image"]["name"])){
									$p_id=$_SESSION['id'];
								$imageName = $_FILES["image"]["name"];
								$imageSize = $_FILES["image"]["size"];
								$tmpName = $_FILES["image"]["tmp_name"];

								// Image validation
								$validImageExtension = ['jpg', 'jpeg', 'png'];
								$imageExtension = explode('.', $imageName);
								$imageExtension = strtolower(end($imageExtension));
								if (!in_array($imageExtension, $validImageExtension)){
									echo
									"
									<script>
									alert('Invalid Image Extension');
									document.location.href = 'profile.php';
									</script>
									";
								}
								elseif ($imageSize > 1200000){
									echo
									"
									<script>
									alert('Image Size Is Too Large');
									document.location.href = 'profile.php';
									</script>
									";
								}
								else{
									$newImageName =" - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
									$newImageName .= '.' . $imageExtension;
									$query = "UPDATE tbl_patient SET image = '$newImageName' WHERE login_id = $p_id";
									mysqli_query($con, $query);
									move_uploaded_file($tmpName, '../images/' . $newImageName);
									echo
									"
									<script>
									alert('Image Uploaded Successfully');
									document.location.href = 'profile.php';
									</script>
									";
								}
								}
								?>      
								
								</div>
							</div>
						</div>

						<div class="col-xl-9">
							<div class="col-md-6 border-right">
								<div class="p-3 py-5">
									<div class="d-flex justify-content-between align-items-center mb-3">
										<h2 class="text-center">Personal Profile</h2>
									</div>
									<div class="row mt-3">
										<div class="col-md-12"><label class="labels">Full Name</label><input type="text" class="form-control" placeholder="Full name" value=""></div>
										<div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value=""></div>
										<div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value=""></div>
										<div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address" value=""></div>
										<div class="col-md-12"><label class="labels">Pin code</label><input type="text" class="form-control" placeholder="Pincode" value=""></div>
										<div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" placeholder="State" value=""></div>
										<div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="Area" value=""></div>
										<div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value=""></div>
									</div>
									<div class="row mt-3">
										<div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
										<div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
									</div>
									<div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>>
	<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<script src="assets/js/plugin/moment/moment.min.js"></script>
	<script src="assets/js/plugin/chart.js/chart.min.js"></script>
	<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
	<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>
	<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
	<script src="assets/js/plugin/gmaps/gmaps.js"></script>
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script src="assets/js/ready.min.js"></script>
	<script src="assets/js/setting-demo.js"></script>
	<script src="assets/js/demo.js"></script>
	<script src="./plugins/validation/jquery.validate.min.js"></script>
    <script src="./plugins/validation/jquery.validate-init.js"></script>
</body>
</html>