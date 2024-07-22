<?php
include("../adminconfig.php");
session_start();
// SQL query to count pending tickets
$sql = "SELECT COUNT(*) AS pending_count FROM bits_tickets WHERE ticket_status = 'Pending'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the count
    $row = $result->fetch_assoc();
    $pendingCount = $row["pending_count"];
    // Return the count
    echo $pendingCount;
} else {
    echo "";
}

$conn->close();
?>