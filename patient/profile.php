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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>MedSphere</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="../assets/images/logo1.png" />
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--********************************** Main wrapper start ***********************************-->
    <div id="main-wrapper">

        <!--********************************** Nav header start ***********************************-->
        <div class="nav-header">
                <a href="index.html">
                    <p class="cls-logo">MedSphere</p>
                    <!-- <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span> -->
                    <!-- <span class="brand-title">  -->
                    </span>
                </a>
        </div>
        <!--********************************** Nav header end ***********************************-->

        <!--********************************** Header start ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <!-- <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down d-md-none">
							<form action="#">
								<input type="text" class="form-control" placeholder="Search">
							</form>
                        </div>
                    </div> -->
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <!-- <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="badge gradient-1 badge-pill badge-primary">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">3 New Messages</span>  
                                    
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Saiful Islam</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Adam Smith</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Can you do me a favour?</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Barak Obama</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/4.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Hilari Clinton</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hello</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li> -->
                        <!-- <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2 badge-primary">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>  
                                    
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events near you</h6>
                                                    <span class="notification-text">Within next 5 days</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Started</h6>
                                                    <span class="notification-text">One hour ago</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Ended Successfully</h6>
                                                    <span class="notification-text">One hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events to Join</h6>
                                                    <span class="notification-text">After two days</span> 
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li> -->
                        <!-- <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                <span>English</span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="javascript:void()">English</a></li>
                                        <li><a href="javascript:void()">Dutch</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li> -->
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <?php
									$p_id=$_SESSION['id'];
									$sql="SELECT * from tbl_patient where login_id='$p_id'";
									$result=$con->query($sql);
									if ($result-> num_rows > 0){
									while ($row=$result-> fetch_assoc()) {
                                        $image=$row['image'];?>
                                    <img src="../images/<?php echo $image; ?>" width = 140 height = 150 title="<?php echo $image; ?>">
									<?php }
									}?>
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="profile.php"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <!-- <li>
                                            <a href="email-inbox.html"><i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill badge-primary">3</div></a>
                                        </li> -->
                                        
                                        <hr class="my-2">
                                        <!-- <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                        </li> -->
                                        <li><a href="../logout.php"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="homepage.php" aria-expanded="false">
                        <i class="bi bi-ui-checks-grid"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="patient_department.php" aria-expanded="false">
                        <i class="bi bi-building"></i><span class="nav-text">Department</span>
                        </a>
                    </li>

                    <li>
                        <a href="view_doctor.php" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Doctor</span>
                        </a>
                    </li>

                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="bi bi-journal-bookmark-fill"></i></i><span class="nav-text">Appointment</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="offline_consultation.php">Offline Consultation</a></li>
                            <!-- <li><a href="./layout-one-column.html">Online Consultation</a></li> -->
                            <!-- <li><a href="./layout-two-column.html">Two column</a></li>
                            <li><a href="./layout-compact-nav.html">Compact Nav</a></li>
                            <li><a href="./layout-vertical.html">Vertical</a></li>
                            <li><a href="./layout-horizontal.html">Horizontal</a></li>
                            <li><a href="./layout-boxed.html">Boxed</a></li>
                            <li><a href="./layout-wide.html">Wide</a></li> -->
                            <!-- <li><a href="./layout-fixed-header.html">Fixed Header</a></li>
                            <li><a href="layout-fixed-sidebar.html">Fixed Sidebar</a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Schedule</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void()" aria-expanded="false">
                        <i class="bi bi-capsule-pill"></i></i><span class="nav-text">Medications</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void()" aria-expanded="false">
                        <i class="bi bi-card-checklist"></i></i><span class="nav-text">Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="profile.php" aria-expanded="false">
                        <i class="bi bi-file-earmark-person-fill"></i><span class="nav-text">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void()" aria-expanded="false">
                        <i class="bi bi-credit-card-2-front-fill"></i></i><span class="nav-text">Payment</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="javascript:void()" aria-expanded="false">
                        <i class="bi bi-gear-wide-connected"></i><span class="nav-text">Settings</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="javascript:void()" aria-expanded="false">
                        <i class="bi bi-info-circle-fill"></i></i><span class="nav-text">Help</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <!-- <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div> -->
            <!-- row -->

        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card mb-xl-1">
                        <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
                            <div class="upload mt-5 mb-5">
                            <?php
                                $p_id=$_SESSION['id'];
                                $sql="SELECT * from tbl_patient where login_id='$p_id'";
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

                <div class="col-xl-9">
                    <div class="col-xl-12">
                        <div class="card mb-3 mb-xl-">
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
                                            <form action="php/update_profile.php" method="POST" id="myForm" class="needs-validation" novalidate>
                                                <div class="container">
                                                <?php
                                                    $p_id=$_SESSION['id'];
                                                    $sql="SELECT * from tbl_patient where login_id='$p_id'";
                                                    $result=$con->query($sql);
                                                    if ($result-> num_rows > 0){
                                                    while ($row=$result-> fetch_assoc()) {?>
                                                    <div class="form-group row">
                                                        <label for="id" class="col-sm-3 col-form-label">Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="name_id" name="name" placeholder="Update your Name" value="<?php echo $row['name']; ?>"/>
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
                                                        <label for="id" class="col-sm-3 col-form-label">Address Line 1</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="name_id" name="address1" placeholder="Update your Address" value="<?php echo $row['address_line_1'];?>"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="id" class="col-sm-3 col-form-label">Address Line 2</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="name_id" name="address2" placeholder="Update your Address" value="<?php echo $row['address_line_2'];?>"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="id" class="col-sm-3 col-form-label">Address Line 3</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="name_id" name="address3" placeholder="Update your Address" value="<?php echo $row['address_line_3'];?>"/>
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
                                                        <label for="id" class="col-sm-3 col-form-label">Occupation</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="name_id" name="occp" placeholder="Update your Occupation" value="<?php echo $row['occupation'];?>"/>
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
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profie-head text-center">
                            <h2>Personal Profile</h2>
                        </div>
                        <table class="table table-borderless ml-4">
                            <?php
                                $p_id=$_SESSION['id'];
                                $sql="SELECT * from tbl_patient where login_id='$p_id'";
                                $result=$con->query($sql);
                                if ($result-> num_rows > 0){
                                while ($row=$result-> fetch_assoc()) {?>
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo $row['name'];?></td>
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
                                    <td><?php echo $row['address_line_1'];?></td>
                                <tr>
                                    <td></td>
                                    <td><?php echo $row['address_line_2'];?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><?php echo $row['address_line_3'];?></td>
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
                                    <td>Occupation</td>
                                    <td><?php echo $row['occupation'];?></td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">MedSphere</a> 2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <script src="./plugins/validation/jquery.validate.min.js"></script>
    <script src="./plugins/validation/jquery.validate-init.js"></script>

</body>

</html>