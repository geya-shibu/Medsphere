<?php
    include('../connection.php');
	session_start();
	if(!isset($_SESSION["email"])) 
	{
		header("Location:../login.php");
	}

    if(!empty($_POST["doctor"])) 
    {
        $did=$_POST["doctor"];
        $sql=mysqli_query($con,"select * from tbl_schedule where doc_id='".$did."'");
        ?>
        <option selected="selected">Select Day </option>
        <?php
        while($row=mysqli_fetch_array($sql))
            {?>
        <option value="<?php echo htmlentities($row['s_day']); ?>"><?php echo htmlentities($row['s_day']); ?></option>
        <?php
    }
    }
    ?>