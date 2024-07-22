<?php
session_start();
include '../userconfig.php';

// Get data to update from form submission
$id = trim($_POST['id']);
$fullname = trim($_POST['fullname']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$department = trim($_POST['department']);
$errors2 = array();

// Check if there are changes in the input
$sql = "SELECT * FROM bits_login WHERE id = $id LIMIT 1";
$result = $conn->query($sql);

if (!$result || $result->num_rows === 0) {
    // Unable to retrieve the user's record
    $errors2[] = "User record not found.";
} else {
    $row = $result->fetch_assoc();

    $hashedPassword = md5($password);

    // Prepare the image data as longblob
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $imgTmpPath = $_FILES["image"]["tmp_name"];
        $imgData = file_get_contents($imgTmpPath);
    } else {
        // No new image uploaded, keep the existing one
        $imgData = $row['image'];
    }

    if ($row['fullname'] === $fullname && $row['username'] === $username && $row['password'] === $hashedPassword && $row['department'] === $department && $row['image'] === $imgData) {
        // If there are no changes, don't do anything
        $errors2[] = "No changes to update.";
    }

    // Update data in MySQL using prepared statements
    $sql = "UPDATE bits_login SET ";
    $updates = array();
    $params = array();

    if ($row['fullname'] !== $fullname) {
        $updates[] = "fullname = ?";
        $params[] = $fullname;
    }

    if ($row['username'] !== $username) {
        $updates[] = "username = ?";
        $params[] = $username;
    }

    if ($row['password'] !== $hashedPassword) {
        $updates[] = "password = ?";
        $params[] = $hashedPassword;
    }

    if ($row['department'] !== $department) {
        $updates[] = "department = ?";
        $params[] = $department;
    }

    if ($row['image'] !== $imgData) {
        $updates[] = "image = ?";
        $params[] = $imgData;
    }

    if (!empty($updates)) {
        $sql .= implode(', ', $updates);
        $sql .= " WHERE id = ?";
        $params[] = $id;

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            // Bind parameters
            $types = str_repeat('s', count($params)); // Assuming all parameters are strings ('s')
            $stmt->bind_param($types, ...$params);

            // Execute the update query
            if ($stmt->execute()) {
                // Notify user that the update was successful
                $errors2[] = "Profile was successfully updated.";
            } else {
                // Error occurred during the update
                $errors2[] = "Error updating profile: " . $stmt->error;
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            // Error preparing the statement
            $errors2[] = "Error updating profile: " . $conn->error;
        }
    }
}

// Close database connection
$conn->close();

// Redirect user with appropriate messages
if (!empty($errors2)) {
    $errorString2 = implode(', ', $errors2);
    header('Location: editprof.php?msgs=' . urlencode($errorString2));
    exit();
} else {
    header("location: editprof.php");
    exit();
}
?>
