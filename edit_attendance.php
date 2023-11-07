<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission and update the record in the database
    $id = $_POST['id'];
    $teacherName = $_POST['teacher_name'];
    $studentName = $_POST['student_name'];
    $date = $_POST['date'];
    $timeIn = $_POST['time_in'];
    $timeOut = $_POST['time_out'];
    $subject = $_POST['subject'];
    $topic = $_POST['topic'];
    $subtopic = $_POST['subtopic'];
    $teacherComments = $_POST['teacher_comments'];

    $updateSql = "UPDATE teacher_student_schedule SET
                  teacher_name = '$teacherName',
                  student_name = '$studentName',
                  date = '$date',
                  time_in = '$timeIn',
                  time_out = '$timeOut',
                  subject = '$subject',
                  topic = '$topic',
                  subtopic = '$subtopic',
                  teacher_comments = '$teacherComments'
                  WHERE id = $id";

    if ($conn->query($updateSql) === TRUE) {
        header("Location: attendance.php"); // Redirect back to the main page
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$id = $_GET['id']; // Get the ID from the URL parameter

// Fetch the existing record from the database
$selectSql = "SELECT * FROM teacher_student_schedule WHERE id = $id";
$result = $conn->query($selectSql);
$row = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Attendance</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    body{
        font-family:new times roman;
    }
    .form-control{
        padding:5px;
        float: left;

    }
    .form-label {
            display: block;
            padding:5px;
    }
    .container{
        display: block;
        padding:40px;
        box-shadow: 0.5px 0.5px 0.5px blue;
        

    }
    h1{
        text-align:center;
        padding:20px;
    }
</style>
    
</head>
<body>
    
    
    <div class="container">
    <h1>Edit Attendance</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="row">
       <div class="col">
        <label class="form-label" for="Teacher name">Teacher Name</label>
         <input type="text" name="teacher_name" class="form-control" value="<?php echo $row['teacher_name']; ?>">
         </div>

         <div class="col">
         <label class="form-label" for="Student Name">Student Name</label>
        <input type="text" name="student_name" class="form-control" value="<?php echo $row['student_name']; ?>">
        </div>
         </div>

         <div class="row">
            <div class="col">
            <label class="form-label" for="Date">Date</label>
         <input type="text" class="form-control" name="date" value="<?php echo $row['date']; ?>">
         </div>

         <div class="col">
         <label class="form-label" for="Time in">Time in</label>
         <input type="text" class="form-control" name="time_in" value="<?php echo $row['time_in']; ?>"><br>
        </div>
        </div>


      <div class="row">
        <div class="col">
        <label class="form-label" for="Time out">Time out</label>
         <input type="text" class="form-control" name="time_out" value="<?php echo $row['time_out']; ?>">
        </div>
        <div class="col">
        <label class="form-label" for="Subject">Subject</label>
         <input type="text" class="form-control" name="subject" value="<?php echo $row['subject']; ?>">
        </div>
        </div>

        <div class="row">
            <div class="col">
        <label class="form-label" for="Topic">Topic</label>
        <input type="text" class="form-control" name="topic" value="<?php echo $row['topic']; ?>">
        </div>

        <div class="col">
        <label class="form-label" for="Subtopic">Subtopic</label>
        <input type="text" class="form-control" name="subtopic" value="<?php echo $row['subtopic']; ?>">
        </div>
        </div>
        <div class="row">
        <div class="col">
        <label class="form-label" for="Teacher Comments">Teacher Comments</label>
        <input type="text" class="form-control" name="teacher_comments" value="<?php echo $row['teacher_comments']; ?>">
        </div>
        <div class="col">
        <label class="form-label" for=""></label>
        <input type="submit" class="btn btn-primary" value="Save">
        </div>
        </div>
    </form>
    </div>
</body>
</html>
