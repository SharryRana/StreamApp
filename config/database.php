<?php
// Replace these values with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "streams_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
