<?php
session_start();
include '../adminconfig.php';

// Get data to update from form submission
$id = trim($_POST['faq_id']);
$question = trim($_POST['question']);
$answer = trim($_POST['answer']);
$errors2 = array();

// Check if there are changes in the input
$sql = "SELECT * FROM bits_faq WHERE id = $id LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row['id'] == $id && $row['question'] == $question && $row['answer'] == $answer) {
  // If there are no changes, don't do anything
  header("location: faq.php");
  exit;
}

// Update data in MySQL
$sql = "UPDATE bits_faq SET question='$question', answer='$answer' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  // Notify user that the update was successful
  $errors2[] = "FAQ was successfully updated.";
} if (!empty($errors2)) {
  // Redirect back to the login page with the error messages
  $errorString2 = implode(',', $errors2);
  header('Location: faq.php?errors2=' . urlencode($errorString2));
  exit();
}

// Close database connection and redirect user
$conn->close();


?>
