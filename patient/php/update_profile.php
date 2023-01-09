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
        // $name=$_POST['name'];
        // $phone=$_POST['phone'];
            $dob=$_POST['dob'];
        // $gender=$_POST['gender'];
    
        $query="UPDATE tbl_patient SET dob='$dob' where login_id='$p_id'";
        $query_run=mysqli_query($con, $query);
        if($query_run)
        {
            echo ("<script> alert('Updated'); 
            window.location.href='../profile.php';
            </script>");
        }
        else
        {
            echo ("<script> alert('Not Updated'); 
            window.location.href='../profile.php';
            </script>");
        }
    }}
?>