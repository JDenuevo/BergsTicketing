<?php
session_start();
include '../adminconfig.php';

// Get data to update from form submission
$id = trim($_POST['dep_id']);
$dep_name = trim($_POST['dep_name']);
$errors2 = array();

// Check if there are changes in the input
$sql = "SELECT * FROM bits_department WHERE dep_id = $id LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row['dep_name'] == $dep_name) {
  // If there are no changes, don't do anything
  header("location: department.php");
  exit;
}

// Update data in MySQL
$sql = "UPDATE bits_department SET dep_name='$dep_name' WHERE dep_id='$id'";

if ($conn->query($sql) === TRUE) {
  // Notify user that the update was successful
  $errors2[] = "Department was successfully updated.";
} if (!empty($errors2)) {
  // Redirect back to the login page with the error messages
  $errorString2 = implode(',', $errors2);
  header('Location: department.php?errors2=' . urlencode($errorString2));
  exit();
}

// Close database connection and redirect user
$conn->close();


?>
