<?php
$host = "localhost";
$username = "root"; // Change if necessary
$password = "root123"; // Change if necessary
$dbname = "organdb";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>