<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        
        form {
            margin: 30px 0px 30px 30px;
            padding: 10px;
            width: 90%;
        
            border-radius: 10px;
            background: var(--secondary);
        }


        
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        
        input[type="text"],
        textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        
        

        
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    
</head>

<body>

    <!-- Sidebar -->
    <section>
        <div class="sidebar">
            <nav>
                <a href="index.html" class="sidebar-brand">
                    <h3><i class="fa fa-user-edit me-2"></i>School</h3>
                </a>
                <div class="sidebar-menu">
            <li><i class="fa-solid fa-gauge sidebarBtn" ></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-graduation-cap" aria-hidden="true"></i><a href="students.php">Students</a></li>
            <li><i class="fas fa-chalkboard-teacher"></i><a href="Teachers.php">Teacher</a></li>
            <LI><i class="fa-solid fa-clipboard-user"></i><a href="Exam.php">Performance</a></LI>
            <li><i class="fa-solid fa-school"></i><a href="Attendance.php">Attendance</a></li>
            <li><i class="fa-solid fa-money-check-dollar"></i><a href="Fees.php">Fees/Invoices</a></li>
            <li><i class="fa-solid fa-book"></i><a href="subjects.php">Subjects</a></li>
            <li><i class="fa-regular fa-user"></i><a href="users.php">Users</a></li>
            <li><i class="fa-solid fa-calendar-days"></i><a href="Sessions.php">Sessions</a></li>
            <li><i class="fa fa-flag" aria-hidden="true"></i><a href="reports.php">Reports</a></li>
            <li><i class="fa fa-sign-out"></i><a href="login.php">Log out</a></li>
            </div>
        </nav>
            </nav>
        </div>
    </section>

    
    <section id="navigation">
        <!-- <div class="navbar-brand">
            <div class="nav">
                <div>
                    <i id="sidebar-btn" class="fas fa-bars"></i>
                </div>
                <div class="search">
                    <i class="fa fa-search"></i>
                    <input type="text" placeholder="search">
                </div>
            </div>
            <div class="profile">
            
                <div class="dropdown">
                    <a href="#"><i class="fa fa-envelope message_Icon"></i></a>
            
                    <div class="dropdown-content">
                        <h3>New Messages</h3><br>
                        <p>Hello! You have some new messages.</p>
                    </div>
                </div>
            
                <div class="dropdown">
                    <a href="#"><i class="fa fa-bell notifications"></i></a>
                    <div class="dropdown-content">
                        <h3>New notifications</h3>
                    </div>
                </div>
                <div class="dropdown">
                    <img src="images\illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg"
                        alt="Profile Picture">
                    <div class="dropdown-content">
                        <a href="#">My Profile</a>
                        <a href="#">Settings</a>
                        <a href="#">Logout</a>
                    </div>
                </div>
            </div>
            </div>
            </div>
            Navbar -->

        <h3 id="header">
            Reports
        </h3>


            <!-- <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add a report</h4>
                    <a href="#" class="btn btn-primary" id="add">Click me</a>
                </div>
            </div>
        </div>
        </div> -->
      

        </div>
        </div>

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
    <style>
.board {
    background-color: WhiteSmoke;
    box-shadow: 0px 0px 10px blue;
    padding: 20px; 
}


.table-container {
    overflow-x: auto; /* Enable horizontal scrolling if table overflows */
}

/* Styles for the table itself */
.table {
    width: 100%;
    border-collapse: collapse;
    
    margin-top: 10px; 
}


.table th {
    background-color: #f2f2f2;
    text-align: left;
    padding: 10px;
}


.table td {
    padding: 10px;
    
}


.table td:last-child {
    text-align: center;
}


.table td:last-child a {
    text-decoration: none;
    color: blue;
}


.table td:last-child a:hover {
    text-decoration: underline;
}
.button {
    display: inline-block;
    padding: 8px 16px;
    background-color: darkgrey;
    color: WhiteSmoke;
    border: none;
    border-radius: 4px;
    text-align: center;
    text-decoration: none;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.button:hover {
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

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT student_name, average_score as avg_score FROM exam_scores GROUP BY student_name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "No data found";
}

$labels = array();
$values = array();

foreach ($data as $row) {
    $labels[] = $row['student_name'];
    $values[] = $row['avg_score'];
}

$labels_json = json_encode($labels);
$values_json = json_encode($values);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Analysis Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="board" style="background-color: WhiteSmoke; box-shadow: 0px 0px 10px blue;">
    <div class="container mt-4">
        <h1>Student Analysis Report</h1>
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>

    <script>
        var labels = <?php echo $labels_json; ?>;
        var values = <?php echo $values_json; ?>;

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Average Exam Score',
                    data: values,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {}
        });
    </script>
</div>
</body>
</html>

    </section>

    <script src="main.js"></script>

</body>

</html> 