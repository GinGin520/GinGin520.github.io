<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["fullname"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Specify your email address
    $to = "jhe44@u.rochester.edu";
    $subject = "New contact form submission";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Specify headers
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Redirect to a thank-you page or display a success message
        echo "Thank You! Your message has been sent.";
    } else {
        // Error message
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
} else {
    // Not a POST request
    echo "There was a problem with your submission, please try again.";
}
?>
