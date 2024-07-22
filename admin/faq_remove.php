<?php
include '../adminconfig.php';

$faq_num_to_delete = $_GET['faq_num'];
$errors3 = array();


// Delete the row from the database
$sql_delete = "DELETE FROM bits_faq WHERE faq_num = '$faq_num_to_delete'";
$conn->query($sql_delete);

// Retrieve the remaining rows, ordering them by their original order
$sql_select = "SELECT faq_num, question, answer FROM bits_faq ORDER BY id ASC";
$result = $conn->query($sql_select);

if (!$result) {
    echo "Error: " . $sql_select . "<br>" . $conn->error;
}

// Update the faq_num column with consecutive numbering
$i = 1;
while ($row = $result->fetch_assoc()) {
    $faq_num = $row['faq_num'];
    $sql_update = "UPDATE bits_faq SET faq_num = '$i' WHERE faq_num = '$faq_num'";
    $conn->query($sql_update);
    $i++;
}

// Notify user that the delete was successful
$errors3[] = "FAQ was successfully removed.";

if (!empty($errors3)) {
    // Redirect back to the login page with the error messages
    $errorString3 = implode(',', $errors3);
    header('Location: faq.php?errors3=' . urlencode($errorString3));
    exit();
}

  // Close database connection and redirect user
  $conn->close();
?>