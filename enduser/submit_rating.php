<?php
session_start();
include '../userconfig.php';

// Get the rating, comment, and ticket number from the AJAX request
$data = json_decode(file_get_contents("php://input"), true);
$rating = $data["rating"];
$comment = $conn->real_escape_string($data["comment"]);
$ticketNumber = $data["ticketNumber"];

// Retrieve requester's name from the bits_tickets table
$sqlGetName = "SELECT requester FROM bits_tickets WHERE ticket_number = '$ticketNumber'";
$resultGetName = mysqli_query($conn, $sqlGetName);

if ($resultGetName && mysqli_num_rows($resultGetName) > 0) {
    $rowGetName = mysqli_fetch_assoc($resultGetName);
    $requesterName = $rowGetName["requester"];
} else {
    $requesterName = "Unknown Requester";
}

// Insert the rating and comment into the bits_rate table
$sql = "INSERT INTO bits_rate (ticket_number, ticket_rate, ticket_comment) VALUES ('$ticketNumber', '$rating', '$comment')";

if ($conn->query($sql) === TRUE) {
    // Update the isRated field in the bits_tickets table
    $isRated = true;
    $sqlUpdate = "UPDATE bits_tickets SET isRated = '$isRated' WHERE ticket_number = '$ticketNumber'";

    if ($conn->query($sqlUpdate)) {
        // If the insertion and update were successful
        $manilaTimezone = new DateTimeZone('Asia/Manila');
        $currentTime = new DateTime('now', $manilaTimezone);
        $formattedDateTime = $currentTime->format('Y-m-d H:i:s');

        if ($rating === 1) {
            $commentWithFormatting = "Rated: 1 star, $comment";
        } else {
            $commentWithFormatting = "Rated: $rating stars, $comment";
        }

        // Insert notification into the bits_notif_admin table
        $sqlInsertNotification = "INSERT INTO bits_notif_admin (ticket_number, full_name, action, date_created, status)
             VALUES ('$ticketNumber', '$requesterName', '$commentWithFormatting', '$formattedDateTime', 0)";
        
        $sql2 = "INSERT INTO bits_logs (ticket_number, full_name, subject, date_created, type)
                 VALUES ('$ticketNumber', '$requesterName', '$rating/5', '$formattedDateTime', 'rate')";
                 
        if (mysqli_query($conn, $sqlInsertNotification) && mysqli_query($conn, $sql2)) {
            $response = array("status" => "success", "message" => "Rating, comment, and notification added successfully.");
        } else {
            $response = array("status" => "error", "message" => "Error adding notification: " . mysqli_error($conn));
        }
    } else {
        // If updating the isRated field failed
        $response = array("status" => "error", "message" => "Error updating isRated: " . $conn->error);
    }
} else {
    // If the insertion into bits_rate failed
    $response = array("status" => "error", "message" => "Error inserting rating and comment: " . $conn->error);
}

$conn->close();

// Set the JSON response header
header('Content-Type: application/json');

// Output the JSON response
echo json_encode($response);
?>
