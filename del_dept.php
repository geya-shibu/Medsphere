<?php
include('connection.php');
session_start();
if(isset($_POST['d_btn']))
{
	$d_id=$_POST['d_btn'];
	$query="UPDATE tbl_dept SET status=1 where dept_id='$d_id'";
	$query_run=mysqli_query($con, $query);
	if($query_run)
	{
		echo "Deleted";
		header('location:department.php');
	}
}
?>