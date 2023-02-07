<?php
    include('../../connection.php');
	session_start();
	if(!isset($_SESSION["email"])) 
	{
		header("Location:../login.php");
	}

    if(!empty($_POST["sym_id"])) 
    {    
        $sql=mysqli_query($con,"select * from tbl_disease where dis_id='".$_POST['sym_id']."'");
?>
    <option selected="selected">Probable Disease</option>
    <?php
        while($row=mysqli_fetch_array($sql))
            {?>
                <option value="<?php echo $row['dis_id'];?>">
                    <?php echo $row['dis_name']; ?>
                </option>
    <?php
    }
    }
    ?>