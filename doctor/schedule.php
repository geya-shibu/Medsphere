<?php
  include('../connection.php');
  session_start();

if(isset($_POST['add_schedule']))
{
	$s_date=$_POST['s_date'];
	$s_stime=$_POST['s_stime'];
    $s_etime=$_POST['s_etime'];
    $s_nop=$_POST['s_nop'];
    // $s_session=$_POST['session'];
	$duplicate=mysqli_query($con, "SELECT * from tbl_schedule WHERE start_time='$s_stime' AND end_time='$s_etime'");
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
			$doc_id=$val_fetch['doc_id'];
			// foreach($s_date as $sday)
			// {
			$ins="INSERT INTO tbl_schedule (doc_id, s_day, start_time, end_time, nop) VALUES ('$doc_id', '$s_date', '$s_stime', '$s_etime', '$s_nop')";
			if($con->query($ins)=== TRUE)
			{
				// echo "<script> alert('Record Added Successfully'); </script>";
				header('location:schedule.php');
			}
			}
			
		}
	// }
}

if(isset($_POST['suspend']))
{
	$s_id=$_POST['suspend'];
	$query="UPDATE tbl_schedule SET status='2' where schedule_id='$s_id'";
	$query_run=mysqli_query($con, $query);
	if($query_run)
	{
		echo ("<script> alert('Cancelled'); 
		window.location.href='schedule.php';
		</script>");
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
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
									<img src="../patient/images/no_image.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="../patient/images/no_image.jpg" alt="image profile" class="avatar-img rounded"></div>
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
									<?php $docid=$row["doc_id"];
									$_SESSION['docid']=$docid;?>
									<?php }
										}?>
								</span>
								<span class="text-center">Doctor</span>
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
						<li class="nav-item active">
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
					<button type="submit" class="btn btn-primary" id="session" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
									<!-- <label>Select Days : </label><br>
									<div class="checkboxes">
									
										<input type="checkbox" name="day[]" value="Monday" class="ml-3">Monday
										<input type="checkbox" name="day[]" value="Tuesday" class="ml-4">Tuesday
										<input type="checkbox" name="day[]" value="Wednesday" class="ml-4">Wednesday
										<input type="checkbox" name="day[]" value="Thurday" class="ml-4">Thursday
										<div class="row mt-3">
											<input type="checkbox" name="day[]" value="Friday" class="ml-5">Friday
											<input type="checkbox" name="day[]" value="Saturday" class="ml-4">Saturday
											<input type="checkbox" name="day[]" value="Sunday" class="ml-4">Sunday
										</div>
									</div> -->
								</div>
                                <div class="form-group">
									<input type="time" name="s_stime" id="s_stime" class="form-control" placeholder="Enter Start Time">
								</div>
                                <div class="form-group">
									<input type="time" name="s_etime" id="s_etime" class="form-control" placeholder="Enter End Time">
								</div>
								<div class="form-group">
									<input type="text" name="s_nop" id="s_nop" class="form-control" placeholder="Enter Number of Patients">
								</div>
                                <!-- <div class="form-group">
									<input type="text" name="session" class="form-control" placeholder="Enter Session">
                                    <label>Select session : </label>
                                    <select name="session">
                                        <option value="Morning">Morning</option>
                                        <option value="Afternoon">Afternoon</option>
                                        <option value="Evening">Evening</option>
                                    </select>       
								</div> -->
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									<button type="submit" name="add_schedule" id="sch" class="btn btn-primary">Add</button>
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
			<th> Date</th>
            <th> Start Time </th>
            <th> End Time</th>
            <th> Number of Patient</th>
            <th> Edit</th>
			<th> Cancel</th>
          </tr>
        </thead>
        <tbody>
        <tr>
		  	<?php
			$d_id=$_SESSION['id'];
			$sql="SELECT * from tbl_doctor where login_id='$d_id'";
			$sql_run=mysqli_query($con, $sql);
			if($sql_run)
			{
				$val_fetch=mysqli_fetch_assoc($sql_run);
				$doc_id=$val_fetch['doc_id'];
				}
				$sql="SELECT * from tbl_schedule where doc_id='$doc_id' AND status='0'";
				$result=$con->query($sql);
      			$count=1;
      			if ($result->num_rows>0){
        			while ($row=$result-> fetch_assoc()) {	
			?>
				<td> <?=$count?></td>
				<td> <?=$row["s_day"]?></td>
				<td> <?=$row["start_time"]?></td>
				<td> <?=$row["end_time"]?></td>
				<td> <?=$row["nop"]?></td>
            	<td>
					<form action="edit_session.php" method="POST">
						<!-- <input type="hidden" name="edit_id" value="">
						<button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button> -->
						<button class="btn btn-primary" name="edit_btn" id="edit_btn" value="<?=$row['schedule_id']?>" style="height:40px">Edit</button>
					</form>
				</td>
				<td> 	
					<form action="" method="POST">
						<button name="suspend" class="btn btn-warning" value="<?=$row['schedule_id']?>">Cancel</button>
					</form>
				</td>
            	<!-- <td>
					<form action="del_session.php" method="POST">
					<input type="hidden" name="delete_id" value="">
					<button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button> 
					<button class="btn btn-danger"  name="d_btn" value="<?=$row['schedule_id']?>" style="height:40px">Delete</button>
					</form>
				</td> -->
        </tr>
		  <?php
				$count=$count+1;
			}
			}
			else{echo "No Schedule Added Yet";}
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
<!-- <script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script> -->

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