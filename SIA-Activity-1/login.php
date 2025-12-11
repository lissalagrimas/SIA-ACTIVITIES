<?php
// Simple login check
$username = $_POST['username'];
$password = $_POST['password'];

// Set fixed credentials
$valid_username = "student";
$valid_password = "12345";

// Check login
if ($username === $valid_username && $password === $valid_password) {
    // Redirect to registration form after login
    header("Location: form.html");
    exit();
} else {
    echo "<h2>Invalid Username or Password</h2>";
    echo "<p><a href='loginform.html'>Back to Login</a></p>";
}
?>