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
		$medicine=$_POST['medicine'];
		$dose=$_POST['dose'];
		$cnt=$_POST['cnt'];
		$cpid=$_SESSION['cur_pid'];
		$doc_id=$_SESSION['id'];
		$sql="SELECT * from tbl_doctor where login_id='$doc_id'";
		$result=$con->query($sql);
		$count=1;
		if($result-> num_rows > 0){
		while ($row=$result-> fetch_assoc()) {
			$did=$row['doc_id'];
		$ins="INSERT INTO tbl_record(p_id, doc_id, symptoms, disease, med_name, dosage, med_count) VALUES ('$cpid', '$did', '$sym','$disease', '$medicine', '$dose', '$cnt')";		
		if($con->query($ins)=== TRUE)
		{
			echo "<script>window.alert('Added Successfully');
			window.location.href='patient_page.php'; 
			</script>";
			exit(0);
		}
	}}
	}
	else
	{
		echo "Updated";
		header('location:patient_page.php');
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