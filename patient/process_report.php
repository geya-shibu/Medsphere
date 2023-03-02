<?php
    include('../connection.php');
    session_start();
    if(!isset($_SESSION["email"])) 
    {
        header("Location:../../login.php");
    }
    if(isset($_POST['submit_report']))
    {   
        $p_id=$_SESSION['p_id'];
        $glucose=$_POST['glucose'];
        $blood_pressure=$_POST['blood_pressure'];
        $haemoglobin=$_POST['haemoglobin'];
        $cholestrol=$_POST['cholestrol'];
        $heart_rate=$_POST['heart_rate'];
        $oxygen=$_POST['oxygen'];
        date_default_timezone_set("Asia/Kolkata");
        $current_date = date('H:i:s');
        
        // $duplicate=mysqli_query($con, "SELECT * from tbl_reports WHERE dept_name='$dept_name'");
        // if(mysqli_num_rows($duplicate)>0)
        // {
        //     echo "<script> alert('Already Added Department');
        //                     windows.location.href='department.php';
        //     </script>";
        //     exit(0);
        // }
            $ins="INSERT INTO tbl_reports (p_id, glucose, blood_pressure, hb, cholestrol, heart_rate, oxygen, report_date) 
            VALUES ('$p_id', '$glucose','$blood_pressure', '$haemoglobin', '$cholestrol', '$heart_rate', '$oxygen', '$current_date')";	
            if($con->query($ins)=== TRUE)
                {
                    echo "<script> alert('Record Added Successfully'); 
                    window.location.href='reports.php';</script>";
                }
    }
    
?>