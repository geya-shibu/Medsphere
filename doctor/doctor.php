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
						<li class="nav-item active">
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
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Dashboard</h4>
						<!-- <div class="btn-group btn-group-page-header ml-auto">
							<button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-ellipsis-h"></i>
							</button>
							<div class="dropdown-menu">
								<div class="arrow"></div>
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Separated link</a>
							</div>
						</div> -->
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-primary bubble-shadow-small">
												<i class="fas fa-users"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Total Patients</p>
												<h4 class="card-title">0</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-info bubble-shadow-small">
												<i class="far fa-newspaper"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Total Appointments</p>
												<h4 class="card-title">0</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-success bubble-shadow-small">
												<i class="far fa-chart-bar"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Income</p>
												<h4 class="card-title">0</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-secondary bubble-shadow-small">
												<i class="far fa-check-circle"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Treatments</p>
												<h4 class="card-title">0</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Today Appointments</div>
											<div class="card-tools">
												<!-- <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
													<span class="btn-label">
														<i class="fa fa-pencil"></i>
													</span>
													Export
												</a> -->
												<a href="#" class="btn btn-info btn-border btn-round btn-sm">
													<span class="btn-label">
														<i class="fa fa-print"></i>
													</span>
													Print
												</a>
											</div>
										</div>
									</div>
									
									<table class="table mt-3">
										<thead>
											<tr>
												<th scope="col">Sl No</th>
												<th scope="col">Patient Name</th>
												<th scope="col">Time</th>
												<th scope="col">Token Number</th>
												<th scope="col">More</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<?php
												$doc_id=$_SESSION['docid'];
												$date = date('20y-m-d');
												$sql="SELECT * from tbl_appointment where doc_id='$doc_id'and day='$date'";
												$count=1;
												$result=$con->query($sql);
												if ($result-> num_rows > 0){
												while ($row=$result-> fetch_assoc()) {?>
												<td><?=$count?></td>
												<td><?=$row["dept_id"]?></td>
												<td><?=$row["time"]?></td>
												<td>5</td>
												<td>
												<form action="disease_update.php" method="POST">
													<!-- <input type="hidden" name="delete_id" value="">
													<button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button> -->
													<button class="btn btn-danger"  name="d_btn" value="<?=$row['dept_id']?>" style="height:40px">More</button>
										</form>
												</td>
											</tr>
											<?php $count=$count+1; }}?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- <div class="row">
							<div class="col-md-4">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Payment</div>
									</div>
									<div class="card-body pb-0">
										<div class="d-flex">
											<div class="avatar">
												<img src="assets/img/logoproduct.svg" alt="..." class="avatar-img rounded-circle">
											</div>
											<div class="flex-1 pt-1 ml-2">
												<h5 class="fw-bold mb-1">Larry</h5>
												<small class="text-muted">Finished</small>
											</div>
											<div class="d-flex ml-auto align-items-center">
												<h3 class="text-info fw-bold">Rs 250</h3>
											</div>
										</div>
										<div class="separator-dashed"></div>
										<div class="d-flex">
											<div class="avatar">
												<img src="assets/img/logoproduct2.svg" alt="..." class="avatar-img rounded-circle">
											</div>
											<div class="flex-1 pt-1 ml-2">
												<h5 class="fw-bold mb-1">J.CO Donuts</h5>
												<small class="text-muted">The Best Donuts</small>
											</div>
											<div class="d-flex ml-auto align-items-center">
												<h3 class="text-info fw-bold">+$300</h3>
											</div>
										</div>
										<div class="separator-dashed"></div>
										<div class="d-flex">
											<div class="avatar">
												<img src="assets/img/logoproduct3.svg" alt="..." class="avatar-img rounded-circle">
											</div>
											<div class="flex-1 pt-1 ml-2">
												<h5 class="fw-bold mb-1">Ready Pro</h5>
												<small class="text-muted">Bootstrap 4 Admin Dashboard</small>
											</div>
											<div class="d-flex ml-auto align-items-center">
												<h3 class="text-info fw-bold">+$350</h3>
											</div>
										</div>
										<div class="separator-dashed"></div>
										<div class="pull-in">
											<canvas id="topProductsChart"></canvas>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-body">
										<div class="card-title fw-mediumbold">Suggestions</div>
										<div class="card-list">
											<div class="item-list">
												<div class="avatar">
													<img src="assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
												</div>
												<div class="info-user ml-3">
													<div class="username">Larry</div>
													<div class="status">Good Approach</div>
												</div>
												<button class="btn btn-icon btn-primary btn-round btn-sm">
													<i class="fa fa-plus"></i>
												</button>
											</div>
											<div class="item-list">
												<div class="avatar">
													<img src="assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle">
												</div>
												<div class="info-user ml-3">
													<div class="username">Mary</div>
													<div class="status">Friendly</div>
												</div>
												<button class="btn btn-icon btn-primary btn-round btn-sm">
													<i class="fa fa-plus"></i>
												</button>
											</div>
											
											<div class="item-list">
												<div class="avatar">
													<img src="assets/img/mlane.jpg" alt="..." class="avatar-img rounded-circle">
												</div>
												<div class="info-user ml-3">
													<div class="username">John Doe</div>
													<div class="status">Terrible</div>
												</div>
												<button class="btn btn-icon btn-primary btn-round btn-sm">
													<i class="fa fa-plus"></i>
												</button>
											</div>
											<div class="item-list">
												<div class="avatar">
													<img src="assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle">
												</div>
												<div class="info-user ml-3">
													<div class="username">Talha</div>
													<div class="status">Front End Designer</div>
												</div>
												<button class="btn btn-icon btn-primary btn-round btn-sm">
													<i class="fa fa-plus"></i>
												</button>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card card-primary bg-primary-gradient bubble-shadow">
									<div class="card-body">
										<h4 class="mt-3 b-b1 pb-2 mb-4 fw-bold">Active user right now</h4>
										<h1 class="mb-4 fw-bold">17</h1>
										<h4 class="mt-3 b-b1 pb-2 mb-5 fw-bold">Page view per minutes</h4>
										<h1 class="mb-2 fw-bold">10</h1>
										
										
									</div>
								</div>
							</div>
						</div> -->
						<!-- <div class="row">
							<div class="col-md-6">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Feed Activity</div>
									</div>
									<div class="card-body">
										<ol class="activity-feed">
											<li class="feed-item feed-item-secondary">
												<time class="date" datetime="9-25">Sep 25</time>
												<span class="text">Responded to need <a href="#">"Volunteer opportunity"</a></span>
											</li>
											<li class="feed-item feed-item-success">
												<time class="date" datetime="9-24">Sep 24</time>
												<span class="text">Added an interest <a href="#">"Volunteer Activities"</a></span>
											</li>
											<li class="feed-item feed-item-warning">
												<time class="date" datetime="9-21">Sep 21</time>
												<span class="text">Responded to need <a href="#">"In-Kind Opportunity"</a></span>
											</li>
											<li class="feed-item feed-item-danger">
												<time class="date" datetime="9-18">Sep 18</time>
												<span class="text">Created need <a href="#">"Volunteer Opportunity"</a></span>
											</li>
											<li class="feed-item">
												<time class="date" datetime="9-17">Sep 17</time>
												<span class="text">Attending the event <a href="single-event.php">"Some New Event"</a></span>
											</li>
										</ol>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card">
									<div class="card-header">
										<div class="card-head-row">
											<div class="card-title">Support Tickets</div>
											<div class="card-tools">
												<ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
													<li class="nav-item">
														<a class="nav-link" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Today</a>
													</li>
													<li class="nav-item">
														<a class="nav-link active" id="pills-week" data-toggle="pill" href="#pills-week" role="tab" aria-selected="false">Week</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab" aria-selected="false">Month</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="d-flex">
											<div class="avatar avatar-online">
												<span class="avatar-title rounded-circle border border-white bg-info">J</span>
											</div>
											<div class="flex-1 ml-3 pt-1">
												<h5 class="text-uppercase fw-bold mb-1">Joko Subianto <span class="text-warning pl-3">pending</span></h5>
												<span class="text-muted">I am facing some trouble with my viewport. When i start my</span>
											</div>
											<div class="float-right pt-1">
												<small class="text-muted">8:40 PM</small>
											</div>
										</div>
										<div class="separator-dashed"></div>
										<div class="d-flex">
											<div class="avatar avatar-offline">
												<span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
											</div>
											<div class="flex-1 ml-3 pt-1">
												<h5 class="text-uppercase fw-bold mb-1">Prabowo Widodo <span class="text-success pl-3">open</span></h5>
												<span class="text-muted">I have some query regarding the license issue.</span>
											</div>
											<div class="float-right pt-1">
												<small class="text-muted">1 Day Ago</small>
											</div>
										</div>
										<div class="separator-dashed"></div>
										<div class="d-flex">
											<div class="avatar avatar-away">
												<span class="avatar-title rounded-circle border border-white bg-danger">L</span>
											</div>
											<div class="flex-1 ml-3 pt-1">
												<h5 class="text-uppercase fw-bold mb-1">Lee Chong Wei <span class="text-muted pl-3">closed</span></h5>
												<span class="text-muted">Is there any update plan for RTL version near future?</span>
											</div>
											<div class="float-right pt-1">
												<small class="text-muted">2 Days Ago</small>
											</div>
										</div>
										<div class="separator-dashed"></div>
										<div class="d-flex">
											<div class="avatar avatar-offline">
												<span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
											</div>
											<div class="flex-1 ml-3 pt-1">
												<h5 class="text-uppercase fw-bold mb-1">Peter Parker <span class="text-success pl-3">open</span></h5>
												<span class="text-muted">I have some query regarding the license issue.</span>
											</div>
											<div class="float-right pt-1">
												<small class="text-muted">2 Day Ago</small>
											</div>
										</div>
										<div class="separator-dashed"></div>
										<div class="d-flex">
											<div class="avatar avatar-away">
												<span class="avatar-title rounded-circle border border-white bg-danger">L</span>
											</div>
											<div class="flex-1 ml-3 pt-1">
												<h5 class="text-uppercase fw-bold mb-1">Logan Paul <span class="text-muted pl-3">closed</span></h5>
												<span class="text-muted">Is there any update plan for RTL version near future?</span>
											</div>
											<div class="float-right pt-1">
												<small class="text-muted">2 Days Ago</small>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
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
	<script src="https://kit.fontawesome.com/368b730f26.js" crossorigin="anonymous"></script>
</body>
</html>