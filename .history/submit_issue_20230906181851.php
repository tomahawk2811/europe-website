<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bugDescription = $_POST["bug_description"];

    // Validate and sanitize the input (you should perform more robust validation)
    $bugDescription = htmlspecialchars(strip_tags($bugDescription));

    // Create a timestamp for the bug report
    $timestamp = date("Y-m-d H:i:s");

    // Format the bug report
    $bugReport = "Timestamp: $timestamp\nBug Description:\n$bugDescription\n\n";

    // Store the bug report in a text file (you may want to use a database in production)
    $filename = "bug_reports.txt";

    if (file_put_contents($filename, $bugReport, FILE_APPEND | LOCK_EX) !== false) {
        echo "Bug report submitted successfully!";
    } else {
        echo "Error submitting bug report.";
    }
} else {
    echo "Invalid request.";
}
?>