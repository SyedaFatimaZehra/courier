<?php
session_start();
if (!isset($_SESSION['agent_id'])) {
    header('Location: login.php');
    exit();
}

$conn = new mysqli("localhost", "root", "", "hamzaword");

// Set headers for CSV download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="branch_report.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, array('Branch Name', 'Location', 'Status'));

// Fetch branch data and write to CSV
$branches = $conn->query("SELECT * FROM branches");
while ($row = $branches->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
exit();
