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
        $sql=mysqli_query($con,"select * from tbl_schedule where doc_id='".$did."' AND status='0'");
        ?>
        <option selected="selected">Select Day </option>
        <?php
        
        while($row=mysqli_fetch_array($sql))
        {
            $day=$row['day_of_week'];
            $date = date('l', strtotime($day));?>
            <option value="<?php echo htmlentities($row['day_of_week']);?>">Date : <?php echo $day;?>, Day : <?php echo $date;?></option>
            <?php
        }
    }
    ?>