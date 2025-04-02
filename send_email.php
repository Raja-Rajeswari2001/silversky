<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address!'); window.location.href='index.html';</script>";
        exit;
    }

    $mail = new PHPMailer(true);
    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rajarajeswari27072001@gmail.com';  // Your Gmail
        $mail->Password = 'mantdxcxlmyizzri';  // Use the App Password, NOT your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS
        $mail->Port = 587;

        // Sender & Recipient
        $mail->setFrom('rajarajeswari27072001@gmail.com', 'Raji');
        $mail->addAddress($email); // Send to the email entered in the form

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = 'Subscription Confirmation';
        $mail->Body = "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Subscription Confirmation</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <style>
    body {
        background-color: #f4f4f4;
        padding: 20px;
        font-family: Arial, sans-serif;
    }
    .email-container {
        max-width: 600px;
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin: auto;
        text-align: center;
        border: 2px solid #007bff;
    }
    .email-header {
        color: #007bff;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .email-body {
        font-size: 16px;
        color: #333;
        line-height: 1.6;
    }
    .email-button {
        display: inline-block;
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: black;
        padding: 12px 24px;
        text-decoration: none;
        border-radius: 50px;
        font-weight: bold;
        font-size: 16px;
        transition: all 0.3s ease-in-out;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        margin-top: 20px;
    }
    .email-button:hover {
        background: linear-gradient(135deg, #0056b3, #004494);
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.3);
        transform: translateY(-2px);
    }
</style>

</head>
<body>
    <div class=\"email-container\">
        <h3 class=\"email-header\">Subscription Confirmation</h3>
        <p class=\"email-body\">Thank you for subscribing to our newsletter!</p>
        <p class=\"email-body\">We appreciate your interest and will keep you updated.</p>
        <a href=\"#\" class=\"email-button\">Visit Our Website</a>
    </div>
</body>
</html>";

        $mail->send();
        echo "<script>alert('Subscription successful! Check your email.'); window.location.href='index.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Email sending failed: {$mail->ErrorInfo}'); window.location.href='index.html';</script>";
    }
}
?>