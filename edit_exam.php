<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ...
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    $studentName = $_POST['studentName'];
    $examType = $_POST['exam_type'];
    $examDate = $_POST['exam_date'];

    // Define an array of subjects
    $subjects = [
        'maths', 'english', 'biology', 'physics', 'chemistry', 'science',
        'geography', 'history', 'ict', 'accounting', 'religion',
        'homescience', 'programming', 'swahili', 'indig'
    ];

    // Initialize an array to store subject scores
    $subjectScores = [];
    $subjectCount = 0; // Count of subjects with valid scores
    $totalScore = 0; // Total score of subjects with valid scores

    foreach ($subjects as $subject) {
        $score = isset($_POST[$subject]) ? $_POST[$subject] : 'N/A';
        
        // Check if the score is not 'N/A', and if not, add it to the total score
        if ($score !== 'N/A') {
            $subjectScores[] = "$subject: $score";
            $scoreValue = intval($score);
            $totalScore += $scoreValue;
            $subjectCount++;
        }
    }

    // Calculate the average score based on subjects with valid scores
    $averageScore = $subjectCount > 0 ? $totalScore / $subjectCount : 0;

    // Calculate the grade based on the average score (you may have your own grading logic)
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

    // Update the record in the database
    $updateSql = "UPDATE exam_scores SET
                  student_name = '$studentName', 
                  exam_type = '$examType',
                  exam_date = '$examDate',
                  subjects_scores = '" . implode(", ", $subjectScores) . "',
                  average_score = $averageScore,
                  grade = '$grade'
                  WHERE id = $id";

if ($conn->query($updateSql) === TRUE) {
    // Fetch the updated record from the database
    $selectUpdatedSql = "SELECT * FROM exam_scores WHERE id = $id";
    $updatedResult = $conn->query($selectUpdatedSql);
    $updatedRow = $updatedResult->fetch_assoc();

    // Recalculate the average score for the updated record
    $updatedSubjectScores = explode(", ", $updatedRow["subjects_scores"]);
    $updatedTotalScore = 0;
    $updatedSubjectCount = 0;

    foreach ($updatedSubjectScores as $updatedSubjectScore) {
        list($subj, $subjScore) = explode(": ", $updatedSubjectScore);
        $score = intval($subjScore);

        // Check if the score is not 'N/A', and if not, add it to the total score
        if ($score !== 'N/A') {
            $updatedTotalScore += $score;
            $updatedSubjectCount++;
        }
    }

    // Calculate the updated average score
    $updatedAverageScore = $updatedSubjectCount > 0 ? $updatedTotalScore / $updatedSubjectCount : 0;

    // Update the average score in the database
    $updateAverageSql = "UPDATE exam_scores SET average_score = $updatedAverageScore WHERE id = $id";
    if ($conn->query($updateAverageSql) === TRUE) {
        header("Location: exam.php"); // Redirect back to the main page
        exit();
    } else {
        echo "Error updating average score: " . $conn->error;
    }
} else {
    echo "Error updating record: " . $conn->error;
}}

$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Fetch the existing record from the database
$selectSql = "SELECT * FROM exam_scores WHERE id = $id";
$result = $conn->query($selectSql);
$row = $result->fetch_assoc();

$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Exam Score</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <h1>Edit Exam Score</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <!-- Add fields for student name, student ID, and year of study -->
        <label for="studentName">Student Name:</label>
        <input type="text" id="studentName" name="studentName" class="form-control"
            value="<?php echo isset($row['student_name']) ? $row['student_name'] : ''; ?>"><br>

        <label for="exam_type">Exam Type</label>
        <input type="text" name="exam_type" value="<?php echo isset($row['exam_type']) ? $row['exam_type'] : ''; ?>"><br>

        <label for="exam_date">Exam Date</label>
        <input type="text" name="exam_date" value="<?php echo isset($row['exam_date']) ? $row['exam_date'] : ''; ?>"><br>

        <!-- Generate input fields for each subject score using array keys -->
        <?php
        $subjectScores = explode(", ", $row["subjects_scores"]);

        $subjects = [
            'maths', 'english', 'biology', 'physics', 'chemistry', 'science',
            'geography', 'history', 'ict', 'accounting', 'religion',
            'homescience', 'programming', 'swahili', 'indig'
        ];

        foreach ($subjects as $subject) {
            $score = "N/A"; // Default value if subject not found
            foreach ($subjectScores as $subjectScore) {
                list($subj, $subjScore) = explode(": ", $subjectScore);
                if ($subject === $subj) {
                    $score = $subjScore;
                }
            }
        ?>
            <label for="<?php echo $subject; ?>"><?php echo ucfirst($subject); ?></label>
            <input type="text" name="<?php echo $subject; ?>"
                value="<?php echo isset($score) ? $score : ''; ?>"><br>
        <?php } ?>

        <input type="submit" value="Save">
    </form>
</body>
</html>
