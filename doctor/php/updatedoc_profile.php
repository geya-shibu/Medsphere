<?php
    include('../../connection.php');
	session_start();
	if(!isset($_SESSION["email"])) 
	{
		header("Location:../../login.php");
	}

    if(isset($_POST['update_profile']))
    {
        $doc_id=$_SESSION['docid'];
        if(isset($_POST['dob']))
        {
            $dob=$_POST['dob'];
            $query="UPDATE tbl_doctor SET dob='$dob' where doc_id='$doc_id'";
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
            $query="UPDATE tbl_doctor SET doc_name='$name' where doc_id='$doc_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['phone']))
        {
            $phone=$_POST['phone'];
            $query="UPDATE tbl_doctor SET phone='$phone' where doc_id='$doc_id'";
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
                $query="UPDATE tbl_doctor SET blood_group='$blood' where doc_id='$doc_id'";
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
                $query="UPDATE tbl_doctor SET gender='$gender' where doc_id='$doc_id'";
                $query_run=mysqli_query($con, $query);
                if($query_run)
                {
                    echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
                }
            }
        }
        if(isset($_POST['height']))
        {
            $height=$_POST['height'];
            if(!empty($height))
            {
                $query="UPDATE tbl_doctor SET height='$height' where doc_id='$doc_id'";
                $query_run=mysqli_query($con, $query);
                if($query_run)
                {
                    echo "<script> alert('Height Updated'); window.location.href='../profile.php';</script>";
                }
            }
        }
        if(isset($_POST['weight']))
        {
            $weight=$_POST['weight'];
            if(!empty($height))
            {
                $query="UPDATE tbl_doctor SET weight='$weight' where doc_id='$doc_id'";
                $query_run=mysqli_query($con, $query);
                if($query_run)
                {
                    echo "<script> alert('Weight Updated'); window.location.href='../profile.php';</script>";
                }
            }
        }
        if(isset($_POST['address1']))
        {
            $adr1=$_POST['address1'];
            $query="UPDATE tbl_doctor SET address_1 ='$adr1' where doc_id='$doc_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['address2']))
        {
            $adr2=$_POST['address2'];
            $query="UPDATE tbl_doctor SET address_2 ='$adr2' where doc_id='$doc_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['address3']))
        {
            $adr3=$_POST['address3'];
            $query="UPDATE tbl_doctor SET address_3 ='$adr3' where doc_id='$doc_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['nation']))
        {
            $nation=$_POST['nation'];
            $query="UPDATE tbl_doctor SET nationality ='$nation' where doc_id='$doc_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['state']))
        {
            $state=$_POST['state'];
            $query="UPDATE tbl_doctor SET state='$state' where doc_id='$doc_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['district']))
        {
            $district=$_POST['district'];
            $query="UPDATE tbl_doctor SET district='$district' where doc_id='$doc_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        
        if(isset($_POST['religion']))
        {
            $religion=$_POST['religion'];
            $query="UPDATE tbl_doctor SET religion='$religion' where doc_id='$doc_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['caste']))
        {
            $caste=$_POST['caste'];
            $query="UPDATE tbl_doctor SET caste='$caste' where doc_id='$doc_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }
        if(isset($_POST['maritalstatus']))
        {
            $maritalstatus=$_POST['maritalstatus'];
            $query="UPDATE tbl_doctor SET marital_status='$maritalstatus' where doc_id='$doc_id'";
            $query_run=mysqli_query($con, $query);
            if($query_run)
            {
                echo "<script> alert('Updated'); window.location.href='../profile.php';</script>";
            }
        }

    }
?>