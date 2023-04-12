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
								<?php
									$doc_id=$_SESSION['docid'];
									$sql="SELECT * from tbl_doctor where doc_id='$doc_id'";
									$result=$con->query($sql);
									if ($result-> num_rows > 0){
									while ($row=$result-> fetch_assoc()) {
                                        $image=$row['image'];?>
                                    <img class="avatar-img rounded-circle" src="../images/<?php echo $image; ?>" width = 140 height = 150 title="<?php echo $image;  ?>" style="margin-left:10px;">
									<?php }
									}?>
								<!-- <img src="../patient/images/no_image.jpg" alt="..." class="avatar-img rounded-circle"> -->
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
										<?php $docid=$row["doc_id"];
										$_SESSION['docid']=$docid;?>
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
						<li class="nav-item">
							<a href="appointment.php">
							<i class="fa-solid fa-user"></i>
								<p>Appointment</p>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						<!-- <li class="nav-item">
							<a href="all_patients.php">
								<i class="fas fa-layer-group"></i>
								<p>Patients</p>
								<span class="caret"></span>
							</a>
						</li> -->
						<li class="nav-item">
							<a href="all_appointments.php">
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
					<div class="card-body">
						<div class="container-fluid">
						<h4 class="page-title text-center">All Appointments</h4>
  							<div class="row">
    							<div class="col-sm-12" style="height: 50vh; overflow-y: scroll;">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th> Sl No</th>
													<th> Patient Name</th>
													<th> Date</th>
													<th> Time</th>
													<th> Status</th>
													<!-- <th> Next Visit</th> -->
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
													$sql1="SELECT * from tbl_appointment where doc_id='$d_id' AND status='Consulted'";
													//echo $sql1;
													$result1=$con->query($sql1);
													if ($result1-> num_rows > 0){
													while ($row1=$result1-> fetch_assoc()) {
														$l_id=$row1['p_id'];
														$sql2="SELECT * from tbl_patient where p_id='$l_id'";
														//echo $sql2;
														$result2=$con->query($sql2);
														if ($result2-> num_rows > 0){
														while ($row2=$result2->fetch_assoc()) {
														
														?>
											<tbody>
												<tr>
													<td> <?=$count?> </td>
													<td> <?=$row2["name"]?></td>
													<td> <?=$row1["day"]?></td>
													<td> <?=$row1["time"]?></td>
													<td> <?=$row1["status"]?></td>
													
												</tr>
											</tbody>
										</table>
									</div>
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Next Consultation Details</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="next_visit.php" method="POST">
													<div class="form-group">
														<input type="date" id="date_picker" min="'.date('Y-m-d').'" name="next_date" class="form-control" placeholder="Enter Date">
														<script language="javascript">
															var today = new Date();
															var dd = String(today.getDate()).padStart(2, '0');
															var mm = String(today.getMonth() + 1).padStart(2, '0');
															var yyyy = today.getFullYear();

															today = yyyy + '-' + mm + '-' + dd;
															$('#date_picker').attr('min',today);
														</script>
													</div>

													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" name="next_consult" value="<?=$row2['p_id']?>" class="btn btn-primary">Send</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<?php $count=$count+1;
										}}}}}}?>
								</div>
  							</div>
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