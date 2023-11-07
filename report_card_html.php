
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Report Card</title>
    <style>
      body {
    margin: 0;
    padding: 0;
}

/* Set a background color */
body {
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
}

/* Style the report card container */
.report-card {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    padding: 20px;
}

/* Style the header section */
.header {
    text-align: center;
}

.school-name {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
}

.title {
    font-size: 36px;
    font-weight: bold;
    color: #007BFF;
}

/* Style the profile picture */
.profile-picture {
    display: block;
    margin: 20px auto;
    max-width: 150px;
    border-radius: 50%;
    border: 2px solid #007BFF;
}

/* Style student information */
.student-info {
    font-size: 16px;
    margin: 20px 0;
}

.student-info div {
    margin-bottom: 10px;
}

.student-info strong {
    font-weight: bold;
    margin-right: 5px;
}

.table-wrapper {
    overflow-x: auto;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.table th, .table td {
    padding: 10px;
    text-align: left;
}

.table th {
    background-color: #333;
    color: #fff;
}

.table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.subject-name {
    font-weight: bold;
}

.comment, .teacher-signature {
    margin-bottom: 20px;
}

.comment strong, .teacher-signature strong {
    font-weight: bold;
}

.school-stamps {
    text-align: center;
    font-weight: bold;
    margin-top: 20px;
}

hr {
    border: none;
    border-top: 1px solid #ccc;
    margin: 20px 0;
}
.report-container {
    position: relative;
}

.print-button {
    position: absolute;
    top: 20px; 
    right: 20px; 
    z-index: 100; 
}
button{
    background-color: gray;
    padding: 10px;
    margin: 5px;
    border-radius: 10px;
}
button:hover{
    background-color: lightblue;
}
      
@media print {
.print-button {
    display: none;
    }
}
</style>
<script>
        function printReportCard() {
            window.print();
        }
    </script>
</head>
<body>
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

    // Assuming you have an "exam_scores" table with appropriate columns

    if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the data for the specific row with the given ID
    $sql = "SELECT * FROM exam_scores WHERE id = $id";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Output the report card for printing
            echo '<div class="report-card">';
            echo '<div class="header">';
            echo '<div class="school-name">[School Name]</div>';
            echo '<div class="title">Student Report Card</div>';
            echo '</div>';

            echo '<img src="images/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg" alt="Profile Picture" class="profile-picture">';
            echo '<hr>';
            echo '<div class="student-info">';
            echo '<div><strong>Student Name:</strong> ' . $row["student_name"] . '</div>';
            echo '<div><strong>Student ID:</strong> ' . $row["student_id"] . '</div>';
            echo '<div><strong>Year of Study:</strong> ' . $row["year_of_study"] . '</div>';
            echo '<div><strong>Date:</strong> ' . $row["exam_date"] . '</div>';
            echo '<div><strong>Exam Type:</strong> ' . $row["exam_type"] . '</div>';
            echo '<div><strong>Level:</strong> ' . $row["level"] . '</div>';
            echo '</div>';
            echo '<hr>';
            echo '<div class="subject-scores">';
            echo '<div class="table-wrapper">';
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<td>Subject</td>';
            echo '<td>Score</td>';
            echo '<td>Grade</td>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // Assuming you store subject scores in a format like "subject: score"
            $subjectScores = explode(", ", $row["subjects_scores"]);

            foreach ($subjectScores as $subjectScore) {
                list($subject, $score) = explode(": ", $subjectScore);
                echo '<tr>';
                echo '<td class="subject-name">' . $subject . '</td>';
                echo '<td>' . $score . '</td>';
                $grade = '';

                if ($score >= 90) {
                    $grade = 'A+';
                } elseif ($score >= 80) {
                    $grade = 'A';
                } elseif ($score >= 70) {
                    $grade = 'B';
                } elseif ($score >= 60) {
                    $grade = 'C';
                } elseif ($score >= 50) {
                    $grade = 'D';
                } else {
                    $grade = 'F';
                }
                echo '<td>' . $grade . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';

            echo '<hr>';
            echo '<div class="comment">';
            echo '<div><strong>Teacher\'s comments:</strong> ________________________</div>';
            echo '</div>';
            echo '<div class="teacher-signature">';
            echo '<div><strong>Teacher\'s Signature:</strong> ________________________</div>';
            echo '</div>';

            // School Stamps
            echo '<div class="school-stamps">';
            echo '<div><strong>School Stamp:</strong></div>';
            echo '</div>';

            // Close report card div
            echo '</div>';
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

</body>
</html>