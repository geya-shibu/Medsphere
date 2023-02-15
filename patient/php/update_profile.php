<?php
    include('../../connection.php');
	session_start();
	if(!isset($_SESSION["email"])) 
	{
		header("Location:../../login.php");
	}

    if(isset($_POST['update_profile']))
    {
        $p_id=$_SESSION['id'];
        if(isset($_POST['dob']))
        {
            $dob=$_POST['dob'];
            $query="UPDATE tbl_patient SET dob='$dob' where login_id='$p_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
            // else
            // {
            //     echo "<script> alert('Not Updated'); window.location.href='../profile.php'; </script>";
            // }
        }
        if(isset($_POST['name']))
        {
            $name=$_POST['name'];
            $query="UPDATE tbl_patient SET name='$name' where login_id='$p_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['phone']))
        {
            $phone=$_POST['phone'];
            $query="UPDATE tbl_patient SET phone='$phone' where login_id='$p_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['blood']))
        {
            $blood=$_POST['blood'];
            if(!empty($blood))
            {
                $query="UPDATE tbl_patient SET blood_group='$blood' where login_id='$p_id'";
                $query_run=mysqli_query($con, $query);
                if($query_run)
                {
                    echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
                }
            }
        }
        if(isset($_POST['gender']))
        {
            $gender=$_POST['gender'];
            if(!empty($gender))
            {
                $query="UPDATE tbl_patient SET gender='$gender' where login_id='$p_id'";
                $query_run=mysqli_query($con, $query);
                if($query_run)
                {
                    echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
                }
            }
        }
        if(isset($_POST['address1']))
        {
            $adr1=$_POST['address1'];
            $query="UPDATE tbl_patient SET address_line_1 ='$adr1' where login_id='$p_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['address2']))
        {
            $adr2=$_POST['address2'];
            $query="UPDATE tbl_patient SET address_line_2 ='$adr2' where login_id='$p_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['address3']))
        {
            $adr3=$_POST['address3'];
            $query="UPDATE tbl_patient SET address_line_3 ='$adr3' where login_id='$p_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['nation']))
        {
            $nation=$_POST['nation'];
            $query="UPDATE tbl_patient SET nationality ='$nation' where login_id='$p_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['state']))
        {
            $state=$_POST['state'];
            $query="UPDATE tbl_patient SET state='$state' where login_id='$p_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['district']))
        {
            $district=$_POST['district'];
            $query="UPDATE tbl_patient SET district='$district' where login_id='$p_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['occp']))
        {
            $occupation=$_POST['occp'];
            $query="UPDATE tbl_patient SET occupation='$occupation' where login_id='$p_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['religion']))
        {
            $religion=$_POST['religion'];
            $query="UPDATE tbl_patient SET religion='$religion' where login_id='$p_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['caste']))
        {
            $caste=$_POST['caste'];
            $query="UPDATE tbl_patient SET caste='$caste' where login_id='$p_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['maritalstatus']))
        {
            $maritalstatus=$_POST['maritalstatus'];
            $query="UPDATE tbl_patient SET marital_status='$maritalstatus' where login_id='$p_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }

    }
?>