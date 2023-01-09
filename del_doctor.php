<?php
include('connection.php');
session_start();
if(isset($_POST['d_btn']))
{
	$d_id=$_POST['d_btn'];
	$query="UPDATE tbl_doctor SET status=1 where doc_id='$d_id'";
	$query_run=mysqli_query($con, $query);
	if($query_run)
	{
		echo "Deleted";
		header('location:doctors.php');
	}
}
?>