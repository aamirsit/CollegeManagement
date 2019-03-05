<?php
include("DatabaseFiles/cn1.php");
$r=mysql_fetch_object(mysql_query("select * from faculty_tbl f inner join login_tbl l where f.fid=l.fid AND f.fid=".$_REQUEST["fid"]));
$email = $r->emailid;
$message = $r->password;
require('PHPMailer/PHPMailerAutoload.php');
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;

//	===================================================================
//	JUST EDIT BELOW FIVE LINES
//	===================================================================
$mail->Host = "mail.mybws.online";					// Enter "mail.my-domain.com"
$mail->Username = "help@mybws.online";			// Enter an email address created through cPanel
$mail->Password = "Li^dlXkCZat,";						// Enter the email password created through cPanel
$mail->AddAddress($email, "My Name"); // Enter the recipient "to" email address
$mail->Subject = "Forgotten Password...";		// For subject "Any Preferred Email Subject";
//	===================================================================
//  DO NOT EDIT BELOW THIS ~~ MODIFY AT YOUR OWN RISK & DO NOT CONTACT SUPPORT
//  IF YOU NEED HELP, GOOGLE AND LEARN ABOUT PHPMAILER OR CONTACT A PROGRAMMER
//	===================================================================

$mail->From = "help@mybws.online";// 
$mail->FromName = "Iqra College";
$mail->WordWrap = 50;
$mail->IsHTML(true);
$mail->Body = $message;
$mail->AltBody ="Name    : Aamir Sitponiya\n\nEmail   : {$email}\n\nMessage : {$message}";
$mail->SMTPDebug  = 0;								// Change to "2" to see full SMTP connection output 

if(!$mail->Send())
{
echo "Message could not be sent. <p>";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}

echo "<script>alert('Thank You! Message Sent successfully to your emailid = $email');</script>";	
header("location:../login.php");
// Remove this "echo" line if redirecting to thankyou.html
//header('Location: thankyou.html'); 				// Remove the double slash to redirect to thankyou.html
?>