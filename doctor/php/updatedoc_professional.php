<?php
    include('../../connection.php');
	session_start();
	if(!isset($_SESSION["email"])) 
	{
		header("Location:../../login.php");
	}
    
    if(isset($_POST['update_qual']))
    {
        $doc_id=$_SESSION['docid'];
        $qual = $_POST['qual'];
        for ($i = 0; $i < count($qual); $i++) {
            $quals = $qual[$i];
            $sql="INSERT INTO tbl_qualification (doc_id, qualification) VALUES ('$doc_id', '$quals')";
            if($con->query($sql)=== TRUE)
            {
                echo "<script> alert('Added Successfully'); 
                window.location.href='../profile.php';</script>";
            }
        
        }
    }

    if(isset($_POST['update_exp']))
    {
        $doc_id=$_SESSION['docid'];
        $exp = $_POST['exp'];
        for ($i = 0; $i < count($exp); $i++) {
            $exps = $exp[$i];
            $sql="INSERT INTO tbl_area_of_expertise (doc_id, area_of_exp) VALUES ('$doc_id', '$exps')";
            if($con->query($sql)=== TRUE)
            {
                echo "<script> alert('Added Successfully'); 
                window.location.href='../profile.php';</script>";
            }
        
        }
    }

    if(isset($_POST['update_award']))
    {
        $doc_id=$_SESSION['docid'];
        $award = $_POST['award'];
        for ($i = 0; $i < count($award); $i++) {
            $awards = $award[$i];
            $sql="INSERT INTO tbl_award (doc_id, award) VALUES ('$doc_id', '$awards')";
            if($con->query($sql)=== TRUE)
            {
                echo "<script> alert('Added Successfully'); 
                window.location.href='../profile.php';</script>";
            }
        
        }
    }

    // if(isset($_POST['update_lang']))
    // {
    //     $doc_id=$_SESSION['docid'];
    //     $lang = $_POST['lang'];
    //     for ($i = 0; $i < count($lang); $i++) {
    //         $langs = $lang[$i];
    //         $sql="INSERT INTO tbl_lang (doc_id, award) VALUES ('$doc_id', '$awards')";
    //         if($con->query($sql)=== TRUE)
    //         {
    //             echo "<script> alert('Added Successfully'); 
    //             window.location.href='../profile.php';</script>";
    //         }
        
    //     }
    // }

    if(isset($_POST['update_year']))
    {
        $doc_id=$_SESSION['docid'];
        $year = $_POST['year'];
        $sql="INSERT INTO tbl_docprofessional (doc_id, experience) VALUES ('$doc_id', '$year')";
        if($con->query($sql)=== TRUE)
        {
            echo "<script> alert('Added Successfully'); 
            window.location.href='../profile.php';</script>";
        }
    
    }
?>