<?php
	include('../connection.php');
	session_start();

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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
								<?php
									$doc_id=$_SESSION['docid'];
									$sql="SELECT * from tbl_doctor where doc_id='$doc_id'";
									$result=$con->query($sql);
									if ($result-> num_rows > 0){
									while ($row=$result-> fetch_assoc()) {
                                        $image=$row['image'];?>
                                    <img class="avatar-img rounded-circle" src="../images/<?php echo $image; ?>" width = 140 height = 150 title="<?php echo $image;  ?>">
									<?php }
									}?>
									<!-- <img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle"> -->
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
							<?php
									$doc_id=$_SESSION['docid'];
									$sql="SELECT * from tbl_doctor where doc_id='$doc_id'";
									$result=$con->query($sql);
									if ($result-> num_rows > 0){
									while ($row=$result-> fetch_assoc()) {
                                        $image=$row['image'];?>
                                    <img class="avatar-img rounded-circle" src="../images/<?php echo $image; ?>" width = 140 height = 150 title="<?php echo $image;  ?>">
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
										<?php }
											}?>
									</span>
										<span class="" style="margin-left:65px;">Doctor</span>
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
				<div class="container-xl px-4 mt-4">
					<div class="row">
						<div class="col-xl-3">
							<div class="card mb-xl-1">
								<form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
									<div class="upload mt-5 mb-5">
										<?php
											$doc_id=$_SESSION['docid'];
											$sql="SELECT * from tbl_doctor where doc_id='$doc_id'";
											$result=$con->query($sql);
											if ($result-> num_rows > 0){
											while ($row=$result-> fetch_assoc()) {
												$image=$row['image'];?>
												<img src="../images/<?php echo $image; ?>" width = 170 height = 180 title="<?php echo $image; ?>">
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
								<div class="card mt-3">
									<table class="table table-borderless ml-4 mt-3">
										<?php
											$doc_id=$_SESSION['docid'];
											$sql="SELECT * from tbl_doctor where doc_id='$doc_id'";
											$result=$con->query($sql);
											if ($result-> num_rows > 0){
											while ($row=$result-> fetch_assoc()) {
												$dob = $row['dob'];
												$height = $row['height'];
												$weight = $row['weight'];
												$today = date('Y-m-d');
												$diff = date_diff(date_create($dob), date_create($today));
												$age = $diff->format('%y');
												$bmi_r = $weight / (($height/100) * ($height/100));
												$bmi=round($bmi_r, 2);
												?>
										<tbody>
											<tr class="mt-5">
												<td>Age</td>
												<td><?php echo $age?></td>
											</tr>
											<tr>
												<td>Height</td>
												<td><?php echo $row['height']; ?>cm</td>
											</tr>
											<tr>
												<td>Weight</td>
												<td><?php echo $row['weight'];?>kg</td>
											</tr>
											
											
										</tbody>
										<?php }}?>
									</table>
								</div>
						</div>

						<style>
						.nav-tabs {
							border-bottom: 1px solid #ddd;
						}
						.nav-tabs li {
							margin-bottom: -1px;
						}
						.nav-tabs li a {
							color: red;
							font-size:20px;
							font-weight: bold;
							border-radius: 0;
						}
						.nav-tabs li.active a {
							color: #333;
							border: 5px solid #ddd;
							border-top: none;
						}
						.tab-content {
							border: 1px solid #ddd;
							padding: 10px;
						}
						</style>

						<div class="col-xl-9">
							<div class="col-xl-12">
								<div class="card mb-3 mb-xl-">
									<div class="container mt-5">
										<ul class="nav nav-tabs">
											<li class="active"><a data-toggle="tab" href="#personal">Personal Profile</a></li>
											<li><a data-toggle="tab" href="#professional">Professional Profile</a></li>
										</ul>
										
										<div class="tab-content">
											<div id="personal" class="tab-pane active">
												<div class="edit-button mt-4 mr-4">
													<!-- Button to Open the Modal -->
													<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">
														Edit Profile
													</button>

														<!-- The Modal -->
													<div class="modal" id="myModal">
														<div class="modal-dialog modal-lg">
															<div class="modal-content">
																<!-- Modal Header -->
																<div class="modal-header">
																	<h4 class="modal-title w-100 text-center">Edit Details</h4>
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																</div>

																<!-- Modal body -->
																<div class="modal-body col-12">
																	<form action="php/updatedoc_profile.php" method="POST" id="myForm" class="needs-validation" novalidate>
																		<div class="container">
																		<?php
																			$doc_id=$_SESSION['docid'];
																			$sql="SELECT * from tbl_doctor where doc_id='$doc_id'";
																			$result=$con->query($sql);
																			if ($result-> num_rows > 0){
																			while ($row=$result-> fetch_assoc()) {?>
																			<div class="form-group row">
																				<label for="id" class="col-sm-3 col-form-label">Name</label>
																				<div class="col-sm-9">
																					<input type="text" class="form-control" id="name_id" name="name" placeholder="Update your Name" value="<?php echo $row['doc_name']; ?>"/>
																						<!-- <div class="invalid-feedback">
																							Please choose a Name.
																						</div> -->
																				</div>
																			</div>

																			<div class="form-group row">
																				<label for="validationCustomUsername"  class="col-sm-3 col-form-label">Email</label>
																				<div class="input-group col-sm-9">
																					<input type="text" class="form-control" id="username_id" name="email" value="<?php echo $_SESSION['email']; ?>" disabled>
																				</div>
																			</div>

																			<div class="form-group row">
																				<label for="id" class="col-sm-3 col-form-label">Phone Number</label>
																				<div class="col-sm-9">
																					<input type="text" class="form-control" id="password_id" name="phone" placeholder="Update your Phone number" value="<?php echo $row['phone'];?>"/>       
																				</div>
																			</div>

																			<div class="form-group row">
																				<label for="id" class="col-sm-3 col-form-label">Date of Birth</label>
																				<div class="col-sm-9">
																					<input type="date" class="form-control" id="name_id" name="dob" placeholder="Update your Date of Birth" value="<?php echo $row['dob'];?>"/>
																				</div>
																			</div>

																			<div class="form-group row">
																				<label for="id" class="col-sm-3 col-form-label">Gender</label>
																				<div class="col-sm-9">
																					<select name="gender" class="form-control">
																						<option value=""><?php echo $row['gender'];?></option>
																						<option value="Male">Male</option>
																						<option value="Female">Female</option>
																						<option value="Other">Other</option>
																					</select>
																				</div>    
																			</div>

																			<div class="form-group row">
																				<label for="id" class="col-sm-3 col-form-label">Blood Group</label>
																				<div class="col-sm-9">
																					<select name="blood" class="form-control">
																						<option value=""><?php echo $row['blood_group'];?></option>
																						<option value="A+">A+</option>
																						<option value="O+">O+</option>
																						<option value="B+">B+</option>
																						<option value="O-">O-</option>
																						<option value="AB+">AB+</option>
																					</select>
																				</div>    
																			</div>

																			<div class="form-group row">
																				<label for="id" class="col-sm-3 col-form-label">Height(in cm)</label>
																				<div class="col-md-4">
																					<input type="text" class="form-control" id="height" name="height" placeholder="Height" value="<?php echo $row['height'];?>">
																				</div>
																				<label for="id" class="col-sm-2 col-form-label">Weight(in kg)</label>
																				<div class="col-md-3">
																					<input type="text" class="form-control" id="weight" name="weight" placeholder="Weight" value="<?php echo $row['weight'];?>">
																				</div>
																			</div>

																			<div class="form-group row">
																				<label for="id" class="col-sm-3 col-form-label">Address Line 1</label>
																				<div class="col-sm-9">
																					<input type="text" class="form-control" id="name_id" name="address1" placeholder="Update your Address" value="<?php echo $row['address_1'];?>"/>
																				</div>
																			</div>

																			<div class="form-group row">
																				<label for="id" class="col-sm-3 col-form-label">Address Line 2</label>
																				<div class="col-sm-9">
																					<input type="text" class="form-control" id="name_id" name="address2" placeholder="Update your Address" value="<?php echo $row['address_2'];?>"/>
																				</div>
																			</div>

																			<div class="form-group row">
																				<label for="id" class="col-sm-3 col-form-label">Address Line 3</label>
																				<div class="col-sm-9">
																					<input type="text" class="form-control" id="name_id" name="address3" placeholder="Update your Address" value="<?php echo $row['address_3'];?>"/>
																				</div>
																			</div>

																			<div class="form-group row">
																				<label for="id" class="col-sm-3 col-form-label">Nationality</label>
																				<div class="col-sm-9">
																					<input type="text" class="form-control" id="name_id" name="nation" placeholder="Update your Nationality" value="<?php echo $row['nationality'];?>"/>
																				</div>
																			</div>

																			<div class="form-group row">
																				<label for="id" class="col-sm-3 col-form-label">State</label>
																				<div class="col-sm-9">
																					<input type="text" class="form-control" id="name_id" name="state" placeholder="Update your State" value="<?php echo $row['state'];?>"/>
																				</div>
																			</div>

																			<div class="form-group row">
																				<label for="id" class="col-sm-3 col-form-label">District</label>
																				<div class="col-sm-9">
																					<input type="text" class="form-control" id="name_id" name="district" placeholder="Update your District" value="<?php echo $row['district'];?>"/>
																				</div>
																			</div>

																			<div class="form-group row">
																				<label for="id" class="col-sm-3 col-form-label">Religion</label>
																				<div class="col-sm-9">
																					<input type="text" class="form-control" id="name_id" name="religion" placeholder="Update your Religion" value="<?php echo $row['religion'];?>"/>
																				</div>
																			</div>

																			<div class="form-group row">
																				<label for="id" class="col-sm-3 col-form-label">Caste</label>
																				<div class="col-sm-9">
																					<input type="text" class="form-control" id="name_id" name="caste" placeholder="Update your Caste" value="<?php echo $row['caste'];?>"/>
																				</div>
																			</div>

																			<div class="form-group row">
																				<label for="id" class="col-sm-3 col-form-label">Marital Status</label>
																				<div class="col-sm-9">
																					<input type="text" class="form-control" id="name_id" name="maritalstatus" placeholder="Update your Marital Status" value="<?php echo $row['marital_status'];?>"/>
																				</div>
																			</div>
																			<div class="text-center">
																			<button class="btn btn-success" type="submit" name="update_profile">Update</button>
																			</div>
																			<?php }}?>
																		</div>
																	</form>
																	
																	<script>
																	
																	</script>
																</div>

																<!-- Modal footer -->
																<div class="modal-footer">
																	<!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
																</div>

															</div>
														</div>
													</div>
												</div>
												
												<div class="profie-head text-center">
													<h2>Personal Profile</h2>
												</div>

												<table class="table table-borderless">
													<?php
														$doc_id=$_SESSION['docid'];
														$sql="SELECT * from tbl_doctor where doc_id='$doc_id'";
														$result=$con->query($sql);
														if ($result-> num_rows > 0){
														while ($row=$result-> fetch_assoc()) {?>
													<tbody>
														<tr>
															<td>Name</td>
															<td><?php echo $row['doc_name'];?></td>
														</tr>
														<tr>
															<td>Email</td>
															<td><?php echo $_SESSION['email']; ?></td>
														</tr>
														<tr>
															<td>Phone Number</td>
															<td><?php echo $row['phone'];?></td>
														</tr>
														<tr>
															<td>Date of Birth</td>
															<td><?php echo $row['dob'];?></td>
														</tr>
														<tr>
															<td>Gender</td>
															<td><?php echo $row['gender'];?></td>
														</tr>
														<tr>
															<td>Blood Group</td>
															<td><?php echo $row['blood_group'];?></td>
														</tr>
														<tr>
															<td>Address</td>
															<td><?php echo $row['address_1'];?></td>
														<tr>
															<td></td>
															<td><?php echo $row['address_2'];?></td>
														</tr>
														<tr>
															<td></td>
															<td><?php echo $row['address_3'];?></td>
														</tr>
														
														<tr>
															<td>Nationality</td>
															<td><?php echo $row['nationality'];?></td>
														</tr>

														<tr>
															<td>State</td>
															<td><?php echo $row['state'];?></td>
														</tr>
														<tr>
															<td>District</td>
															<td><?php echo $row['district'];?></td>
														</tr>
														
														<tr>
															<td>Religion</td>
															<td><?php echo $row['religion'];?></td>
														</tr>
														<tr>
															<td>Caste</td>
															<td><?php echo $row['caste'];?></td>
														</tr>
														<tr>
															<td>Marital Status</td>
															<td><?php echo $row['marital_status'];?></td>
														</tr>

													</tbody>
													<?php }}?>
												</table>
											</div>

											<div id="professional" class="tab-pane fade">
												<h3>Professional Profile</h3>
												<p>Here is some information about the doctor's professional profile.</p>
											</div>

										</div>	
									</div>
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