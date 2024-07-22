<?php
session_start();
date_default_timezone_set('Asia/Manila');
error_reporting(E_ALL); 
ini_set('display_errors', 1);
$host = 'localhost';
$username = 'nuqkqixl_ticketing_admin';
$password = 'ukoX&CjQ+w0.';
$database = 'nuqkqixl_bergsticketing';

require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

class MyPdf extends Html2Pdf {
    // Override the Footer() method to add a custom footer
    protected function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, 'Page ' . $this->getPage() . " / " . $this->getAliasNbPages(), 0, 0, 'C');
    }
}

// Check if export format is specified
if (!isset($_GET['exportas'])) {
    echo "<script>alert('Export format not specified.');</script>";
    exit();
}

$exportFormat = strtolower($_GET['exportas']);

if ($exportFormat !== 'pdf' && $exportFormat !== 'excel') {
    echo "<script>alert('Invalid export format specified.');</script>";
    exit();
}
// Connect to MySQL database
$mysqli = new mysqli($host, $username, $password, $database);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$sql1 = "SELECT * FROM bits_sys_modify WHERE isActive = 1 AND upload_dir LIKE '%uploads/sl-%' LIMIT 1";
$result1 = $mysqli->query($sql1);
while ($row5 = $result1->fetch_assoc()) {
    $upload_sl = $row5['upload_dir'];
    $title = "BERGS";
}

// Define the selected fields
$selectedFields = [];
if (isset($_GET['fields'])) {
    $fields = explode(',', $_GET['fields']);
    if (in_array('ticket_number', $fields)) {
        $selectedFields[] = 'ticket_number';
    }
    if (in_array('requester_name', $fields)) {
        $selectedFields[] = 'requester';
    }
    if (in_array('requester_email', $fields)) {
        $selectedFields[] = 'email';
    }
    if (in_array('department', $fields)) {
        $selectedFields[] = 'department';
    }
    if (in_array('subject', $fields)) {
        $selectedFields[] = 'subject';
    }
    if (in_array('priority', $fields)) {
        $selectedFields[] = 'priority';
    }
    if (in_array('content', $fields)) {
        $selectedFields[] = 'content';
    }
    if (in_array('ticket_status', $fields)) {
        $selectedFields[] = 'ticket_status';
    }
    if (in_array('date_created', $fields)) {
        $selectedFields[] = 'date_created';
    }
    // Add other fields as needed
}

// Construct the SQL query
$sql = "SELECT " . implode(',', $selectedFields) . " FROM bits_tickets WHERE";

// Adjust the WHERE clause based on the date parameter
if (isset($_GET['date'])) {
    $dateType = $_GET['date'];
    switch ($dateType) {
        case '30days':
            $sql .= " date_created >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
            break;
        case '7days':
            $sql .= " date_created >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
            break;
        case 'yesterday':
            $sql .= " DATE(date_created) = DATE(DATE_SUB(NOW(), INTERVAL 1 DAY))";
            break;
        case 'today':
            $sql .= " DATE(date_created) = CURDATE()";
            break;
        default:
            // Handle invalid date parameter
            echo "<script>alert('Invalid date parameter.');</script>";
            exit();
            break;
    }
} elseif (isset($_GET['datefrom']) && isset($_GET['dateto'])) {
    // Use custom date range if provided
    $dateFrom = $_GET['datefrom'];
    $dateTo = $_GET['dateto'];
    $sql .= " date_created BETWEEN '$dateFrom' AND '$dateTo'";
} else {
    // Handle missing date parameters
    echo "<script>alert('Date parameters are missing.');</script>";
    exit();
}


// Execute the SQL query
$result = $mysqli->query($sql);

// Check if the query was successful
if ($result) {
    // Initialize HTML content string
    $html_content = '<div style="text-align: center;">';
    $html_content .= '<img src="' . $upload_sl . '" width="100" style="display: inline-block; vertical-align: middle; margin-right: 20px;">';
    $html_content .= '<h1 style="display: inline-block; vertical-align: middle;">' . $title . ' Ticketing System</h1>';
    $html_content .= '<br>'; // Add some space between the logo/title and the table
    $html_content .= '</div>';
    $html_content .= '<table border="1" cellpadding="5" cellspacing="0" style="margin:auto; width:100%;">';
    $html_content .= '<tr>';
    foreach ($selectedFields as $field) {
        $html_content .= '<th style="text-align: center;">' . ucwords(str_replace('_', ' ', $field)) . '</th>';
    }
    $html_content .= '</tr>';

    // Fetch data from MySQL query and generate HTML rows
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $html_content .= '<tr>';
            foreach ($selectedFields as $field) {
                // Format date field if applicable
                if ($field === 'date_created') {
                    $date = date_create($row[$field]);
                    $formatted_date = date_format($date, "F d, Y - h:ia");
                    $html_content .= '<td style="text-align: center;">' . $formatted_date . '</td>';
                } elseif ($field === 'content') {
                    $content = strip_tags($row[$field]);
                    $html_content .= '<td style="text-align: justify; width: 250px; white-space: nowrap;">' . $content . '</td>';
                } else {
                    $html_content .= '<td style="text-align: center;">' . ($row[$field] ?? "No Data Available") . '</td>';
                }
            }
            $html_content .= '</tr>';
        }
    } else {
        // If no rows are returned, colspan to display "No Data Available"
        $html_content .= '<tr><td colspan="' . count($selectedFields) . '" style="text-align: center;">No Data Available</td>';
        $html_content .= '</tr>';
    }

    $html_content .= '</table>';

    // Output format check
    if ($exportFormat === 'pdf') {
        // Generate PDF
        $html2pdf = new MyPdf('L');
        $html2pdf->pdf->SetTitle($title . ' Ticketing Report');
        $html2pdf->writeHTML($html_content);
        $html2pdf->output();
    } else if ($exportFormat === 'excel') {
        // Generate Excel
        // Include Excel generation logic here
    } else {
        echo "Invalid export format specified.";
    }
} else {
    // Handle error retrieving data from the database
    echo "Error retrieving data from the database.";
}
?>
