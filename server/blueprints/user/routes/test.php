<?php
use PHPMailer\PHPMailer\PHPMailer; 
// use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception; 
 
// Include library files 
// require 'PHPMailer/Exception.php'; 
// require 'PHPMailer/PHPMailer.php'; 
// require 'PHPMailer/SMTP.php'; 
require './../../../services/PHPMailer/src/Exception.php';
require './../../../services/PHPMailer/src/PHPMailer.php';
require './../../../services/PHPMailer/src/SMTP.php';
interface EmailServerInterface {
	public function sendEmail($to, $subject, $message);
}


class EmailSender {
    private $emailServer;

    public function __construct(EmailServerInterface $emailServer) {
        $this->emailServer = $emailServer;
    }

    public function send($to, $subject, $message) {
        $this->emailServer->sendEmail($to, $subject, $message);
    }
}



class MyEmailServer implements EmailServerInterface {
    
    public function sendEmail($to, $subject, $message) {
       
        // $emailServer = new MyEmailServer();
        // $emailSender = new EmailSender($emailServer);
        $mail = new PHPMailer(true); 


try{
// Server settings 
$mail->SMTPDebug = 0;    //Enable verbose debug output 
$mail->isSMTP();                            // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;                     // Enable SMTP authentication 
$mail->Username = 'dangducchung02@gmail.com';       // SMTP username 
$mail->Password = 'onlsueaudbnhxugz';         // SMTP password 
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, ssl also accepted 
$mail->Port = 587;                          // TCP port to connect to 
 
// Sender info 

// $mail->addReplyTo('chungsakerbn@gmail.com', 'SenderName'); 
 
// Add a recipient 
$mail->addAddress($to, 'Đặng Đức Chung'); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject =$subject; 
 
// Mail body content 
$bodyContent = $message;
 
$mail->Body    = $bodyContent; 
 
// Send email 
 $mail->send();  
   echo 'Message has been sent.';
}catch (Exception $e){
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
}
        // $emailSender->send("dangducchung02@gmail.com", "Test Email", "This is a test email.");

    }
}
$emailServer = new MyEmailServer();
$emailSender = new EmailSender($emailServer);
$emailSender->send("minhtuan31102002@gmail.com", "Test", "ket noi thanhcong" );

?>