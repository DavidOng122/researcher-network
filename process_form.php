<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $hear_about_us = $_POST['hear_about_us'] ?? '';
    $how_can_we_help = $_POST['how_can_we_help'] ?? '';

    // Validate form data (you can add more validation as needed)
    // if (empty($name) || empty($email) || empty($phone) || empty($facility) || empty($country) || empty($how_can_we_help)) {
    //     echo "Please fill all required fields.";
    //     exit;
    // }

    // Sanitize data to prevent XSS
    $name = htmlspecialchars($name);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($phone);
    $hear_about_us = htmlspecialchars($hear_about_us);
    $how_can_we_help = htmlspecialchars($how_can_we_help);

    // Prepare email content
    $to = "yangyangyang111111@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $message .= "How did they hear about us: $hear_about_us\n";
    $message .= "How can we help: $how_can_we_help\n";

    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for your submission. We will get back to you soon.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
} else {
    // If not a POST request, redirect to the form page
    header("Location: contact.html");
    exit;
}
?>