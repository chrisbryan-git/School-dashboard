<?php
// change the password to suite your db
// also create a corresponding table with respective field names for this task
$conn = new mysqli('localhost', 'root', '', 'school');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// count records with  same name
$sql = "SELECT teacherName, COUNT(*) as count FROM teacher_session_table GROUP BY teacherName";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>teacher_sessions</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{
            background-color: whitesmoke;
            font-family:'new times roman';
        }
        table{
            margin-top:20px;
            box-shadow: 0 0 10px blue;
            padding: 20px;
            }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>Teacher Sessions</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Teacher's Name</th>
                    <th>Number Of Lessons</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["teacherName"] . "</td>";
                    echo "<td>" . $row["count"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No records in the table.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
