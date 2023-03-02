<?php
  include('../connection.php');
  session_start();
  if(!isset($_SESSION["email"])) 
	{
		header("Location:../login.php");
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
						<!-- Search bar -->
						<div class="collapse" id="search-nav">
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
						</div>
						<!-- End of Search bar -->
						<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
							<li class="nav-item toggle-nav-search hidden-caret">
								<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
									<i class="fa fa-search"></i>
								</a>
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
									<span class="ml-5 mt-2">
									<?php
										$doc_id=$_SESSION['id'];
										$sql="SELECT * from tbl_doctor where login_id='$doc_id'";
										$result=$con->query($sql);
										if ($result-> num_rows > 0){
										while ($row=$result-> fetch_assoc()) {?>
										<h4><?=$row["doc_name"]?></h4>
										<?php }
											}?>
										<span class="ml-2">Doctor</span>
										<!-- <span class="caret"></span> -->
									</span>
								</a>
							</div>
						</div>
						<ul class="nav">
							<li class="nav-item">
								<a href="doctor.php">
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
							<li class="nav-item active">
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
							
							<li class="nav-item">
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
					<div class="card-body">
						<h4 class="page-title">Appointments</h4>
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th> Sl No</th>
										<th> Patient Name</th>
										<th> Date</th>
										<th> Time</th>
										<th> Status</th>
									</tr>
								</thead>
								<?php
								$l_id=$_SESSION['id'];
								$sql="SELECT * from tbl_doctor where login_id='$l_id'";
								$result=$con->query($sql);
								$count=1;
								if ($result-> num_rows > 0){
									while ($row=$result-> fetch_assoc()) {
										$d_id=$row["doc_id"];
										$sql1="SELECT * from tbl_appointment where doc_id='$d_id'";
										$result1=$con->query($sql1);
										if ($result1-> num_rows > 0){
										while ($row1=$result1-> fetch_assoc()) {
											$pid=$row1["login_id"];
											$sql2="SELECT * from tbl_patient where login_id='$pid'";
											$result2=$con->query($sql2);
											if ($result2-> num_rows > 0){
											while ($row2=$result2->fetch_assoc()) {
											?>
								<tbody>
									<tr>
										<td> <?=$count?> </td>
										<td> <a href="patient_page.php?cur_id=<?=$row2['p_id']?>"><?=$row2["name"]?></a></td>
										<td> <?=$row1["day"]?></td>
										<td> <?=$row1["time"]?></td>
										<td> <?=$row1["status"]?></td>
										<td>
											<!-- <form action="patient_page.php" method="POST">
											<input type="hidden" name="delete_id" value="">
											<button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
											<button class="btn btn-primary" name="a_btn" value="<?=$row2['p_id']?>" style="height:40px">Add More</button>
											</form> -->
										</td>
									</tr>
								</tbody>
								<?php
							}}}}}}?>
							</table>
						</div>
							
				</div>
			</div>
		</div>

		<script src="assets/js/core/jquery.3.2.1.min.js"></script>
		<script src="assets/js/core/popper.min.js"></script>
		<script src="assets/js/core/bootstrap.min.js"></script>
		<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
		<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
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
	</body>
</html>