<?php
include("../adminconfig.php");
session_start();

if (isset($_POST['add_faq'])) {
        $errors1 = array();

        // Get data to insert from form submission
        $question = trim($_POST['question']);
        $answer = trim($_POST['answer']);

        // Query database to get last position number
        $sql = "SELECT MAX(faq_num) AS last_faq_num FROM bits_faq";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $last_faq_num = $row['last_faq_num'];
          } else {
            $last_faq_num = 0;
          }

        // Increment last position number to generate new position number
        $new_faq_num = $last_faq_num + 1;

        // Insert new position into database
        $sql = "INSERT INTO bits_faq (faq_num, question, answer) VALUES ('$new_faq_num', '$question', '$answer')";

        if ($conn->query($sql) === TRUE) {
        // Notify user that the insert was successful
        $errors1[] = "FAQ was successfully added.";

        }  if (!empty($errors1)) {
          // Redirect back to the login page with the error messages
          $errorString1 = implode(',', $errors1);
          header('Location: faq.php?errors1=' . urlencode($errorString1));
          exit();
      }

        // Close database connection and redirect user
        $conn->close();

    }
    ?>