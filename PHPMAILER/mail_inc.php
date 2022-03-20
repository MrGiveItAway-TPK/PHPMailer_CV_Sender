<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

		$mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; //Change if not gmail
        $mail->SMTPAuth = true;
        $mail->Username = "YourEmail@gmail.com"; //Change
        $mail->Password = "Your Password or App Password"; //Change
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465; //Change if not gmail
        $mail->setFrom('YourEmail@gmail.com','Your Name'); //Change
		$mail->isHTML(true);
?>