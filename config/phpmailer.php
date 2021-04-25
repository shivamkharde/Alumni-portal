<?php 
// php mailer configuration file
// adding php mailer includes
include($_SERVER['DOCUMENT_ROOT'].'/lib/PHPMailer/src/PHPMailer.php');
include($_SERVER['DOCUMENT_ROOT'].'/lib/PHPMailer/src/Exception.php');
include($_SERVER['DOCUMENT_ROOT'].'/lib/PHPMailer/src/SMTP.php');

// using phpmailer namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


    // this function is to set the host of the phpmailer and send the mail
    function sendMail($mailSender,$mailSenderName,$mailReceiver,$mailReceiverName,$mailSubject,$mailBody,$isHTML){
        $mail = new PHPMailer(true);
        // $mail->SMTPDebug = 4;
        try{
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                   
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = "MAIL_ID";                    
            $mail->Password   = "MAIL_PASSWORD";                          
            $mail->SMTPSecure = 'tls';  
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
            $mail->Port       = 587;

            // setting from and to values
            $mail->setFrom($mailSender, $mailSenderName);
            $mail->addAddress($mailReceiver, $mailReceiverName);

            // setting subject and body of mail
            $mail->isHTML($isHTML);                                  
            $mail->Subject = $mailSubject;
            $mail->Body    = $mailBody;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
?>