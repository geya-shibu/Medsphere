<?php
include('connection.php');
session_start();
if(isset($_POST['add_dept']))
{
	$dept_name=$_POST['dept_name'];
	$dept_detail=$_POST['dept_detail'];
	$dept_more_detail=$_POST['dept_more_detail'];
	$imageName = $_FILES['image']['name'];
	$imageSize = $_FILES["image"]["size"];
	$tmpName = $_FILES["image"]["tmp_name"];
	$duplicate=mysqli_query($con, "SELECT * from tbl_dept WHERE dept_name='$dept_name'");
	if(mysqli_num_rows($duplicate)>0)
	{
		echo "<script> alert('Already Added Department');
						windows.location.href='department.php';
		</script>";
		exit(0);
	}
	else
	{
		$ins="INSERT INTO tbl_dept (dept_name, dept_detail, dept_more_detail, image1) VALUES ('$dept_name','$dept_detail', '$dept_more_detail', '$imageName')";	
		if($con->query($ins)=== TRUE && move_uploaded_file($tmpName, 'images/' . $imageName))
			{
				echo "<script> alert('Department Added Successfully'); 
				windows.location.href='department.php';</script>";
			}
	}
}

// if(isset($_POST['d_btn']))
// {
// 	$d_id=$_POST['dept_id'];
// 	$query="UPDATE tbl_dept SET status='1' where dept_id='$d_id'";
// 	$query_run=mysqli_query($con, $query);
// 	if($query_run)
// 	{
// 		echo "Delete";
// 		header('location:department.php');
// 	}
// }
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
	<link rel="shortcut icon" href="assets/images//icons/icon-48x48.png" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/css_admin/admin.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/css_admin/sb-admin-2.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="assets/js/validate.js"></script>
	<title>Admin</title>
	<link href="assets/css/app.css" rel="stylesheet">
	<script>
		function validateNameErr()
		{ 
		var letters = /^[A-Z,a-z ]*$/;
		var fnamevalue =document.getElementById('name_d');

		if(fnamevalue.value.match(letters) && fnamevalue.value.length>=3 ) 
		{
			text="";
			document.getElementById('name_err').innerHTML = text;
			document.getElementById('signup_btn').disabled = true;
			return false;
		}
		else
		{
			text="Name should contain only alphabets and atleast 3 characters";
			document.getElementById('name_err').innerHTML = text;
			document.getElementById('signup_btn').disabled = true;
			return true;
		}
		}
		</script>
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="adminpage.php">
          			<span class="align-middle">Admin</span>
        		</a>

				<ul class="sidebar-nav">
					<li class="sidebar-item ">
						<a class="sidebar-link" href="adminpage.php">
							<i class="bi bi-sliders2-vertical"></i>
              				<span class="align-left">Dashboard</span>
            			</a>
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="department.php">
							<i class="bi bi-building"></i>
              				<span class="align-middle">Departments</span>
            			</a>
					</li>

					<li class="sidebar-item">
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

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-invoice.html">
						<i class="bi bi-file-earmark-bar-graph"></i></i> 
						<span class="align-middle">Reports</span>
            			</a>
					</li>


					<li class="sidebar-item">
						<a class="sidebar-link" href="icons-feather.html">
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
							<!-- <button class="btn" type="button">
								<i class="align-middle" data-feather="search"></i>
							</button> -->
						</div>
					</form>

					<div class="navbar-collapse collapse">
						<ul class="navbar-nav navbar-align">
							<li class="nav-item dropdown">
								<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
									<div class="list-group">
										<a href="#" class="list-group-item">
											<div class="row g-0 align-items-center">
												<div class="col-2">
													<i class="text-danger" data-feather="alert-circle"></i>
												</div>
												<div class="col-10">
													<div class="text-dark">Update completed</div>
													<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
													<div class="text-muted small mt-1">30m ago</div>
												</div>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="row g-0 align-items-center">
												<div class="col-2">
													<i class="text-warning" data-feather="bell"></i>
												</div>
												<div class="col-10">
													<div class="text-dark">Lorem ipsum</div>
													<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
													<div class="text-muted small mt-1">2h ago</div>
												</div>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="row g-0 align-items-center">
												<div class="col-2">
													<i class="text-primary" data-feather="home"></i>
												</div>
												<div class="col-10">
													<div class="text-dark">Login from 192.186.1.8</div>
													<div class="text-muted small mt-1">5h ago</div>
												</div>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="row g-0 align-items-center">
												<div class="col-2">
													<i class="text-success" data-feather="user-plus"></i>
												</div>
												<div class="col-10">
													<div class="text-dark">New connection</div>
													<div class="text-muted small mt-1">Christina accepted your request.</div>
													<div class="text-muted small mt-1">14h ago</div>
												</div>
											</div>
										</a>
									</div>
									<div class="dropdown-menu-footer">
										<a href="#" class="text-muted">Show all notifications</a>
									</div>
								</div>
							</li>

							<li class="nav-item dropdown">
								<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
									<div class="position-relative">
										<i class="align-middle" data-feather="message-square"></i>
									</div>
								</a>
								<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
									<div class="dropdown-menu-header">
										<div class="position-relative">
											4 New Messages
										</div>
									</div>
									<div class="list-group">
										<a href="#" class="list-group-item">
											<div class="row g-0 align-items-center">
												<div class="col-2">
													<img src="assets/images/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
												</div>
												<div class="col-10 pl-2">
													<div class="text-dark">Vanessa Tucker</div>
													<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
													<div class="text-muted small mt-1">15m ago</div>
												</div>
											</div>
										</a>

										<a href="#" class="list-group-item">
											<div class="row g-0 align-items-center">
												<div class="col-2">
													<img src="assets/images/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
												</div>
												<div class="col-10 pl-2">
													<div class="text-dark">Sharon Lessman</div>
													<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
													<div class="text-muted small mt-1">5h ago</div>
												</div>
											</div>
										</a>
									</div>
									<div class="dropdown-menu-footer">
										<a href="#" class="text-muted">Show all messages</a>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
									<i class="align-middle" data-feather="settings"></i>
								</a>
								<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
									<img src="assets/images/avatars/avatar.jpg" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span class="text-dark">Admin</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
									<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="pages-settings.html"><i class="align-middle mr-1" data-feather="settings"></i> Settings & Privacy</a>
									<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="help-circle"></i> Help Center</a>
									<div class="dropdown-divider"></div>
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
							<h3><strong>DEPARTMENTS</strong></h3>
						</div>

						<div class="col-auto ml-auto text-right mt-n1">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
									<!-- <li class="breadcrumb-item"><a href="#">AdminKit</a></li> -->
									<li class="breadcrumb-item"><a href="#">Dashboards</a></li>
									<li class="breadcrumb-item active" aria-current="page">Departments</li>
								</ol>
							</nav>
						</div>
					</div>	
				</div>
				<!-- Button trigger modal -->
				<div class="container">
					<button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
						Add Department
					</button>

					<!-- Modal -->
					<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="staticBackdropLabel">Add Department</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form action="" method="POST" enctype="multipart/form-data">	
										<div class="form-group">
											<input type="text" id="name" name="dept_name" class="form-control" placeholder="Department Name" required>
										</div>
										<h6 class="error-message" id="name_err" style="color:red;"></h6>
										<div class="form-group">
											<textarea id="name_d" name="dept_detail" class="form-control" placeholder="Department Details" rows="4" cols="76"></textarea>
										<!-- <input type="text" rows="4" cols="4" id="name_d" name="dept_detail" class="form-control" onkeyup="validateNameErr()" placeholder="Enter Department Details" required> -->
										</div>
										<div class="form-group">
											<textarea id="name_md" name="dept_more_detail" class="form-control" placeholder="More Details" rows="7" cols="76"></textarea>
										</div>

										<div class="form-group">
											<input type="file" id="image" name="image" class="form-control" required>
										</div>
										<h6 class="error-message" id="name_err"></h6>
						
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<button type="submit" name="add_dept" class="btn btn-primary">Add</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>


					<!-- Table start -->
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
								<tr>
									<th> Sl No</th>
									<th> Department Name</th>
									<th> Department Detail</th>
									<th> EDIT </th>
									<th> DELETE </th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<?php
										$sql="SELECT * from tbl_dept where status!='1'";
										$result=$con-> query($sql);
										$count=1;
										if ($result-> num_rows > 0){
											while ($row=$result-> fetch_assoc()) {
									?>
									<td> <?=$count?></td>
									<td> <?=$row["dept_name"]?></td>
									<td> <?=$row["dept_detail"]?></td>
								
									<td>
										<form action="edit_dept.php" method="POST">
											<!-- <input type="hidden" name="edit_id" value="">
											<button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button> -->
											<button class="btn btn-primary" name="edit_btn" value="<?=$row['dept_id']?>" style="height:40px">Edit</button>
										</form>
										
									</td>
									<td>
										<form action="del_dept.php" method="POST">
										<!-- <input type="hidden" name="delete_id" value="">
										<button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button> -->
										<button class="btn btn-danger"  name="d_btn" value="<?=$row['dept_id']?>" style="height:40px">Delete</button>
										</form>
									</td>
								</tr>
								<?php $count=$count+1; }}?> 
								</tbody>
							</table>
						</div>
  					</div>
				</div>
			</main>
		</div>
	</div>

	<script src="js/app.js"></script>
	<script src="assets/js/sb-admin-2.js"></script>
	<script src="assets/js/app.js"></script>

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