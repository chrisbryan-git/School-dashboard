<?php
// Check if the teacher ID is provided in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $teacherId = $_GET['id'];

    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to delete the teacher record
    $sql = "DELETE FROM teacher_table WHERE Id = $teacherId";

    if ($conn->query($sql) === TRUE) {
        // Record deleted successfully, you can redirect to the teacher list page
        header("Location: Teachers.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid teacher ID.";
}
?>
