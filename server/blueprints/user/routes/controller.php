<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './../../../services/PHPMailer/src/Exception.php';
require './../../../services/PHPMailer/src/PHPMailer.php';
require './../../../services/PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
function sendMail($username, $password)
{
    $mail = new PHPMailer(true);

    $mail->SMTPDebug = 0; // Enable verbose debug output
    $mail->isSMTP(); // gửi mail SMTP
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'nrolight.contact@gmail.com'; // SMTP username
    $mail->Password = 'igplamftiwbrvujb'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587; // TCP port to connect to

    //Recipients
    // $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress($username, 'dummy'); // Add a recipient
    // $mail->addAddress('ellen@example.com'); // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');


    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Password retrieval';
    $mail->Body = "Your password is $password";

    $mail->send();

}
function getPasswordFromMail($newUsername, $newPassword){
    include('./../../../configs/conn.php');

    $sql = "UPDATE account SET password='$newPassword' WHERE username='$newUsername'";
    if ($connect->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $connect->error;
      }
      
      $connect->close();
}

?>