<?php
// Check if the file is uploaded successfully
if ($_FILES['admin_logo']['error'] === UPLOAD_ERR_OK) {
    // Define your upload directory
    $uploadDirectory = 'uploads/';

    // Generate a unique file name
    $fileName = "al" . '-' . $_FILES['admin_logo']['name'];

    // Move the uploaded file to the specified directory
    $uploadPath = $uploadDirectory . $fileName;
    if (move_uploaded_file($_FILES['admin_logo']['tmp_name'], $uploadPath)) {
        // Database connection
        $dsn = 'mysql:host=localhost;dbname=nuqkqixl_bergsticketing';
        $username = 'nuqkqixl_ticketing_admin';
        $password = 'ukoX&CjQ+w0.';

        try {
            $pdo = new PDO($dsn, $username, $password);

            // Start a transaction to ensure data consistency
            $pdo->beginTransaction();

            // Set isActive to 0 for all records
            $stmt = $pdo->prepare("UPDATE bits_sys_modify SET isActive = 0 WHERE upload_dir LIKE '%uploads/al-%'");
            $stmt->execute();

            // Insert the new upload with isActive = 1
            $stmt = $pdo->prepare("INSERT INTO bits_sys_modify (upload_dir, isActive) VALUES (:upload_dir, 1)");
            $stmt->bindParam(':upload_dir', $uploadPath, PDO::PARAM_STR);
            $stmt->execute();

            // Commit the transaction
            $pdo->commit();

            // Send a success response to the client
            echo json_encode(['success' => true]);
        } catch (PDOException $e) {
            // Rollback the transaction in case of an error
            $pdo->rollBack();

            // Handle database errors
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    } else {
        // Handle the file moving error
        echo json_encode(['success' => false, 'error' => 'File move error']);
    }
} else {
    // Handle the upload error
    echo json_encode(['success' => false, 'error' => 'Upload error']);
}
?>