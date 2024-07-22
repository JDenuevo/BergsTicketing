<?php
session_start();
include '../adminconfig.php'; // Include your database configuration
$_SESSION['ticket_number'] = $_POST['ticket_number'];
if (isset($_POST['submit_comment'])) {
    $ticketNumber = mysqli_real_escape_string($conn, $_POST['ticket_number']);
    $commentorName = mysqli_real_escape_string($conn, $_POST['commentor_name']);
    $send_to = mysqli_real_escape_string($conn, $_POST['send_to']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $manilaTimezone = new DateTimeZone('Asia/Manila');
    $currentTime = new DateTime('now', $manilaTimezone);
    $formattedDateTime = $currentTime->format('Y-m-d H:i:s');
    $commentContent = mysqli_real_escape_string($conn, $_POST['comment_content']);
    
    $sql = "INSERT INTO bits_comments (ticket_number, commentor_name, comment_date, comment_content)
            VALUES ('$ticketNumber', '$commentorName', '$formattedDateTime', '$commentContent')";
    
    $commentWithFormatting = "Commented: " . $commentContent;
    $manilaTimezone = new DateTimeZone('Asia/Manila');
    $currentTime = new DateTime('now', $manilaTimezone);
    $formattedDateTime = $currentTime->format('Y-m-d H:i:s');
    
    $sql1 = "INSERT INTO bits_notif_user (ticket_number, full_name,send_to ,email, action, date_created, status)
             VALUES ('$ticketNumber', '$commentorName','$send_to','$email', '$commentWithFormatting', '$formattedDateTime', 0)";
    
    $sql2 = "INSERT INTO bits_logs (ticket_number, full_name, subject, date_created, type)
                 VALUES ('$ticketNumber', 'Admin to $send_to', '$commentContent', '$formattedDateTime', 'comment')";
    
                    if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
                        echo json_encode(array('status' => 'success', 'message' => 'Notification added successfully'));
                    } else {
                        echo json_encode(array('status' => 'error', 'message' => 'Error adding notification: ' . mysqli_error($conn)));
                    }

    

    if (mysqli_query($conn, $sql)) {
        header("Location: ticketinglist.php");
        $_SESSION['open_modal'] = true;
        exit();
    } else {
        header("Location: ticketinglist.php");
        $_SESSION['open_modal'] = true;
        exit();
    }
} else {
    header("Location: ticketinglist.php");
    $_SESSION['open_modal'] = true;
    exit();
}

mysqli_close($conn); // Close the database connection
?>