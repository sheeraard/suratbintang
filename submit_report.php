<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php'; // Path to the PHPMailer library

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $report = $_POST["report"];

    // Configure PHPMailer with your SMTP settings
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Your SMTP server address (for Gmail, use smtp.gmail.com)
    $mail->Port = 587; // Your SMTP port (usually 587 for TLS or 465 for SSL)
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = '111202214450@mhs.dinus.ac.id'; // Your Gmail email address (sender)
    $mail->Password = 'KaiZenin2003'; // Your Gmail app-specific password or regular password (sender's password)
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption (or 'ssl' for SSL encryption)

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Debugoutput = 'html';

    // Set up the recipient's email address (admin's email)
    $admin_email = "suratbintang.smtp@gmail.com";

    // Set up the email subject
    $subject = "Sexual Assault Report from $name";

    // Compose the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "report:\n$report";

    // Set email content
    $mail->setFrom('111202214450@mhs.dinus.ac.id', 'SURAT BINTANG'); // Sender's name and email address
    $mail->addAddress($admin_email); // Recipient's email
    $mail->Subject = $subject;
    $mail->Body = $email_content;

    // Use output buffering to prevent headers from being sent prematurely
    ob_start();

    // Send the email
    if ($mail->send()) {
        // Email sent successfully, redirect the user to a thank-you page or back to the form page
        header("Location: thank_you.php");
        exit();
    } else {
        // Email sending failed, display the error report
        echo "report could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    // Clear the output buffer and send its contents
    ob_end_flush();
}
?>
