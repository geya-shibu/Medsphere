<?php
include('connection.php');
if(isset($_POST['edit_dept']))
{
	$dept_id=$_POST['edit_dept'];
	$dept_name=$_POST['dept_name'];
	$dept_detail=$_POST['dept_detail'];

	$query="UPDATE tbl_dept SET dept_name='$dept_name', dept_detail='$dept_detail' where dept_id='$dept_id'";
	$query_run=mysqli_query($con, $query);
	if($query_run)
	{
		echo ("<script> alert('Updated'); 
		window.location.href='department.php';
		</script>");
	}
	else
	{
		echo "Updated";
		header('location:edit_dept.php');
	}
}
?>