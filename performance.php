<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    
<div id="hiddenCode" style="display: none;">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$sql = "SELECT student_name, exam_type, date, subject_scores, average_score, grade FROM exam_scores";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="board" style="background-color: WhiteSmoke; box-shadow: 0px 0px 10px blue;">
            <div class="table-container">
                <div class="table-wrapper">
                    <table class="table">
                        <h4>Results</h4>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Exam type</td>
                                <td>Date</td>
                                <td>Subject with scores</td>
                                <td>Average</td>
                                <td>Grade</td>
                            </tr>
                        </thead>
                        <tbody>';

    while ($row = $result->fetch_assoc()) {
        $studentName = $row["student_name"];
        $examType = $row["exam_type"];
        $date = $row["date"];
        $subjectScores = json_decode($row["subject_scores"], true);
        $averageScore = $row["average_score"];
        $grade = $row["grade"];

        echo '<tr>';
        echo "<td>$studentName</td>";
        echo "<td>$examType</td>";
        echo "<td>$date</td>";
        
        // Loop through subjects and scores
        echo '<td>';
        foreach ($subjectScores as $subject => $score) {
            echo "$subject: $score<br>";
        }
        echo '</td>';

        echo "<td>$averageScore</td>";
        echo "<td>$grade</td>";
        echo '</tr>';
    }

    echo '</tbody>
        </table>
    </div>
</div>
</div>';
} else {
    echo "No records found.";
}

// Close the database connection
$conn->close();
?>
</div>
<script>
    $(document).ready(function () {
        $("#toggleButton").click(function () {
            $("#hiddenCode").toggle();
        });
    });
</script>
</body>
</html>