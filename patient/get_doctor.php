<?php
    include('../connection.php');
	session_start();
	if(!isset($_SESSION["email"])) 
	{
		header("Location:../login.php");
	}

    if(!empty($_POST["specilizationid"])) 
    {
        $sql=mysqli_query($con,"select * from tbl_doctor where dept_id='".$_POST['specilizationid']."'");
        ?>
        <option selected="selected">Select Doctor </option>
        <?php
        while($row=mysqli_fetch_array($sql))
        {?>
            <option value="<?php echo htmlentities($row['doc_id']); ?>"><?php echo htmlentities($row['doc_name']); ?></option>
            <?php
        }
    }
    
    if(!empty($_POST["doctor"])) 
    {
        $_SESSION['d']=$_POST["doctor"];
        $sql=mysqli_query($con,"select * from tbl_doctor where doc_id='".$_POST['doctor']."'");
        while($row=mysqli_fetch_array($sql))
        {?>
            <option value="<?php echo htmlentities($row['doc_fees']); ?>"><?php echo htmlentities($row['doc_fees']); ?></option>
        <?php
        }
    }

    if(!empty($_POST["date"])) 
    {
        $did=$_POST["date"];
        $sql=mysqli_query($con,"select * from tbl_schedule where day_of_week='".$did."'");
        ?>
        <option selected="selected">Select Time Slot </option>
        <?php
        while($row=mysqli_fetch_array($sql))
            {?>
        <option value="<?php echo htmlentities($row['start_time']); ?>"><?php echo htmlentities($row['start_time']);?> to <?php echo htmlentities($row['end_time']);?> </option>
        <?php
    }
    }
?>