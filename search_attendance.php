<div class="board" style="background-color: WhiteSmoke; box-shadow: 0px 0px 10px blue;">
        <div class="table-container">
         <div class="table-wrapper">
        <table class="table">
                <thead>
                    <tr>
                        <th>Id</td>
                        <th>TEACHER NAME</th>
                        <th>STUDENT NAME</th>
                        <th>DATE</th>
                        <th>TIME IN</th>
                        <th>TIME OUT</th>
                        <th>SUBJECT</th>
                        <th>TOPIC</td>
                        <th>SUBTOPIC</th>
                        <th>COMMENTS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$searchValue = $_POST['search'];

$sql = "SELECT id, teacherName, studentName, date, timeIn, timeOut, subject, topic, subtopic, comments FROM teacher_student_schedule WHERE teacherName LIKE '%$searchValue%' OR id = '$searchValue'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['teacherName'] . '</td>';
        echo '<td>' . $row['studentName'] . '</td>';
        echo '<td>' . $row['date'] . '</td>';
        echo '<td>' . $row['timeIn'] . '</td>';
        echo '<td>' . $row['timeOut'] . '</td>';
        echo '<td>' . $row['subject'] . '</td>';
        echo '<td>' . $row['topic'] . '</td>';
        echo '<td>' . $row['subtopic'] . '</td>';
        echo '<td>' . $row['comments'] . '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="11">No records found</td></tr>';
}

$conn->close();
?>
