<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    // Enable SMTP
    $mail->isSMTP();

    // SMTP Host
    $mail->Host = 'smtp.gmail.com';

    // SMTP Authentication
    $mail->SMTPAuth = true;
    $mail->Username = 'sba23056@student.cct.ie'; // Your email
    $mail->Password = 'nqzl suib akvr ftby'; // Your password

    // SMTP Encryption
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Sender
    $mail->setFrom('sba23056@student.cct.ie');

    // Recipient
    $mail->addAddress($_POST["email"]);

    // Construct email subject
    $subject = 'Your Booking Confirmation';
    $mail->Subject = $subject;

    // Construct email body
    $body = 'Hello ' . $_POST["name"] . ',<br><br>';
    $body .= 'Your ticket for ' . $_POST["ticket-amount"] . ' has been confirmed for ' . $_POST["date"] . '.<br>';
    $body .= 'We hope you enjoy ' . $_POST["movie-name"] . '.<br>';
    $body .= 'Price on arrival is €' . $_POST["total-price"] . '.<br>';
    $body .= 'Your confirmation code is: ' . generateConfirmationCode() . '<br><br>';
    $body .= 'Thank you for booking with us.<br>';
    $mail->Body = $body;

    // Send email
    if ($mail->send()) {
        echo "Email sent successfully";
    } else {
        echo "Error: " . $mail->ErrorInfo;
    }
}

// Function to generate 10-digit confirmation code
function generateConfirmationCode() {
    $chars = '0123456789';
    $code = '';
    for ($i = 0; $i < 10; $i++) {
        $code .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $code;
}
?>
