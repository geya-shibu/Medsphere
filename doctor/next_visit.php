<?php
session_start();
include('../connection.php');
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  function sendMail($email, $next_date)
  {
    require ("../PHPMailer/PHPMailer.php");
    require ("../PHPMailer/SMTP.php");
    require ("../PHPMailer/Exception.php");
    $mail = new PHPMailer(true);
    try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'ggsjgeya1@gmail.com';                     //SMTP username
      $mail->Password   = 'wjutgwizogvkwjuq';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      $mail->setFrom('ggsjgeya1@gmail.com', 'Geya');
      $mail->addAddress($email);    
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'MedSphere';
      $mail->Body    = "Thanks for visiting MedSphere. Your next appointment date is $next_date <br> 
	  					You can login to your portal using your login credentials and book an appointment on the above date.";
      $mail->send();
      return true;
  } catch (Exception $e) {
      // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      return false;
  }
}

if(isset($_POST['next_consult']))
{
	$next_date=$_POST['next_date'];
	$p_id=$_POST['next_consult'];
	$doc_id=$_SESSION['docid'];
    $sql1="SELECT * from tbl_patient where p_id='$p_id'";
    $sql1_run=mysqli_query($con, $sql1);
    if($sql1_run)
    {
        $val_fetch=mysqli_fetch_assoc($sql1_run);
        $login_id=$val_fetch['login_id'];
        $sql2="SELECT * from tbl_login where login_id='$login_id'";
        $sql2_run=mysqli_query($con, $sql2);
        if($sql2_run)
        {
            $row=mysqli_fetch_assoc($sql2_run);
            $email=$row['email'];
            $sql="INSERT INTO tbl_nextconsultation(p_id, doc_id, date) VALUES ('$p_id', '$doc_id', '$next_date')";
            if($con->query($sql)=== TRUE && sendMail($email, $next_date))
                {
                    echo "<script> alert('Mail Sent Successfully');     
                            window.location.href='appointment.php'</script>";
                    exit();
                }
        }
    }
}
?>