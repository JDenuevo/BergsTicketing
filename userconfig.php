<?php
$servername = "localhost";
$username = "nuqkqixl_ticketing_user";
$password = "~s#uPfhA!YZE";
$dbname = "nuqkqixl_bergsticketing";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
