<?php
include('../connection.php');
if(isset($_POST['edit_session']))
{
    $sch_id=$_POST['edit_session'];
	$s_date=$_POST['s_date'];
	$s_stime=$_POST['s_stime'];
    $s_etime=$_POST['s_etime'];
    $s_nop=$_POST['s_nop'];
    $s_session=$_POST['session'];

	$query="UPDATE tbl_schedule SET 
            session='$s_session', 
            date='$s_date'
            start_time='$s_stime'
            end_time='$s_etime'
            $s_nop='$s_nop' where schedule_id='$sch_id'";
	$query_run=mysqli_query($con, $query);
	if($query_run)
	{
		echo "Updated";
		header('location:schedule.php');
	}
	else
	{
		echo "Updated";
		header('location:edit_session.php');
	}
}
?>