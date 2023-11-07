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

    $teacherName = ucwords($_POST['teacherName']);
    $teacher_tsc = $_POST["teacher_tsc"];
    $personalId = $_POST["personalId"];

    
    $duplicateSql = "SELECT * FROM teacher_table WHERE personalId = '$personalId' OR teacher_tsc='$teacher_tsc' LIMIT 1";
    $result = $conn->query($duplicateSql);

    if ($result && $result->num_rows > 0) {
        echo "<script>alert('This entry already exists.'); window.history.back();</script>";
        exit();
    }
    
    $teacherName = $_POST["teacherName"];
    $residence = $_POST["residence"];
    $date_employed = $_POST["date_employed"];
    $personalId = $_POST["personalId"];
    $teacher_tsc = $_POST["teacher_tsc"];
    $mobilePhone = $_POST["mobilePhone"];
    $email = $_POST["email"];
    $subjectCombination = $_POST["subjectCombination"];
    $qualification = $_POST["qualification"];
    $gender = $_POST["gender"];
   

   
    $sql = "INSERT INTO teacher_table (teacherName, residence, date_employed, personalId, teacher_tsc, mobilePhone, email, subjectCombination, qualification,gender)
            VALUES ('$teacherName', '$residence','$date_employed', '$personalId', '$teacher_tsc', '$mobilePhone', '$email', '$subjectCombination', '$qualification','$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Successfully registered." . htmlspecialchars(ucwords($teacherName)) . "'); window.location.href='Teacher_form.php';</script>";
    } else {
        echo "<script>alert('Error entering the data. Try again!'); window.history.back();</script>";
    }

    $conn->close();
}
