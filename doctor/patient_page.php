<?php
  include('../connection.php');
  session_start();
  if(!isset($_SESSION["email"])) 
	{
		header("Location:../login.php");
	}

	if(isset($_POST['a_btn']))
	{
		$_SESSION['cur_pid']=$_POST['a_btn'];
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
	
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


	<script>
        function getdisease(val) {
            $.ajax({
            type: "POST",
            url: "php/get_consult.php",
            data:'sym_id='+val,
            success: function(data){
                $("#disease").html(data);
            }
            });
        }
    </script>	
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
						<!-- Message -->
						<!-- <li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">4</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
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
						<!-- <li class="nav-item dropdown hidden-caret">
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
									<a class="dropdown-item" href="../logout.php">Logout</a>
								</li>
							</ul>
						</li> -->
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
									<span class="ml-2">Doctor </span>
									<!-- <span class="caret"></span> -->
								</span>
							</a>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item">
							<a href="index.html">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<!-- <span class="badge badge-count">5</span> -->
							</a>
						</li>
						<li class="nav-item">
							<a href="schedule.php">
								<i class="fas fa-home"></i>
								<p>Schedule</p>
								<!-- <span class="badge badge-count">5</span> -->
							</a>
						</li>
						<li class="nav-item">
							<a href="appointment.php">
								<i class="fas fa-layer-group"></i>
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
						<li class="nav-item  active">
							<a href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Details</p>
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
					<div class="container-fluid">
						
  						<div class="row">
    						<div class="col-6">
							<h2 class="text-center" style="font-size:27px;">Consultation Details</h2>
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary mb-2 float-right" data-toggle="modal" data-target="#exampleModalLong">
									Add Consultation Details
								</button>

								<!-- Modal -->
								<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLongTitle">Consultation Details</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<style>
													select {
														width: 450px;
														
													}
													select:focus {
														min-width: 150px;
														width: auto;
													}
												</style>
												<form action="disease_update.php" method="POST">	
													<!-- <div class="form-group">
														<label>Patient Name</label>
														<input type="text" id="name" name="dept_name" class="form-control" placeholder="Patient Name" value="Geya Merin Shibu" required>
													</div> -->
													<!-- <h6 class="error-message" id="name_err" style="color:red;"></h6> -->
													<div class="form-group" >
														<label>Symptoms</label><br>
														<select class="js-example-basic-multiple" name="sym" width="50" multiple="multiple" onChange="getdisease(this.value);">
															<?php
																$sql="SELECT * from tbl_symptoms";
																$result=$con->query($sql);
																if ($result-> num_rows > 0){
																while ($row=$result-> fetch_assoc()) {
															?>
																<option value="<?=$row["dis_id"];?>">
																	<?=$row["sym_name"];?>
																</option>
															<?php }}?>
														</select>
													</div>
																	
													<div class="form-group">
														<select name="disease" class="form-control" id="disease"  required="required">
															<option value="">Disease</option>
														</select>
													</div>
													<div class="form-group">
														<div class="row">
															<div class="col-sm-8">
																<input type="text" id="medicine" name="medicine" class="form-control" placeholder="Medicine Name" required>
															</div>
															<div class="col-sm-4">
																<input type="text" id="medicine" name="medicine" class="form-control" placeholder="Dose" required>
															</div>
														</div>
													</div>
													
													<div class="form-group">
														<input type="text" id="dosage" name="dosage" class="form-control" placeholder="Count" required>
													</div>
												
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" name="add_consultation" class="btn btn-primary">Add</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>		

								<table class="table table-bordered" width="100%">
									<thead>
										<tr>
										<th scope="col" width="10%">Sl No</th>
										<th scope="col">Symptoms</th>
										<th scope="col">Disease</th>
										<th scope="col">Medicine</th>
										<th scope="col">Dosage</th>
										</tr>
									</thead>
									<?php
										$cpid=$_SESSION['cur_pid'];
										$sql="SELECT * from tbl_record where p_id='$cpid'";
										$result=$con->query($sql);
										$count=1;
										if($result-> num_rows > 0){
										while ($row=$result-> fetch_assoc()) {?>
										<tbody>
											<tr>
												<th scope="row"><?php echo $count;?></th>
												<td><?php
													$symid=$row["symptoms"];
													$sql1="SELECT * from tbl_symptoms where sym_id='$symid'";
													$result1=$con->query($sql1);
													if ($result1-> num_rows > 0){
													while ($row1=$result1-> fetch_assoc()) {
														echo $row1["sym_name"];}} ?>
												</td>
												<td><?php
													$disid=$row["disease"];
													$sql2="SELECT * from tbl_disease where dis_id='$disid'";
													$result2=$con->query($sql2);
													if ($result2-> num_rows > 0){
													while ($row2=$result2->fetch_assoc()) {
														echo $row2["dis_name"];}}?>
												</td>
												<td><?=$row["med_name"]?></td>
												<td><?=$row["dosage"]?></td>
											</tr>
										</tbody>
										<?php $count=$count+1;}}?>
								</table>
    						</div>
							<div class="col-6">
								<section style="background-color: #eee;">
									<div class="container-fluid py-5">
										<h2 class="text-center" style="font-size:30px;">Patient Data</h2>
										<?php
											$cpid=$_SESSION['cur_pid'];
											$sql="SELECT * from tbl_patient where p_id='$cpid'";
											$result=$con->query($sql);
											$count=1;
											if($result-> num_rows > 0){
											while ($row=$result-> fetch_assoc()) {
												$image=$row['image'];?>
										<div class="row">
											<div class="col-lg-8">
												<div class="card mb-4">
													<div class="card-body">
														<div class="row">
														<div class="col-sm-3">
															<p class="mb-0">Name</p>
														</div>
														<div class="col-sm-9">
															<p class="text-muted mb-0"><?=$row["name"]?></p>
														</div>
														</div>
														<hr>
														<div class="row">
														<div class="col-sm-3">
															<p class="mb-0">Email</p>
														</div>
														<div class="col-sm-9">
															<p class="text-muted mb-0">geyams16@gmail.com</p>
														</div>
														</div>
														<hr>
														<div class="row">
														<div class="col-sm-3">
															<p class="mb-0">Phone</p>
														</div>
														<div class="col-sm-9">
															<p class="text-muted mb-0"><?=$row["phone"]?></p>
														</div>
														</div>
														<hr>
														<div class="row">
														<div class="col-sm-3">
															<p class="mb-0">DOB</p>
														</div>
														<div class="col-sm-9">
															<p class="text-muted mb-0"><?=$row["dob"]?></p>
														</div>
														</div>
														<hr>
														<div class="row">
														<div class="col-sm-3">
															<p class="mb-0">Address</p>
														</div>
														<div class="col-sm-9">
															<p class="text-muted mb-0">ABC XYZ PQR</p>
														</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="card mb-4">
													<div class="card-body text-center">
														<img src="../images/<?php echo $image;?>" alt="avatar" class="rounded-circle" style="width:120px; height:130px;">
														<!-- <h5 class="my-3">John Smith</h5> -->
														<br><br><p class="text-muted mb-1">Hospital ID :MS200</p>
														<!-- <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> -->
														<!-- <div class="d-flex justify-content-center mb-2">
															<button type="button" class="btn btn-primary">Follow</button>
															<button type="button" class="btn btn-outline-primary ms-1">Message</button>
														</div> -->
													</div>
												</div>
											</div>
											<p class="col ml-5" style="font-size:20px;">Last Consulted:</p>
										</div>
										<?php }}?>
									</div>
								</section>
							</div>
  						</div>
						<div class="row">
						<div class="col text-left mt-5">
								<div class="back-button">
									<a href="appointment.php" class="btn btn-info">Back</a>
								</div>
							</div>
							<div class="col text-right mt-5">
								<form action="disease_update.php" method="POST">			
									<button class="btn btn-primary" name="consut" value="">Save</button>
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

		<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
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
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<script>
		$(document).ready(function() {
			$('.js-example-basic-multiple').select2();
		});
		</script>
	</body>
</html>