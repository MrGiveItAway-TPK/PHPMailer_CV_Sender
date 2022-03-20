<?php
include 'conn.php';
include '../PHPMAILER/mail_inc.php';

$Counter=1;

$sql_0 = "SELECT * FROM emails_cv WHERE Email_Status is NULL";
$stmt_0 = mysqli_query($conn,$sql_0) or die( mysqli_error($conn));

while($row_0 = mysqli_fetch_array($stmt_0))
{
$mail->ClearAddresses();
$mail->ClearAllRecipients();
$mail->ClearCustomHeaders();
$mail->ClearAttachments();
$mail->Body="";

$ID=$row_0['ID'];
$Company_Email=$row_0['Company_Email'];
$Company_Name=$row_0['Company_Name'];
echo "Sending Message #".$Counter." To: ".$Company_Email."...<br><br>";
flush();
ob_flush();

$mail->addAddress("".$Company_Email."");
$mail->Subject = 'Job Vacancy (My CV)';

$mail->Body .= "<b style='color:#1F497D;'>Dear ".$Company_Name.",</b>";
$mail->Body .= "<p style='color:#1F497D;'>Kindly find attached in this email my Personal CV.<br>";
$mail->Body .= "As i would like to apply fo the job vacancy that you have.</p>";
$mail->Body .= "<p><b style='color:#1F497D;'>Best Regards,<br>";
$mail->Body .= "Your Name And Title</b><br>"; //Change
$mail->Body .= "<a href='mailto:email@domain.com'>Your Email</a><br>"; //Change
$mail->Body .= "<span style='color:#1F497D;'>Your Location<br>"; //Change
$mail->Body .= "Mobile Number: Your Mobile Number</span><br>"; //Change
$mail->Body .= "<a href='https://github.com/Your_GitHub_Profile'>Your Github Profile</a></p>"; //Change
$mail->Body .= "<b style='color:red;'>Please Do Not Reply To This Email !</b>";

foreach (glob("../Attachments/*.pdf") as $filename) {
    $filename = basename($filename);
}
$mail->addAttachment('../Attachments/'.$filename.'', 'C.V.pdf'); 

if(!$mail->send())
{
	echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
	echo "Message #".$Counter." Sent To: ".$Company_Email." Successfully!<br><br>";
	flush();
    ob_flush();
	$Counter++;
	
	$Email_Body=$mail->Body;
	$Email_Body=str_replace("'","''",$Email_Body);
	$Email_Body=str_replace('"','""',$Email_Body);
	$Email_Status_Date=date("Y-m-d");
	$Email_Status_Time=date("H:i:s");
	
	$sql = "UPDATE emails_cv SET Email_Status='Sent Successfully', 
	Email_Body='$Email_Body',
	Email_Status_Date='$Email_Status_Date',
	Email_Status_Time='$Email_Status_Time' WHERE ID='$ID'";

	$stmt = mysqli_query($conn,$sql) or die( mysqli_error($conn));
}
}
if($Counter=="1"){
	echo "<b>No Messages To Send !</b><br>";
	echo "<b>Refresh Page To Start Sending Mails.";
}
?>