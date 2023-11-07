<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the 'id' parameter is present in the URL
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Delete the student record
    $sql = "DELETE FROM students_table WHERE id = $student_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: students.php");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
