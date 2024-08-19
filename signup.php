<?php
require_once 'connection.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$query = "SELECT * FROM users WHERE email = '$email'";
$result = $connection->query($query);

if ($result->num_rows > 0) {
  echo "Email already registered";
} else {
  $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
  $connection->query($query);
  
  header('Location: home.html');
  exit;
}

$connection->close();
?>