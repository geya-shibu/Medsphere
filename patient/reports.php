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
    <title>Portal</title>
    <link rel="shortcut icon" href="../assets/images/logo1.png"/>
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-EkdRDouo36U6eQ2N4pdFMNqKvXomqN6LrbFW12pSihIM44hRVAP8gKtv5qrztV5x5e5QvK8mE6bng06y7kyLwQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/validate_report.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
</head>

<body>
    <!--***************************** Preloader start ***********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*****************************  Preloader end ************************-->

    <!--***************************** Main wrapper start **********************-->
    <div id="main-wrapper">

    <!--****************************** Nav header start ***********************-->
        <div class="nav-header">
            <a href="index.html">
                <p class="cls-logo">MedSphere</p>
            </a>
        </div>
    <!--****************************** Nav header end *******************************-->

    <!--****************************** Header start *********************************-->
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
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div> -->
                </div>
                <div class="header-right">
                    <!-- <ul class="clearfix">
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
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
                        </li>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
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
                        </li>
                        <li class="icons dropdown d-none d-md-flex">
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
                                        $image=$row['image'];
                                    echo '<img src="../images/'.$image.'" width = 140 height = 150 title="'. $image.'">';
								 }}?>
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
                        <a href="javascript:void()" aria-expanded="false">
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
                    </li>
                    <li>
                        <a href="javascript:void()" aria-expanded="false">
                        <i class="bi bi-info-circle-fill"></i></i><span class="nav-text">Help</span>
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
    <!--******************************** Sidebar end ***********************************-->

    <!--********************************** Content body start ***********************************-->
    
    <div class="content-body">
        <div class="container-fluid">   
            <div class="row">
                <div class="col-5">
                    <h2 class="text-center">Add Medical Data</h2>
                    <h4 class="text-center">Enter your data from the lab report</h4>
                    <form method="POST" action="process_report.php">
                        <div class="form-group">
                            <label for="glucose">Glucose (mg/dL):</label>
                            <input type="text" class="form-control" name="symtomp1" id="symtomp1" onkeyup="validateGlucose()" placeholder="Enter Glucose level (in mg/dL)" required>
                            <h6 class="error-message" style="color:red;" id="glu_err"></h6>
                        </div>
                        
                        <div class="form-group">
                            <label for="blood_pressure">Blood Pressure (mmHg):</label>
                            <input type="text" class="form-control" name="symtomp2" id="symtomp2" onkeyup="validatebp()" placeholder="Enter Blood Pressure (in mmHg)" required>
                            <h6 class="error-message" style="color:red;" id="bp_err"></h6>
                        </div>
                        
                        <div class="form-group">
                            <label for="haemoglobin">Insulin Level (IU/mL):</label>
                            <input type="text" class="form-control " name="symtomp3" id="symtomp3" onkeyup="validateInsulin()" placeholder="Enter Insulin level (in IU/mL)" required>
                            <h6 class="error-message" style="color:red;" id="ins_err"></h6>
                        </div>
                        
                            <?php
                                $p_id=$_SESSION['id'];
                                $sql="SELECT * from tbl_patient where login_id='$p_id'";
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
                        <div class="form-group">
                            <!-- <label for="haemoglobin">Insulin Level (g/dL):</label> -->
                            <input type="hidden" class="form-control" name="symtomp4" id="symtomp4" value="<?php echo $bmi;?>" required>
                        </div>
                        <div class="form-group">
                            <!-- <label for="haemoglobin">Insulin Level (g/dL):</label> -->
                            <input type="hidden" class="form-control" name="symtomp5" id="symtomp5" value="<?php echo $age;?>" required>
                        </div>
                            <?php
                                }}
                            ?>
                        <div class="form-group">
                            <!-- <label for="haemoglobin">Insulin Level (g/dL):</label> -->
                            <input type="hidden" class="form-control" name="pid" id="pid" value="<?php echo $_SESSION['p_id'];?>" required>
                        </div>

                        <div class="form-group">
                            <label for="cholestrol">Haemoglobin (g/dL):</label>
                            <input type="text" class="form-control" name="haemoglobin" id="haemoglobin" onkeyup="validatehb()" placeholder="Enter Haemoglobin (in g/dL)" required>
                            <h6 class="error-message" style="color:red;" id="hb_err"></h6>  
                        </div> 
                         
                        <div class="form-group">
                            <label for="cholestrol">Cholestrol Level (mg/dL):</label>
                            <input type="text" class="form-control" name="cholestrol" id="cholestrol" onkeyup="validateCholestrol()" placeholder="Enter Cholestrol level (in mg/dL)" required>
                            <h6 class="error-message" style="color:red;" id="chl_err"></h6>
                        </div>
                        
                        <div class="form-group">
                            <label for="heart_rate">Heart Rate (bpm):</label>
                            <input type="text" class="form-control" name="heart_rate" id="heart_rate" onkeyup="validateHeartRate()" placeholder="Enter Heart Rate (in bpm)" required>
                            <h6 class="error-message" style="color:red;" id="hr_err"></h6>        
                        </div>
                        
                        <!-- <div class="form-group">
                            <label for="oxygen">Blood oxygen levels :</label>
                            <input type="number" class="form-control" name="oxygen" id="oxygen" required>
                        </div> -->
                        
                        <button type="submit" class="btn btn-primary" name="predict" id="predict">Submit</button>
                    </form>
                    
                </div>
                <div class="col-6 pl-5">
                    <h2 class="text-center">Medical Data</h2>
                    <div class="row">
                        <div class="col-auto" style=" font-weight:bold; font-size:20px; margin-left:220px; margin-top:20px">
                        <button class="btn btn-success float-right" title="Based on last updated data" onclick="showAlert()">Diabetic Data</button>
                        <?php
                            $db="SELECT * FROM diabetic ORDER BY diabetic_id DESC LIMIT 1";
                            $result_db=$con->query($db);
                            if($result_db-> num_rows > 0){
                                while ($row_db=$result_db-> fetch_assoc()) {
                                    if($row_db['result']=="Diabetic")
                                    {
                                        echo "
                                        <script>
                                        function showAlert() {
                                            swal({
                                                title: 'Diabetic Prediction',
                                                text: 'High Chance of being Diabetic',
                                                icon: 'warning'
                                              });
                                        }
                                        </script>";
                                    }
                                    else
                                    {
                                        echo "<script>
                                                function showAlert() {
                                                    swal({
                                                        title: 'Diabetic Prediction',
                                                        text: 'Low Chance of being Diabetic', 
                                                        icon: 'success',
                                                      });
                                                }
                                            </script>";
                                    }
                                    
                        ?>
                        <?php
                     }}
                     ?>
                     <script>
		
	</script>
                        </div>
                        <div class="col-auto">
                            <img src="images/question.png" style="margin-top:26px" width="16px" alt="Icon" title="Predicted based on the data given">
                        </div>
                    </div>
                     <style>
                        .icon-cell, .label-cell {
                        display: inline-block;
                        vertical-align: middle;
                        }

                        .icon-cell img {
                        vertical-align: middle;
                        }
                        
                            
                     </style>
                    
                   
                    <!-- <i class="fa fa-question-circle"<i class="fas fa-user"></i> aria-hidden="true"></i> -->
                    <?php   
                        $p_id=$_SESSION['p_id'];
                        $sqll="SELECT * from tbl_reports where p_id='$p_id' ORDER BY report_date DESC LIMIT 1";
                        $result=$con->query($sqll);
                        
                        if($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {?>
                                    <table class="table mt-4" style="font-size:18px;">
                                        <tbody>
                                            <tr>
                                                <td class="icon-cell"><img src="images/icons/glucose-meter.png" width="22"></td>
                                                <td class="label-cell">Glucose :</td>
                                                <td><?=$row["glucose"]?>mg/dL</td>
                                                <td>
                                                    <?php
                                                        if($row["glucose"]>90 && $row["glucose"]<125)
                                                        {
                                                            echo "<span style='color:green'>Normal</span>";
                                                        }
                                                        elseif($row["glucose"]<90)
                                                        {
                                                            echo "<span style='color:blue'>Low glucose level</span>";
                                                        }
                                                        else
                                                        {
                                                            echo "<span style='color:red'>High glucose level</span>";
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="icon-cell"><img src="images/icons/droplet.png" width="22"></td>
                                                <td class="label-cell">Blood Pressure:</td>
                                                <td><?=$row["blood_pressure"]?>mmHg</td>
                                                <td>
                                                    <?php
                                                        if($row["blood_pressure"]>90 && $row["blood_pressure"]<129)
                                                        {
                                                            echo "<span style='color:green'>Normal</span>";
                                                        }
                                                        elseif($row["blood_pressure"]<90)
                                                        {
                                                            echo "<span style='color:blue'>Low Blood Pressure</span>";
                                                        }
                                                        else
                                                        {
                                                            echo "<span style='color:red'>High glucose level</span>";
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="icon-cell"><img src="images/icons/rapid-test.png" width="22"></td>
                                                <td class="label-cell">Insulin :</td>
                                                <td><?=$row["insulin"]?>IU/mL</td>
                                                <td>
                                                    <?php
                                                        if($row["insulin"]>5 && $row["insulin"]<15)
                                                        {
                                                            echo "<span style='color:green'>Normal</span>";
                                                        }
                                                        elseif($row["insulin"]<5)
                                                        {
                                                            echo "<span style='color:blue'>Low Insulin level</span>";
                                                        }
                                                        else
                                                        {
                                                            echo "<span style='color:red'>High Insulin level</span>";
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="icon-cell"><img src="images/icons/flask.png" width="22"></td>
                                                <td class="label-cell">Haemoglobin :</td>
                                                <td><?=$row["hb"]?>g/dL</td>
                                                <td>
                                                    <?php
                                                        if($row["hb"]>11.6 && $row["hb"]<16.6)
                                                        {
                                                            echo "<span style='color:green'>Normal</span>";
                                                        }
                                                        elseif($row["hb"]<10.5)
                                                        {
                                                            echo "<span style='color:blue'>Low Haemoglobin  </span>";
                                                        }
                                                        else
                                                        {
                                                            echo "<span style='color:red'>High Haemoglobin</span>";
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="icon-cell"><img src="images/icons/blood-test.png" width="22"></td>
                                                <td class="label-cell">Cholestrol Level :</td>
                                                <td><?=$row["cholestrol"]?>mg/dL</td>
                                                <td>
                                                    <?php
                                                        if($row["cholestrol"]>120 && $row["cholestrol"]<200)
                                                        {
                                                            echo "<span style='color:green'>Normal</span>";
                                                        }
                                                        elseif($row["cholestrol"]<119)
                                                        {
                                                            echo "<span style='color:blue'>Low Cholestrol  </span>";
                                                        }
                                                        else
                                                        {
                                                            echo "<span style='color:red'>High Cholestrol</span>";
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="icon-cell"><img src="images/icons/checkup.png" width="22"></td>
                                                <td class="label-cell">Heart Rate:</td>
                                                <td><?=$row["heart_rate"]?>bpm</td>
                                                <td>
                                                    <?php
                                                        if($row["heart_rate"]>60 && $row["heart_rate"]<100)
                                                        {
                                                            echo "<span style='color:green'>Normal</span>";
                                                        }
                                                        elseif($row["heart_rate"]<60)
                                                        {
                                                            echo "<span style='color:blue'>Low Heart Rate  </span>";
                                                        }
                                                        else
                                                        {
                                                            echo "<span style='color:red'>High Heart Rate</span>";
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                            
                                        </tbody> 
                                    </table>
                               <?php }}?>
                    
                    <div class="col mt-5">
                        <p><a href="previous_data.php">View Previous Data</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!--********************************** Content body end ***********************************-->
    </div>
        
        <!--********************************** Footer start ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">MedSphere</a> 2018</p>
            </div>
        </div>
        <!--********************************** Footer end ***********************************-->
    
    <!--********************************** Main wrapper end ***********************************-->

    <!--********************************** Scripts ***********************************-->
    <!-- <script>
        $("#submit_report").click(() => {
        glu = document.getElementById("glucose").value;
        bp = $("#blood_pressure").val();
        insul = $("#insulin").val();
        $.ajax({
            type: "POST",
            url: "external_api.php",
            data: {
            "symptom": {
                "symp1": glu,
                "symp2": bp,
                "symp3": insul,
                // "symp4": symp4,
                // "symp5": symp5
            },
              "type": 1,
              'action': 1,
            },
            dataType: 'JSON',
            cache: false,
            beforeSend: function() {
            $('#loading').show();
            },
            success: function(response) {
                
            $('#loading').hide();
            $("#finalSbtBtn").removeAttr('disabled', 'disabled');
            if (response.status == 1) {
                alert("success", "Predicted Data : \"" + (response.data).toUpperCase() + "\"", "success");
            } else {
                alert("error", response.data, "error");
            }
            }
        });
        // } else {
        //   swal("error", "Plaease select prediction method", "info");
        // }
        })

        function swal(tittle, text, icon) {
            Swal.fire({
            title: tittle,
            text: text,
            icon: icon,
            });
        }
    </script> -->
    <script>
  $("#predict").click(() => {
    symp1 = document.getElementById("symtomp1").value;
    symp2 = $("#symtomp2").val();
    symp3 = $("#symtomp3").val();
    symp4 = $("#symtomp4").val();
    symp5 = $("#symtomp5").val();
    pid = $("#pid").val();
      $.ajax({
        type: "POST",
        url: "seminar/external_api.php",
        data: {
          "symptom": {
            "symp1": symp1,
            "symp2": symp2,
            "symp3": symp3,
            "symp4": symp4,
            "symp5": symp5,
            "pid" : pid
          },
          'action': 1,
        },
        dataType: 'JSON',
        cache: false,
        beforeSend: function() {
          $('#loading').show();
        },
        success: function(response) {
          $('#loading').hide();
          $("#finalSbtBtn").removeAttr('disabled', 'disabled');
          if (response.status == 1) {
            console.log(response.data);
          } else {
            console.log(response.data);
          }
        }
      });
    
  })
</script>
    
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