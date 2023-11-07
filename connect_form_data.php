<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "school";


$mysqli = new mysqli($host, $user, $password, $database);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


function sanitizeInput($input) {
    global $mysqli;
    return $mysqli->real_escape_string($input);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = sanitizeInput($_POST["title"]);
    
    
if ($_FILES["file"]["error"] == 0) {
   
    $file_name = $_FILES["file"]["name"];
    
    
    $target_directory = "uploads/";
    if (!file_exists($target_directory)) {
        mkdir($target_directory, 0777, true); // Creates the directory recursively with full permissions (you can adjust permissions as needed)
    }
    
    // Construct the full path to save the file
    $file_path = $target_directory . $file_name;

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $file_path)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error moving file.";
    }
} else {
    echo "File upload failed with error code: " . $_FILES["file"]["error"];
}

    
    $description = sanitizeInput($_POST["description"]);

    
    $sql = "INSERT INTO form_data (title, file_path, description) VALUES ('$title', '$file_path', '$description')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    // Close the database connection
    $mysqli->close();
}
echo '<script>window.location = "reports.php";</script>';
?>


</html>
