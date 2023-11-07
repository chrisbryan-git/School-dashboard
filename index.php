<!DOCTYPE html>
<html lang="en">

<link>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"></link>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
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
            <li><i class="fa fa-sign-out"></i><a href="logout.php">Log out</a></li>
            </div>
        </nav>
    </div>
 </section>
    
    <!-- Navbar -->
    <section id="navigation">
        <div class="navbar-brand">
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
                <img src="images\illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg" alt="Profile Picture">
                <div class="dropdown-content">
                    <a href="#">My Profile</a>
                    <a href="#">Settings</a>
                    <a href="#">Logout</a>
                </div>
            </div>
            </div>
        </div>
        </div>
    <h3 id="header">
        WELCOME TO CARES
    </h3>
   


    <div class="row">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Teachers</h4>
            <p>Total Teachers</p>
            <h2 class="numbers">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "school";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT COUNT(*) as total_teachers FROM teacher_table";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $totalStudents = $row["total_teachers"];
                    echo $totalStudents;
                } else {
                    echo "0";
                }
                $conn->close();
                ?>
            </h2>
        </div>
    </div>
    
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Students</h4>
            <p>Total students</p>
            <h2 class="numbers">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "school";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT COUNT(*) as total_students FROM students_table";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $totalStudents = $row["total_students"];
                    echo $totalStudents;
                } else {
                    echo "0";
                }
                $conn->close();
                ?>
            </h2>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Parents</h4>
            <p>Total Parents</p>
            <h2 class="numbers">
                <?php
// Database connection settings
$host = "localhost";
$user = "root";
$password = "";
$database = "school";

// Create a database connection
$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Query to count the total number of parents with non-empty parent names
$sql = "SELECT COUNT(*) AS total_parents FROM students_table WHERE parent_name IS NOT NULL AND parent_name != ''";


$result = $mysqli->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    $totalParents = $row['total_parents'];
    echo $totalParents;
} else {
    echo "Error executing query: " . $mysqli->error;
}

// Close the database connection
$mysqli->close();
?>

            </h2>
        </div>
    </div>
   </div>
    <!DOCTYPE html>
<html>
<head>
    <title>Student Information</title>
    <style>
        .edit-btn{
            padding: 5px 10px;
            background-color: #3498db;
            color: white;
            border: none;
            text-decoration: none;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 5px;
        } 
        .delete-btn {
            padding: 5px 10px;
            background-color: red;
            color: white;
            border: none;
            text-decoration: none;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 5px;
        }
        .table-wrapper {
          max-height: 400px;
          /* Adjust the height as per your requirement */
          overflow-y: scroll;
          overflow-x: scroll;
        }
        .table-container {
          overflow-x: auto;
          max-width: 100%;
        }
        .table {
          width: 100%; 
          /* margin-top:20px;  */
          /* margin-left:20px; */
          /* margin-right:20px; */
        }
        .table thead {
          top: 0;
          background-color: #f7f7f7;
          z-index: 1;
          box-shadow:  0px 0.5px blue;
          padding:50px;
        }
        .fas{
  font-size: 35px; 
  color: #FF0000; 
}

    </style>
</head>
<body>
    <div class="board" style="background-color: WhiteSmoke; box-shadow: 0px 0px 10px blue;">
    <div class="table-container">
         <div class="table-wrapper">
        <table class="table">
            <h4>students</h4>
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Student's Id</td>
                    <td>Class/form</td>
                    <td>Type of program</td>
                    <td>Subjects to be taught</td>
                    <td>Actions</td>
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

                
                $sql = "SELECT student_name, id, class, type_of_program, subjects_to_be_taught FROM students_table";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td class="students">';
                        echo '<i class="fas fa-user-graduate"></i>';
                         // echo '<img src="images/' . $row['id'] . '.png" alt="images/' . $row['id'] . '.png">';
                        echo '<div class="people">';
                        echo '<h5>' . $row['student_name'] . '</h5>';
                        echo '</div>';
                        echo '</td>';
                        echo '<td class="id">';
                        echo '<h5>' . $row['id'] . '</h5>';
                        echo '</td>';
                        echo '<td class="class">';
                        echo '<h5>' . $row['class'] . '</h5>';
                        echo '</td>';
                        echo '<td>';
                        echo '<h5>' . $row['type_of_program'] . '</h5>';
                        echo '</td>';
                        echo '<td>';
                        echo '<h5>' . $row['subjects_to_be_taught'] . '</h5>';
                        echo '</td>';
                        echo '<td>';
                        echo '<a class="edit-btn" href="edit_student.php?id=' . $row['id'] . '">Edit</a>';
                        echo '<a class="delete-btn" href="delete_student.php?id=' . $row['id'] . '">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="6">No students found</td></tr>';
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>
</body>
</html>




    </section>


    <script src="main.js"></script>
    
</body>

</html>