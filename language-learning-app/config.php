<?php
$servername = "localhost"; // Usually localhost
$username = "your_username"; // Your MySQL username
$password = "your_password"; // Your MySQL password
$dbname = "your_database_name"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>