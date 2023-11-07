<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "school";


$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


function sanitizeInput($input) {
    global $mysqli;
    return $mysqli->real_escape_string($input);
}


$sql = "SELECT id, title, description, file_path FROM form_data";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reports</title>
</head>
<body>
    <div class="board" style="background-color: WhiteSmoke; box-shadow: 0px 0px 10px blue;">
        <div class="table-container">
            <div class="table-wrapper">
                <table class="table">
                    <h4>Reports</h4>
                    <thead>
                        <tr>
                            <td>Title</td>
                            <td>Description</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                            echo '<td><a href="' . htmlspecialchars($row['file_path']) . '" target="_blank">View</a></td>';
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<?php
// Close the database connection
$mysqli->close();
?>
