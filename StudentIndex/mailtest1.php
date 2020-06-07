<?php
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		/* Include the Composer generated autoload.php file. */  
		require 'C:\wamp64\vendor\autoload.php';

function sendMail($email,$token)
{
		/* Namespace alias. */
		

		/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
		$mail = new PHPMailer(TRUE);

		/* Open the try/catch block. */
		try {
		   /* Set the mail sender. */
		   $mail->setFrom('officialforteteam@gmail.com', 'FORTE TEAM');

		   /* Add a recipient. */
		   $mail->addAddress($email);

		   /* Set the subject. */
		   $mail->Subject = 'Verification';
		   $mail->CharSet =  "utf-8";
			$mail->SMTPDebug = 0;
			$mail->IsSMTP();
			// enable SMTP authentication
			$mail->SMTPAuth = true;
			// GMAIL username
			$mail->Username = "officialforteteam@gmail.com";
			// GMAIL password
			$mail->Password = "forte2020";
			$mail->SMTPSecure = "tls";
			// sets GMAIL as the SMTP server
			$mail->Host = "tls://smtp.gmail.com";
			// set the SMTP port for the GMAIL server
			$mail->Port = "587";

		   /* Set the mail message body. */
			 $mail->IsHTML(true);
		   	$mail->Body = '<html><p>Thank you for signing up on our site. Please click on the link below to verify your account:.</p>
			<a href="http://localhost/project/StudentIndex/VerificationUpload.php?token=' . $token . '">Verify Email!</a></html>';

		   /* Finally send the mail. */
		   $mail->send();
		}
		catch (Exception $e)
		{
		   /* PHPMailer exception. */
		   echo $e->errorMessage();
		}
		catch (\Exception $e)
		{
		   /* PHP exception (note the backslash to select the global namespace Exception class). */
		   echo $e->getMessage();
		}
}
?>