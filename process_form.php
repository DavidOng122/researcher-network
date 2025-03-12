<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $hear_about_us = htmlspecialchars(trim($_POST['hear_about_us'] ?? ''));
    $how_can_we_help = htmlspecialchars(trim($_POST['how_can_we_help'] ?? ''));

    // Validate required fields
    if (empty($name) || empty($email) || empty($phone) || empty($how_can_we_help)) {
        echo "Error: All required fields must be filled out.";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Invalid email format.";
        exit;
    }

    // Prepare email content
    $to = "yangyangyang111111@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $message .= "How did they hear about us: $hear_about_us\n";
    $message .= "How can we help: $how_can_we_help\n";

    $headers = "From: no-reply@yourdomain.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for your submission. We will get back to you soon.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
} else {
    // Redirect to the contact form if accessed directly
    header("Location: contact.html");
    exit;
}
?>