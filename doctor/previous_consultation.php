<?php
  include('../connection.php');
  session_start();
  if(!isset($_SESSION["email"])) 
	{
		header("Location:../login.php");
	}

	if(isset($_GET['cur_id']))
	{
		$_SESSION['cur_pid']=$_GET['cur_id'];
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
				<div class="page-inner">
					<div class="container-fluid">
  						<div class="row">
    						<div class="col-12">
								<h2 class="text-center mb-5" style="font-size:27px;">Previous Consultation Details</h2>
								<div class="row">	
									<div class="col-5">	
                                        <h3 class="text-center" style="font-size:19px; color:#C70039;"><i class="bi bi-lungs"></i> Symptoms and Diseases</h3>		
									<table class="table table-bordered" width="100%">
										<thead>
											<tr>
											<th scope="col" width="10%">Sl No</th>
                                            <th scope="col">Date</th>
											<th scope="col">Symptoms</th>
											<th scope="col">Disease</th>
											<!-- <th scope="col">Medicine</th>
											<th scope="col">Dosage</th>
											<th scope="col">Count</th> -->
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
                                                    <td><?php echo $row["con_date"]; ?></th>
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
													
												</tr>
											</tbody>
											<?php $count=$count+1;}}?>
									</table>
									</div>

									<div class="col">
                                    <h3 class="text-center" style="font-size:19px;  color:#C70039;"><i class="bi bi-capsule-pill"></i> Medicine Details</h3>
									<table class="table table-bordered" width="100%">
										<thead>
											<tr>
											<th scope="col" width="10%">Sl No</th>
                                            <th scope="col">Date</th>
											<th scope="col">Medicine</th>
											<th scope="col">Dosage</th>
											<th scope="col">Start date</th>
											<th scope="col">End date</th>
											<th scope="col">Timings</th>
											<th scope="col">Count</th>
											</tr>
										</thead>
										<?php
											$cpid=$_SESSION['cur_pid'];
											$sql1="SELECT * from tbl_medicine where p_id='$cpid'";
											$result1=$con->query($sql1);
											$count=1;
											if($result1-> num_rows > 0){
											while ($row1=$result1-> fetch_assoc()) {?>
											<tbody>
												<tr>
													<th scope="row"><?php echo $count;?></th>
                                                    <td><?=$row1["con_date"]?></td>
													<td><?=$row1["med_name"]?></td>
													<td><?=$row1["med_dose"]?></td>
													<td><?=$row1["start_date"]?></td>
													<td><?=$row1["end_date"]?></td>
													<td><?=$row1["timing"]?></td>
													<td><?=$row1["count"]?></td>
												</tr>
											</tbody>
											<?php $count=$count+1;}}?>
									</table>
									</div>
								</div>	
    						</div>

  						</div>

						<div class="row">
							<div class="col ">
								<div class="back-button" id="button-container">
									<a href="patient_page.php" class="btn btn-info">Back</a>
								</div>
							</div>
							<!-- <div class="col" >
								<form action="save_update.php" method="POST">			
									<button class="btn btn-primary" id="button-containersave" name="consult">Save</button>
								</form>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<style>
			#button-container {
			position: fixed;
			bottom: 25px;
			right: 10;
  			text-align: left;
			}
		</style>
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