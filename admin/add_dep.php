<?php
include("../adminconfig.php");
session_start();

if (isset($_POST['add_dep'])) {
        $errors1 = array();

        // Get data to insert from form submission
        $depname = trim($_POST['dep_name']);

        // Query database to get last position number
        $sql = "SELECT MAX(dep_num) AS last_dep_num FROM bits_department";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $last_dep_num = $row['last_dep_num'];
          } else {
            $last_dep_num = 0;
          }

        // Increment last position number to generate new position number
        $new_dep_num = $last_dep_num + 1;

        // Insert new position into database
        $sql = "INSERT INTO bits_department (dep_num, dep_name) VALUES ('$new_dep_num', '$depname')";

        if ($conn->query($sql) === TRUE) {
        // Notify user that the insert was successful
        $errors1[] = "Department was successfully added.";

        }  if (!empty($errors1)) {
          // Redirect back to the login page with the error messages
          $errorString1 = implode(',', $errors1);
          header('Location: department.php?errors1=' . urlencode($errorString1));
          exit();
      }

        // Close database connection and redirect user
        $conn->close();

    }
    ?>