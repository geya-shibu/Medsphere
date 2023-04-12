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
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/images/logo1.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <!--******************* Preloader start********************-->
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

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
                <a href="index.html">
                    <p class="cls-logo">MedSphere</p>
                    <!-- <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span> -->
                    <!-- <span class="brand-title">  -->
                    </span>
                </a>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    
                </div>
                <div class="header-right">
                    <ul class="clearfix">
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
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
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
            <div class="nk-nav-scroll" style="margin-top:18px;">
                <ul class="metismenu" id="menu">
                    <!-- <li class="nav-label">Dashboard</li> -->
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
                        <i class="bi bi-person-bounding-box"></i><span class="nav-text">Doctors</span>
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
                        <a href="view_appointment.php" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">View Appointment</span>
                        </a>
                    </li>

                    <li>
                        <a href="medication.php" aria-expanded="false">
                        <i class="bi bi-capsule-pill"></i></i><span class="nav-text">Medications</span>
                        </a>
                    </li>
                    <li>
                        <a href="reports.php" aria-expanded="false">
                        <i class="bi bi-card-checklist"></i></i><span class="nav-text">Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="profile.php" aria-expanded="false">
                        <i class="bi bi-file-earmark-person-fill"></i><span class="nav-text">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="payment_report.php" aria-expanded="false">
                        <i class="bi bi-credit-card-2-front-fill"></i></i><span class="nav-text">Payment</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="javascript:void()" aria-expanded="false">
                        <i class="bi bi-gear-wide-connected"></i><span class="nav-text">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void()" aria-expanded="false">
                        <i class="bi bi-info-circle-fill"></i></i><span class="nav-text">Help</span>
                        </a>
                    </li> -->
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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Doctors</a></li>
                    </ol>
                </div>
            </div> -->
            <div class="row">
                <img src="../assets/images/doctors.png" width = 1300 height = 450 alt="abc">
            </div>

            <div class="row mt-3">
                <div class="col-6">
                    <div class="container">
                        <div class="row">
                            <div class="col ml-5">
                            <h1>Meet Our Doctors</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <!-- <div class="input-group">
                        <input type="text" id="searchBox" name="search" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" id="searchButton" type="button">
                            <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div> -->
                    <ul id="searchResults"style="background-color:white; "></ul>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                <?php
                $sql="SELECT * from tbl_doctor";
                $result=$con->query($sql);
				if ($result-> num_rows > 0){
					while ($row=$result-> fetch_assoc()) {
                ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="images/no_image.jpg" class="card-img-top" width = 25 height = 220>
                                <h2 class="card-title mt-3">Dr.<?=$row["doc_name"]?></h2>
                                <p class="card-text">
                                    <?php
                                        $dpt_id=$row["dept_id"];
                                        $sql1="SELECT * from tbl_dept where dept_id='$dpt_id'";
                                        $result1=$con->query($sql1);
                                        if ($result1-> num_rows > 0){
                                            while ($row1=$result1-> fetch_assoc()) {
                                                echo "Department of ", $row1["dept_name"];
                                            }}
                                    ?>
                                </p>
                                <form action="offline_consultation.php" method="POST">
                                    <button type="submit" class="btn btn-primary" value="<?=$row['doc_id']?>">Book an Appointment</button>
                                </form> 
                            </div>
                        </div>
                        
                    </div>
                    <?php }}?>
                </div>
                <!-- End Row -->
                
            </div>
            <!-- #/ container -->
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

</body>

</html>