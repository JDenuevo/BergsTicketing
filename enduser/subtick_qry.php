<?php
session_start();
include '../userconfig.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';

$errors = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST['department'] !== "" && $_POST['department'] !== null) {

        $currentYear = date("y");
        $currentMonth = date("m");

        // Check if the table is empty
        $sqlCheckEmpty = "SELECT COUNT(*) AS count_tickets FROM bits_tickets";
        $resultCheckEmpty = mysqli_query($conn, $sqlCheckEmpty);
        $rowCheckEmpty = mysqli_fetch_assoc($resultCheckEmpty);
        $countTickets = $rowCheckEmpty['count_tickets'];

        // Set a default ticket number if the table is empty
        if ($countTickets == 0) {
            $ticketNumber = sprintf("%02d%02d%03d", $currentYear, $currentMonth, 1);
        } else {
            $sql = "SELECT MAX(ticket_number) AS max_ticket_number FROM bits_tickets WHERE ticket_number LIKE '$currentYear$currentMonth%'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $maxTicketNumber = $row['max_ticket_number'];

            $increment = intval(substr($maxTicketNumber, -3)) + 1;
            $ticketNumber = sprintf("%02d%02d%03d", $currentYear, $currentMonth, $increment);
        }
        

        // Proceed with inserting the ticket information into the database
        $requester = mysqli_real_escape_string($conn, $_POST["requester"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $department = mysqli_real_escape_string($conn, $_POST["department"]);
        $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
        $priority = mysqli_real_escape_string($conn, $_POST["priority"]);
        $description = mysqli_real_escape_string($conn, $_POST["content"]);
        
        
        // Process file attachments
        $attachments = array();
        if (!empty($_FILES['files']['name'][0])) {
            $total_files = count($_FILES['files']['name']);
            for ($i = 0; $i < $total_files; $i++) {
                $tmpFilePath = $_FILES['files']['tmp_name'][$i];
                if ($tmpFilePath != "") {
                    $attachmentData = file_get_contents($tmpFilePath);
                    if ($attachmentData !== false) {
                        $filename = $_FILES['files']['name'][$i];
                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        $attachments[] = array(
                            'data' => base64_encode($attachmentData),
                            'name' => 'attachment_' . ($i + 1) . '.' . $ext
                        );
                    }
                }
            }
        }

        $attachmentsJson = mysqli_real_escape_string($conn, json_encode($attachments));

        $sql = "INSERT INTO bits_tickets (ticket_number, requester, email, department, subject, priority, content, attachments)
                VALUES ('$ticketNumber', '$requester', '$email', '$department', '$subject', '$priority', '$description', '$attachmentsJson')";
                
        $manilaTimezone = new DateTimeZone('Asia/Manila');
        $currentTime = new DateTime('now', $manilaTimezone);
        $formattedDateTime = $currentTime->format('Y-m-d H:i:s');
        $subjectWithFormatting = "Created a Ticket: " . $subject;
        
        if (mysqli_query($conn, $sql)) {
            // Compose the email message using PHPMailer
            // Change the credentials based on your cpanel domain name, emails, and forwarder
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = "mail.bergsticketing.com";
                $mail->SMTPAuth = true;
                $mail->Username = "noreply@bergsticketing.com";
                $mail->Password = "sv!CiFo6;k1p";
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom('noreply@bergsticketing.com');
                $mail->addAddress($email);
                $mail->addAddress('bergsitticketing@gmail.com');
                $mail->isHTML(true);

                // Compose the email message
                $message = "<p><h2>These are the content of your ticket</h2></p>";
                $message .= "<p><h3>Ticket#: " . $ticketNumber ."</h3></p>";
                $message .= "<p>Requester: " . $requester . "</p>";
                $message .= "<p>Department: " . $department . "</p>";
                $message .= "<p>Subject: " . $subject . "</p>";
                $message .= "<p>Priority: " . $priority . "</p>";
                $message .= "<br>Description:<br>" . $description;

                $mail->Subject = "New Ticket: $subject <!-- PLEASE DO NOT REPLY THIS IS AN AUTOMATED EMAIL -->";
                $mail->Body = $message;

                // Attach files from the database
                if (!empty($attachments)) {
                    foreach ($attachments as $attachment) {
                        $mail->addStringAttachment(base64_decode($attachment['data']), $attachment['name']);
                    }
                }

                $mail->send();
                
                    $sql1 = "INSERT INTO bits_notif_admin (ticket_number, full_name, action, date_created, status)
                    VALUES ('$ticketNumber', '$requester', '$subjectWithFormatting', '$formattedDateTime', 0)";
                    
                    $sql2 = "INSERT INTO bits_logs (ticket_number, full_name, subject, date_created, type)
                    VALUES ('$ticketNumber','$requester','$subject', '$formattedDateTime', 'ticket')";
    
                    if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
                        echo json_encode(array('status' => 'success', 'message' => 'Notification added successfully'));
                    } else {
                        echo json_encode(array('status' => 'error', 'message' => 'Error adding notification: ' . mysqli_error($conn)));
                    }
                    
                $successMessage = "Ticket submission successful! An email has been sent to the IT Administrator with the ticket details.";
                $errors[] = $successMessage;
                echo $message;
            } catch (Exception $e) {
                $errorMessage = "Failed to submit the ticket. Mailer Error: " . $stmt->error;
                $errors[] = $errorMessage;
            }
        } else {
            $errorMessage = "Error: " . mysqli_error($conn);
            $errors[] = $errorMessage;
        }
    } else {
         $errorMessage = "Please insert a department!";
         $errors[] = $errorMessage;
    }
} else {
     $errorMessage = "Invalid request. Please use the form to submit the ticket.";
        $errors[] = $errorMessage;
}

// Close database connection
$conn->close();

// Redirect user with appropriate messages
if (!empty($errors)) {
    $errorString = implode(', ', $errors);
    header('Location: subtick.php?msgs=' . urlencode($errorString));
    exit();
} else {
    $successMessage = "Ticket submitted successfully!";
    header('Location: subtick.php?msgs=' . urlencode($successMessage));
    exit();
}
?>
