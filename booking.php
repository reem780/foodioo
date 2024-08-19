<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "foodio";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $conn->real_escape_string(trim($_POST['name'] ?? ''));
    $phone = $conn->real_escape_string(trim($_POST['phone'] ?? ''));
    $people = (int)($_POST['people'] ?? 0);
    $date = $conn->real_escape_string(trim($_POST['date'] ?? ''));
    $time = $conn->real_escape_string(trim($_POST['time'] ?? ''));

    // Debugging: Output sanitized data
  //  echo "<h2>Debugging Information</h2>";
    //echo "Name: " . htmlspecialchars($name) . "<br>";
    //echo "Phone: " . htmlspecialchars($phone) . "<br>";
    //echo "People: " . $people . "<br>";
    //echo "Date: " . htmlspecialchars($date) . "<br>";
    //echo "Time: " . htmlspecialchars($time) . "<br>";

    // Prepare SQL statement
    $sql = "INSERT INTO bookings (name, phone, people, date, time) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssiss", $name, $phone, $people, $date, $time);

        if ($stmt->execute()) {
            echo "Booking successfully saved!";
        } else {
            echo "Error executing statement: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Form was not submitted via POST.";
}

$conn->close();
?>
