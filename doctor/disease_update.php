<?php
	include('../connection.php');
	session_start();
	if(!isset($_SESSION["email"])) 
	{
		header("Location:../login.php");
	}

	if(isset($_POST['add_consultation']))
	{
		$sym=$_POST['sym'];
		$disease=$_POST['disease'];
		$cpid=$_SESSION['cur_pid'];
		$doc_id=$_SESSION['id'];
		date_default_timezone_set("Asia/Kolkata");
		$today = date("Y-m-d");
		$sql="SELECT * from tbl_doctor where login_id='$doc_id'";
		$result=$con->query($sql);
		$count=1;
		if($result-> num_rows > 0){
		while ($row=$result-> fetch_assoc()) {
			$did=$row['doc_id'];
		$ins="INSERT INTO tbl_record(p_id, doc_id, symptoms, disease, con_date) VALUES ('$cpid', '$did', '$sym','$disease', '$today')";		
		if($con->query($ins)=== TRUE)
		{
			echo "<script>window.alert('Added Successfully');
			window.location.href='patient_page.php'; 
			</script>";
			exit(0);
		}
		}}
		else
		{
			echo "Not Updated";
			header('location:patient_page.php');
		}
	}



	// Medicine Details
	if(isset($_POST['add_medicine']))
	{
		$medicine=$_POST['medicine'];
		$dose=$_POST['dose'];
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$time= $_POST['timings'];
		$timings = implode(",", $_POST['timings']);
		date_default_timezone_set("Asia/Kolkata");
		$today = date("Y-m-d");
		$start_timestamp = strtotime($start_date);
		$end_timestamp = strtotime($end_date);

		//calculate the difference between the end and start timestamps
		$diff_timestamp = abs($end_timestamp - $start_timestamp);

		//convert the difference into days
		$cnt = floor($diff_timestamp / (60 * 60 * 24))+1;
		$count = $cnt * count($time);
		
		$cpid=$_SESSION['cur_pid'];
		$doc_id=$_SESSION['id'];
		$sql="SELECT * from tbl_doctor where login_id='$doc_id'";
		$result=$con->query($sql);
		if($result-> num_rows > 0){
		while ($row=$result-> fetch_assoc()) {
			$did=$row['doc_id'];
		$ins="INSERT INTO tbl_medicine(p_id, doc_id, med_name, med_dose, start_date, end_date, timing, count, con_date) VALUES ('$cpid', '$did', '$medicine', '$dose', '$start_date', '$end_date', '$timings', '$count', '$today')";		
		if($con->query($ins)=== TRUE)
		{
			echo "<script>window.alert('Added Successfully');
			window.location.href='patient_page.php'; 
			</script>";
			exit(0);
		}
		}}
	}

	// Consultation Status
	if(isset($_POST['consult']))
	{
		$cpid=$_SESSION['cur_pid'];
		$query="UPDATE tbl_appointment SET status='Consulted' where login_id='$cpid'";
		echo $query;
		$query_run=mysqli_query($con, $query);
		if($query_run)
		{
			echo ("<script> alert('Saved Successfully'); 
			window.location.href='appointment.php';
			</script>");
		}
		else
		{
			echo "Failed to Save";
			header('location:patient_page.php');
		}
	}
?>