<?php
// Database connection
$dsn = 'mysql:host=localhost;dbname=nuqkqixl_bergsticketing';
$username = 'nuqkqixl_ticketing_admin';
$password = 'ukoX&CjQ+w0.';

try {
    $pdo = new PDO($dsn, $username, $password);

    // Get isActive and selectedOptionValue from POST data
    $isActive = $_POST['isActive'];
    $selectedOptionValue = $_POST['selectedOptionValue'];
    
    // Set isActive to 0 for all records matching the pattern for admin logos
    $stmt = $pdo->prepare("UPDATE bits_sys_modify SET isActive = 0 WHERE upload_dir LIKE '%uploads/al-%'");
    $stmt->execute();
    
    // Set isActive to 1 for the selected admin logo
    $stmt = $pdo->prepare("UPDATE bits_sys_modify SET isActive = 1 WHERE upload_dir = :upload_dir AND upload_dir LIKE '%uploads/al-%'");
    $stmt->bindParam(':upload_dir', $selectedOptionValue, PDO::PARAM_STR);
    $stmt->execute();

    // Send a success response to the client
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    // Handle database errors
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
