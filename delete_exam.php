<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get the ID from the URL parameter

    // Perform the deletion query
    $deleteSql = "DELETE FROM exam_scores WHERE id = $id";

    if ($conn->query($deleteSql) === TRUE) {
        // Deletion was successful, redirect back to the main page
        header("Location: Exam.php"); // Replace 'exams.php' with the appropriate page URL
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request. Please provide a valid ID.";
}

// Close the database connection
$conn->close();
?>
