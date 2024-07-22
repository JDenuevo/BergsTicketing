<?php
// fetch.php

if (isset($_POST["view"])) {
    include '../adminconfig.php';

    if ($_POST["view"] != '') {
        $update_query = "UPDATE bits_notif_admin SET status=1 WHERE status=0";
        mysqli_query($conn, $update_query);
    }

    $query = "SELECT * FROM bits_notif_admin ORDER BY id DESC";
    $result = mysqli_query($conn, $query);
    $notifications_html = '';

    if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $originalDate = $row["date_created"];
        $timestamp = strtotime($originalDate);
        $formattedDate = date("F j, Y \a\\t g:ia", $timestamp);
        
        $notificationContent = $row["action"];
        $notificationLink = '';

        if (strpos($notificationContent, "Commented: ") !== false || strpos($notificationContent, "Created a Ticket:") !== false) {
            $notificationLink = 'ticketinglist.php';
        } elseif (strpos($notificationContent, "Rated: ") !== false) {
            $notificationLink = 'review.php';
        }

        $notifications_html .= '
        <div class="container mt-2">
            <h6 class="ms-1">' .'Ticket Number: '. $row["ticket_number"] . '</h6>
            <div class="d-flex justify-content-between align-items-center">
                <div class="mx-1">
                    <a href="' . $notificationLink . '" class="fw-bold">' .'Requester: '. $row["full_name"] . '</a>
                    <p class="text-muted">' . $notificationContent . '</p>
                </div>
            </div>
            <label class="ms-1 float-end" style="font-size: 13.5px;">' . $formattedDate . '</label>
        </div><br>
        <hr>';
    }
    } else {
        $notifications_html .= '<p class="ms-2 text-muted">No notifications found.</p>';
    }

    $header = '
    <h4 class="ms-2 fw-bold">Notifications</h4>
    <hr>
    ';

    $query_1 = "SELECT * FROM bits_notif_admin WHERE status=0";
    $result_1 = mysqli_query($conn, $query_1);
    $count = mysqli_num_rows($result_1);
    $data = array(
        'header' => $header,
        'notification' => '<div class="notifications-container" style="max-height: 450px; overflow-y: auto;">' . $notifications_html . '</div>',
        'unseen_notification' => $count
    );
    echo json_encode($data);
}
?>
