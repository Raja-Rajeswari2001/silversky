<?php
session_start();
// Database connection
$host = "localhost";
$username = "root"; // Default XAMPP user
$password = ""; // Leave empty for XAMPP
$database = "tms_db";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // ✅ Get date directly from the form
    $booking_date = $_POST['booking_date']; // YYYY-MM-DD format from <input type="date">

    // ✅ Get time directly from the form (No need for `strtotime`)
    $booking_time = $_POST['booking_time']; // HH:MM format from <input type="time">
    
    // Convert time to 12-hour format with AM/PM
    $time_12hr_format = date("h:i A", strtotime($booking_time));

    $destination = $_POST['destination'];
    $persons = $_POST['persons'];
    $category = $_POST['category'];
    $message = $_POST['message'];

    // Insert into database
    $sql = "INSERT INTO bookings (name, email, phone,booking_date, booking_time, destination, persons, category, message) 
            VALUES ('$name', '$email', '$phone','$booking_date', '$time_12hr_format', '$destination', '$persons', '$category', '$message')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Booking successful!";
    } else {
        $_SESSION['error'] = "Error: " . $conn->error;
    }

    // ✅ Ensure no output before redirection
    ob_end_clean();
    header("Location: booking.php");
    exit();
}

$conn->close();
?>