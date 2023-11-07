<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cares tuition</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <style>
        body{
            font-family:new times roman;
        }
        .fas{
            color:red;
            font-size:25px;
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
          /* margin-top:20px;
          margin-left:20px;
          margin-right:20px; */
        }
      
        .table thead {
          top: 0;
          background-color: #f7f7f7;
          z-index: 1;
          box-shadow: 1px 1px 1px pink;
          padding:50px;
        }
        
    </style>
       
</head>

<body>

    <!-- Sidebar -->
    <section>
        <div class="sidebar">
            <nav>
                <a href="index.html" class="sidebar-brand">
                    <h3><i class="fa fa-user-edit me-2"></i>Cares Tuition</h3>
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

    <!-- Navbar -->
    <section id="navigation">
        <div class="navbar-brand">
            <div class="nav">
                <div>
                    <i id="sidebar-btn" class="fas fa-bars"></i>
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
        
        <h3 id="header">
            Sessions
        </h3>

    
        
       
        <?php
// require('teacher_session_count.php');
$conn = new mysqli('localhost', 'root', '', 'school');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// count records with  same name
$sql = "SELECT teacherName, COUNT(*) as count FROM teacher_table GROUP BY teacherName";
$result = $conn->query($sql);

?>

    <div class="board" style="background-color: WhiteSmoke; box-shadow: 0px 0px 10px blue;">
    <div class="table-container">
       <div class="table-wrapper">
        <table class="table">
        <h4>Teacher's Session</h4>
        <thead>
            <tr>
            <th>Teacher's Name</th>
            <th>Number Of Lessons</th>
            <th>Total Amount Earned</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><i class='fas fa-chalkboard-teacher'></i> " . $row["teacherName"] . "</td>";
                    echo "<td>" . $row["count"] . "</td>";
                    echo "<td>" . $row["count"]*1000 . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No records in the table.</td></tr>";
            }
            
            ?>
        </tbody>
    </table>
</div>
</div>
</div>

<script>
document.addEventListener('input', function(event) {
    if (event.target.classList.contains('rate-input')) {
        const rateInput = event.target;
        const lessonCount = rateInput.dataset.lesson;
        const rowId = rateInput.dataset.rowId;
        const ratePerLesson = rateInput.value;
        const totalAmountElement = document.querySelector(`.total-amount[data-row-id='${rowId}']`);
        
        if (ratePerLesson && !isNaN(ratePerLesson)) {
            const totalAmount = parseFloat(lessonCount) * parseFloat(ratePerLesson);
            totalAmountElement.textContent = totalAmount.toFixed(2);
        } else {
            totalAmountElement.textContent = "Invalid Input";
        }
    }
});
</script>

</body>
</html>

<?php
$conn->close();
?>


        
        
    </section>

    <script src="main.js"></script>

</body>

</html>