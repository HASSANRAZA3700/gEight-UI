<?php
// script.php - form handler (fixed)

// Start session for passing errors/success between requests
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize raw inputs
    $name = trim((string)($_POST['name'] ?? ''));
    $email = trim((string)($_POST['email'] ?? ''));
    $message = trim((string)($_POST['message'] ?? ''));

    $errors = [];

    if ($name === '') {
        $errors[] = 'Name is required.';
    }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required.';
    }
    if ($message === '') {
        $errors[] = 'Message cannot be empty.';
    }

    if (!empty($errors)) {
        // pass errors and old input back to index page via session
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = [
            'name' => $name,
            'email' => $email,
            'message' => $message,
        ];

        // redirect back to main page contact section
        header('Location: index.html#contact');
        exit();
    }

    // Inputs are valid. (Send email / save to DB if desired.)
    // Example mail() is commented out; configure before enabling.
    /*
    $to = 'you@example.com';
    $subj = 'Contact form message';
    $body = "Name: $name\nEmail: $email\n\n$message";
    mail($to, $subj, $body);
    */

    // Set success flag in session and redirect to thank-you page
    $_SESSION['success'] = 'Message sent successfully.';
    header('Location: thank-you.html');
    exit();
}

// If accessed directly, send back to index
header('Location: index.html');
exit();
