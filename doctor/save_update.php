<?php
include('../connection.php');
session_start();
if(!isset($_SESSION["email"])) 
{
    header("Location:../login.php");
}
if(isset($_POST['consult']))
{
    $cpid=$_SESSION['cur_pid'];
    $query="UPDATE tbl_appointment SET status='Consulted' where login_id='3'";
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