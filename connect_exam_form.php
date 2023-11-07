<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentName = $_POST['studentName'];
    $studentId = $_POST['studentId'];
    $yearOfStudy = $_POST['yearOfStudy'];
    $date = $_POST['date'];
    $examType = $_POST['examType'];

    // Initialize an array to store subjects and their scores
    $subjects = [];

    // Define an array of subject names
    $subjectNames = [
        "maths", "english", "biology", "physics", "chemistry", "science",
        "geography", "history", "ict", "accounting", "religion", "homescience",
        "programming", "swahili", "indig"
    ];

    // Calculate the total score and count the number of subjects
    $totalScore = 0;
    $subjectCount = 0;

    foreach ($subjectNames as $subject) {
        if (isset($_POST[$subject])) {
            $score = intval($_POST[$subject]);
            $naChecked = isset($_POST["{$subject}_na"]) ? 1 : 0;

            // Check if N/A is checked, and if not, add the subject and score to the array
            if (!$naChecked) {
                $subjects[] = "$subject: $score";
                $totalScore += $score;
                $subjectCount++;
            }
        }
    }

    // Calculate the average score
    $averageScore = $subjectCount > 0 ? $totalScore / $subjectCount : 0;

    // Define a simple grading system (you can customize this as needed)
    $grade = '';

    if ($averageScore >= 90) {
        $grade = 'A+';
    } elseif ($averageScore >= 80) {
        $grade = 'A';
    } elseif ($averageScore >= 70) {
        $grade = 'B';
    } elseif ($averageScore >= 60) {
        $grade = 'C';
    } elseif ($averageScore >= 50) {
        $grade = 'D';
    } else {
        $grade = 'F';
    }

    // Combine subjects into one entry
    $subjectEntry = implode(", ", $subjects);

    // Step 1: Database connection configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Step 2: Insert data into the database table using prepared statements
    $sql = "INSERT INTO exam_scores (student_name, student_id, year_of_study, exam_date, exam_type, subjects_scores, average_score, grade)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siisssds", $studentName, $studentId, $yearOfStudy, $date, $examType, $subjectEntry, $averageScore, $grade);

    if ($stmt->execute()) {
        echo "Recorded successfully";
        header("Location: exam.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
