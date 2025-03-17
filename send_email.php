<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Email recipient (replace with your email address)
    $to = "frankeconi2000@gmail.com";
    
    // Email subject
    $subject = "New Message " . $name;

    // Email body
    $body = "<h3>You have a new message from your portfolio contact form:</h3>";
    $body .= "<p><strong>Name:</strong> " . $name . "</p>";
    $body .= "<p><strong>Email:</strong> " . $email . "</p>";
    $body .= "<p><strong>Message:</strong></p><p>" . nl2br($message) . "</p>";

    // Set content-type header for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";

    // Additional headers
    $headers .= "From: " . $email . "\r\n";  // From the user's email

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Thank you for your message! I’ll get back to you soon.'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Oops! Something went wrong. Please try again later.'); window.location.href = 'index.html';</script>";
    }
}
?>
