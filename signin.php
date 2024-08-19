<?php
// Include connection file
require_once 'connection.php';

// Get user input from form
$email = $_POST['email'];
$password = $_POST['password'];

// Check if email exists in database
$query = "SELECT * FROM users WHERE email = '$email'";
$result = $connection->query($query);

if ($result->num_rows > 0) {
  // Email exists, check password
  $user_data = $result->fetch_assoc();
  if (password_verify($password, $user_data['password'])) {
    // Password is correct, redirect to home page
    header('Location: home.html');
    exit;
  } else {
    // Password is incorrect, display error message
    echo "Incorrect password";
  }
} else {
  // Email does not exist, display error message
  echo "Email not registered";
}

// Close database connection
$connection->close();
?>