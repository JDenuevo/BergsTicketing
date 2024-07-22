<?php
include '../adminconfig.php';

if (isset($_POST['ticketNumber']) && isset($_POST['newStatus'])) {
    $ticketNumber = $_POST['ticketNumber'];
    $newStatus = $_POST['newStatus'];
    $send_to = $_POST['send_to'];
    $email = $_POST['email'];

    $updateQuery = "UPDATE bits_tickets SET ticket_status = '$newStatus' WHERE ticket_number = $ticketNumber";
    if ($conn->query($updateQuery) === TRUE) {
        header("Location: ticketinglist.php");
        $_SESSION['open_modal'] = true;
    } else {
        echo "Error updating status: " . $conn->error;
    }
    
    $commentWithFormatting = "Status changed to: " . $newStatus;
    $manilaTimezone = new DateTimeZone('Asia/Manila');
    $currentTime = new DateTime('now', $manilaTimezone);
    $formattedDateTime = $currentTime->format('Y-m-d H:i:s');
    
    $sql1 = "INSERT INTO bits_notif_user (ticket_number, full_name,send_to,email, action, date_created, status)
             VALUES ('$ticketNumber', 'Administrator','$send_to','$email', '$commentWithFormatting', '$formattedDateTime', 0)";
    
    $sql2 = "INSERT INTO bits_logs (ticket_number, full_name, subject, date_created, type)
                 VALUES ('$ticketNumber', '$send_to', '$commentWithFormatting', '$formattedDateTime', 'status')";
    
                    if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
                        echo json_encode(array('status' => 'success', 'message' => 'Notification added successfully'));
                    } else {
                        echo json_encode(array('status' => 'error', 'message' => 'Error adding notification: ' . mysqli_error($conn)));
                    }
}
?>
