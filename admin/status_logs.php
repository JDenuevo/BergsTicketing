<?php
include '../adminconfig.php';

$sql = "SELECT * FROM bits_logs WHERE type = 'status' ORDER by date_created DESC";
$data = array();

if ($rs = $conn->query($sql)) {
    while ($row = $rs->fetch_assoc()) {
        // Format the date
        $formattedDate = date('F j, Y \a\t g:ia', strtotime($row['date_created']));
        
        $data[] = array(
            'ticket_number' => $row['ticket_number'],
            'full_name' => $row['full_name'],
            'subject' => $row['subject'],
            'description' => $row['description'],
            'date_created' => $formattedDate
        );
    }
}

echo json_encode($data);
?>
