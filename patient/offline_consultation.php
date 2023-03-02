<?php
    include('../connection.php');
	session_start();
	if(!isset($_SESSION["email"])) 
	{
		header("Location:../login.php");
	}

    if(isset($_POST['submit']))
    {
    $specilization=$_POST['Doctorspecialization'];
    $doctorid=$_POST['doctor'];
    $fees=$_POST['fees'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $qid=$_SESSION['id'];
    $duplicate=mysqli_query($con, "SELECT * from tbl_appointment WHERE dept_id='$specilization'");
    
    if(mysqli_num_rows($duplicate)>0)
    {
    echo "<script> alert('Already Booked');
                    windows.location.href='department.php';
    </script>";
    }
    else{
    $query=mysqli_query($con,"insert into tbl_appointment(dept_id, doc_id, fees, day, time, p_id) values('$specilization','$doctorid','$fees', '$date', '$time', '$qid')");
        if($query)
        {
            echo "<script> alert('Booked');
                    window.location.href='payment.php';
            </script>";
            // header("location:payment.php");
        }
        exit();
    }}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Portal</title>
    <link rel="shortcut icon" href="../assets/images/logo1.png"/>
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
        .content-body
        {
            background-image:url('../assets/images/booking.png'); 
            background-size:cover; 
            position: relative;
        }
        .content-body::before {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff; /* Set the color you want for the overlay */
            opacity: 0.7; /* Set the opacity value */
        }
        h2
        {
            margin-left:150px;
        }
        .my-select
        {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="0" height="0"><symbol id="chevron-down" viewBox="0 0 10 6"><path d="M1.42.607a.997.997 0 0 1 1.414 0L5 3.086 7.146.936a.997.997 0 1 1 1.414 1.414l-2.5 2.5a.997.997 0 0 1-1.414 0L3.5 3.914 1.354 6.061a.997.997 0 1 1-1.414-1.414l2.5-2.5z" fill="%23808080" fill-rule="evenodd"/></symbol></svg>#chevron-down');
            background-repeat: no-repeat;
            background-position: right 0.5em top 50%;
            background-size: 1em auto;
        }
    </style>    
    <script>
        function getdoctor(val) {
            $.ajax({
            type: "POST",
            url: "get_doctor.php",
            data:'specilizationid='+val,
            success: function(data){
                $("#doctor").html(data);
            }
            });
        }
    </script>	
    <script>
        function getfee(val) {
            $.ajax({
            type: "POST",
            url: "get_doctor.php",
            data:'doctor='+val, 
            success: function(data){
                $("#fees").html(data);
            }
            });

            $.ajax({
            type: "POST",
            url: "get_day.php",
            data:'doctor='+val,
            success: function(data){
                $("#date").html(data);
            }
            });
        }
    </script>
    <script>
        function getdate(val) {
            $.ajax({
            type: "POST",
            url: "get_doctor.php",
            data:'date='+val,
            success: function(data){
                $("#time").html(data);
            }
            }); 
        }
    </script>	
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
    <!--*********************************** Preloader end ************************-->

    
    <!--********************************** Main wrapper start **********************-->
    <div id="main-wrapper">

    <!--****************************** Nav header start *****************************-->
        <div class="nav-header">
                <a href="index.html">
                    <p class="cls-logo">MedSphere</p>
                    <!-- <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span> -->
                    <!-- <span class="brand-title">  -->
                    </span>
                </a>
        </div>
    <!--******************************** Nav header end *******************************-->

    <!--******************************** Header start *********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <!-- <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div> -->


                <div class="header-right">
                    <ul class="clearfix">
                        <!-- <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="badge badge-pill gradient-1">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">3 New Messages</span>  
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-1">3</span>
                                    </a>
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
                                <span class="badge badge-pill gradient-2">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>  
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-2">5</span>
                                    </a>
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
                                <!-- <img src="images/user/1.png" height="40" width="40" alt=""> -->
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
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="profile.php"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <!-- <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
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
        <!--******************************** Header end ti-comment-alt ***********************-->

        <!--******************************** Sidebar start ***********************************-->
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
                            <li><a href="./layout-one-column.html">Online Consultation</a></li>
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
                        <a href="javascript:void()" aria-expanded="false">
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
        <!--********************************** Sidebar end ***********************************-->

        <!--********************************** Content body start ***********************************-->
        <div class="content-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mt-5">
                        <form action="" method="POST">
                            <h2>Book Appointment</h2>
                            <div class="form-group">
                                <select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
                                    <option value="">Select Specialization</option>
                                        <?php $ret=mysqli_query($con,"select * from tbl_dept");
                                        while($row=mysqli_fetch_array($ret))
                                        {
                                        ?>
                                        <option value="<?php echo htmlentities($row['dept_id']);?>">
                                            <?php echo htmlentities($row['dept_name']);?>
                                        </option>
                                        <?php 
                                    } ?>                               
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required="required">
                                    <option value="">Select Doctor</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <!-- <label for="consultancyfees">Consultancy Fees</label> -->
                                    <select name="fees" class="form-control my-select" id="fees" placeholder="Consultancy Fees" readonly style="background-color: white;">
                                    <option value="">Consultaion Fees</option>
                                </select>
                            </div>
                            <!-- Day  -->
                            <div class="form-group">
                            <select name="date" class="form-control" id="date" onChange="getdate(this.value);" required="required" style="height:50px;">
                                    <option value="">Select Day</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="time" class="form-control" id="time" required="required">
                                    <option value="">Select Time Slot</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" id="mybutton" class="btn btn-primary ml-5">Book Appointment</button>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="col-md-6">
                        <img src="../assets/images/booking.png" width = 1300 height = 450 alt="abc" class="img-fluid">
                    </div> -->
                </div>          
            </div>  
                </div>  
        <!--********************************** Content body end ***********************************-->
                        
        
        <!--********************************** Footer start ***********************************-->
        <!-- <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">MedSphere</a> 2018</p>
            </div>
        </div> -->
        <!--********************************** Footer end ***********************************-->
    </div>
    <!--********************************** Main wrapper end ***********************************-->

    <!--********************************** Scripts ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
    <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
    <script src="./plugins/circle-progress/circle-progress.min.js"></script>
    <script src="./plugins/d3v3/index.js"></script>
    <script src="./plugins/topojson/topojson.min.js"></script>
    <script src="./plugins/datamaps/datamaps.world.min.js"></script>
    <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/morris/morris.min.js"></script>
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <script src="./plugins/chartist/js/chartist.min.js"></script>
    <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <script src="./js/dashboard/dashboard-1.js"></script>

</body>

</html>