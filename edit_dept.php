<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link href="assets/css/app.css" rel="stylesheet">
	<style>
		.form-control
		{
			margin-top:10px;
			height:25px;
		}
	</style>
</head>
<body>
<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
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
						<a class="sidebar-link" href="pages-settings.html">
              				<i class="align-middle" data-feather="settings"></i> <span class="align-middle">Doctors</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-invoice.html">
              				<i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Medicine Reports</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-blank.html">
              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Payment</span>
            			</a>
					</li>
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
					<div class="card">
						<div class="card-header" style="font-size:20px;">
							Edit Department
						</div>
						<div class="card-body">
						<form action="update_dept.php" method="POST">
							<?php
								if(isset($_POST['edit_btn']))
								{
							
									$edit_btn=$_POST['edit_btn'];
									$query="SELECT * from tbl_dept WHERE dept_id='$edit_btn'";
									$query_run=mysqli_query($con, $query);
									foreach($query_run as $data){
									?>
								<div class="form-group">
									<input type="text" name="dept_name" value="<?=$data['dept_name'] ?>" class="form-control" placeholder="Enter Department Name">
								</div>
								<div class="form-group">
									<input type="text" name="dept_detail" style="height:50px" row="30" value="<?=$data['dept_detail']?>" class="form-control" placeholder="Enter Department Details">
								</div>
								<div class="modal-footer">
									<!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"></button> -->
									<button type="submit" name="edit_dept" value="<?=$data['dept_id'] ?>" class="btn btn-primary">Update</button>
								</div>

								
								<?php
									}}
								else{
									echo "No ID found";
								}
								?>
							</form>
						</div>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>
</body>
</html>

