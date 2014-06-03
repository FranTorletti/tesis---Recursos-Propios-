<?php
/*
	Example of use
	MailBox::sendMessagge( 	"destinatary@example.com",
							"This a body example",
							"This a subject example");
*/
class MailBox  {
    
    /*This function returns a message about send's state*/
	static function sendMessagge($mailAddress,$msg,$subject) {
        $config = Config::singleton();
        $mailFrom = $config->get("mailFrom");
        $pass = $config->get("passMailFrom");
    
		$mail = new PHPMailer();
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 2;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = $mailFrom;
        //Password to use for SMTP authentication
        $mail->Password = $pass;
        //Set who the message is to be sent from
        $mail->setFrom($mailFrom, '');
        //Set an alternative reply-to address
        $mail->addReplyTo($mailFrom, '');
        //Set who the message is to be sent to
        $mail->addAddress($mailAddress, '');
        //Set the subject line
        $mail->Subject = $subject;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML($msg);
        //$mail->msgHTML(file_get_contents('app/views/email/contents.html'), dirname(__FILE__));
        //Replace the plain text body with one created manually
        //$mail->AltBody = 'This is a plain-text message body';
        //send the message, check for errors
        $men = "";
        if (!$mail->send()) {
            $men =  "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $men =  "Message sent!";
        }

        return $men;
	}

}

?>