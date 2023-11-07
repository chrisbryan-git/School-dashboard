<!DOCTYPE html>
<html>
<head>
    <style>
        .board{
            background-color: WhiteSmoke;
            box-shadow: 0px 0px 10px blue;
            display: block; /* Changed to "block" to make it initially visible */
        }
    
        .table-wrapper {
          max-height: 400px;
          overflow-y: scroll;
          overflow-x: scroll;
        }
        .table-container {
          overflow-x: auto;
          max-width: 100%;
        }
        .table {
          width: 100%;
        }
        .table thead {
          position: sticky;
          top: 0;
          background-color: #f7f7f7;
          z-index: 1;
          box-shadow: 0px 0.5px blue;
          padding: 50px;
        }
        .fas{
            font-size: 35px;
            color: #FF0000; 
        }
    </style>
</head>
<body>
    <div class="board">
        <div class="table-container">
            <div class="table-wrapper">
                <table class="table">
                    <h4>Search Results</h4>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Exam type</td>
                            <td>Date</td>
                            <td>Maths</td>
                            <td>English</td>
                            <td>Biology</td>
                            <td>Physics</td>
                            <td>Chemistry</td>
                            <td>Science</td>
                            <td>Geography</td>
                            <td>History</td>
                            <td>ICT/Computer Science</td>
                            <td>B.Studies/Accounting</td>
                            <td>Religion</td>
                            <td>Home Science</td>
                            <td>Programming</td>
                            <td>Swahili</td>
                            <td>Indigenous/Foreign Lang</td>
                            <td>Grade</td>
                        </tr>
                    </thead>
                    <tbody>

<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search term from the POST data
$searchTerm = $_POST['searchTerm'];

// Modify the SQL query to filter results based on the search term
$sql = "SELECT * FROM exam_scores WHERE student_name LIKE '%$searchTerm%' OR student_id = '$searchTerm'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Echo HTML content for each row in the search results
        echo "<tr>";
        echo "<td>" . $row["student_name"] . "</td>";
                            echo "<td>" . $row["exam_type"] . "</td>";
                            echo "<td>" . $row["exam_date"] . "</td>";

                            // Retrieve subject scores from the database
                            $subjectScores = explode(", ", $row["subjects_scores"]);

                            // Loop through the subjects and display scores
                            $subjects = [
                                "maths", "english", "biology", "physics", "chemistry", "science",
                                "geography", "history", "ict", "accounting", "religion",
                                "homescience", "programming", "swahili", "indig"
                            ];

                            foreach ($subjects as $subject) {
                                $score = "N/A"; // Default value if subject not found
                                foreach ($subjectScores as $subjectScore) {
                                    list($subj, $subjScore) = explode(": ", $subjectScore);
                                    if ($subject === $subj) {
                                        $score = $subjScore;
                                        break;
                                    }
                                }
                                echo "<td>" . $score . "</td>";
                            }

                            echo "<td>" . $row["grade"] . "</td>";
        echo "</tr>";
    }
} else {
    // No results found
    echo "<tr><td colspan='20'>No results found</td></tr>";
}

$conn->close();
?>
