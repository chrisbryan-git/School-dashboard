<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
    <style>
       form {
    margin-top: 20px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f7f7f7;
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 10px;
}

input[type="text"],
input[type="checkbox"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

.checkbox-label {
    display: inline-block;
    margin-left: 10px;
}

.checkbox-label input[type="checkbox"] {
    margin-left: 5px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 15px 20px;
    font-size: 18px;
    cursor: pointer;
    border-radius: 4px;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>
</head>

<body>

<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['teacher_id'];
    $teacherName = $_POST['teacherName'];
    $teacher_tsc = $_POST['teacher_tsc'];
    $personalId = $_POST['personalId'];
    $gender = $_POST['gender'];
    $mobilePhone = $_POST['mobilePhone'];
    $email = $_POST['email'];
    $date_employed = $_POST['date_employed'];
    $subjectCombination = $_POST['subjectCombination'];
    $qualification = $_POST['qualification'];
    $residence = $_POST['residence'];
    $isInactive = isset($_POST['isInactive']) ? 1 : 0;

    $sql = "UPDATE teacher_table SET 
            teacherName='$teacherName', 
            teacher_tsc='$teacher_tsc', 
            personalId='$personalId', 
            gender='$gender', 
            mobilePhone='$mobilePhone', 
            email='$email', 
            date_employed='$date_employed', 
            subjectCombination='$subjectCombination', 
            qualification='$qualification', 
            residence='$residence'
            WHERE Id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Student information updated successfully.";
        header("Location: Teachers.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM teacher_table WHERE Id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<h2>Edit Teacher</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="teacher_id" value="<?php echo $row['Id']; ?>">
    Teacher Name: <input type="text" name="teacherName" value="<?php echo $row['teacherName']; ?>"><br>
    Teacher TSC: <input type="text" name="teacher_tsc" value="<?php echo $row['teacher_tsc']; ?>"><br>
    Personal ID: <input type="text" name="personalId" value="<?php echo $row['personalId']; ?>"><br>
    Gender: <input type="text" name="gender" value="<?php echo $row['gender']; ?>"><br>
    Mobile: <input type="text" name="mobilePhone" value="<?php echo $row['mobilePhone']; ?>"><br>
    Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
    Date of Employment: <input type="text" name="date_employed" value="<?php echo $row['date_employed']; ?>"><br>
    Subject Combination: <input type="text" name="subjectCombination" value="<?php echo $row['subjectCombination']; ?>"><br>
    Qualification: <input type="text" name="qualification" value="<?php echo $row['qualification']; ?>"><br>
    Residence: <input type="text" name="residence" value="<?php echo $row['residence']; ?>"><br>
    <input type="submit" value="Update">
</form>

</body>
</html>
