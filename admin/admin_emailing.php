<?php 
    session_start();
    include '../adminconfig.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/SMTP.php';
    require '../phpmailer/src/Exception.php';

    function emailing(){
    
        $errors = array();
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
           // Proceed with inserting the ticket information into the database
                $requester = mysqli_real_escape_string($conn, $_POST["requester"]);
                $email = mysqli_real_escape_string($conn, $_POST["email"]);
                $department = mysqli_real_escape_string($conn, $_POST["department"]);
                $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
                $priority = mysqli_real_escape_string($conn, $_POST["priority"]);
                $description = mysqli_real_escape_string($conn, $_POST["content"]);

        
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
                        $mail->Host = "mail.csd-mis.com";
                        $mail->SMTPAuth = true;
                        $mail->Username = "bergsitticketing@csd-mis.com";
                        $mail->Password = "Bergsadministrator4321";
                        $mail->SMTPSecure = 'ssl';
                        $mail->Port = 465;
                        $mail->setFrom('bergsitticketing@csd-mis.com');
                        $mail->addAddress($email);
                        $mail->isHTML(true);
        
                        // Compose the email message
                        $message = "<p><h2>The Administrator marked your ticket status as $status</h2></p>";
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
            
                            if (mysqli_query($conn, $sql1)) {
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
    
    }

?>