<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cares tuition</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
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
        body{
            font-family:new times roman;
        }
        .table-wrapper {
          max-height: 600px;
          /* Adjust the height as per your requirement */
          overflow-y: scroll;
          overflow-x: scroll;
        }
        .table-container {
          overflow-x: auto;
          max-width: 100%;
        }
        .table {
          width: 80%;
          margin-top:20px;
          margin-left:20px;
          margin-right:20px;
        }
        .table thead {
          top: 0;
          background-color: #f7f7f7;
          z-index: 1;
          box-shadow:  0px 0.5px blue;
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
            <li><i class="fa-solid fa-calendar-days"></i><a href="essions.php">Sessions</a></li>
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
                <div class="search">
    <i class="fa fa-search" id="search-icon"></i>
    <input type="text" id="search-input" placeholder="Search by Teacher name">
    <button id="search-button">Search</button>
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

        <h3 id="header">Teacher Attendance List </h3>
        
        <div class="board" style="background-color: WhiteSmoke; box-shadow: 0px 0px 10px blue;">
        <div class="table-container">
         <div class="table-wrapper" id="attendance-table">
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

                    $sql = "SELECT id, teacherName, studentName, date, timeIn, timeOut, subject, topic, subtopic, comments FROM teacher_student_schedule";

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
                            echo '<td>';
                            echo '<a class="edit-btn" href="edit_attendance.php?id=' . $row['id'] . '">Edit</a>';
                            echo '<a class="delete-btn" href="delete_attendance.php?id=' . $row['id'] . '">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="9">No records found</td></tr>';
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
        </div>
        </div>
        <div id="search-results">
    <!-- Display search results here -->
</div>
   
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#search-button").click(function() {
            var searchTerm = $("#search-input").val();

            // Send the search term to the PHP script for processing
            $.ajax({
                type: "POST",
                url: "search_attendance.php",
                data: { search: searchTerm },
                success: function(response) {
                    $("#search-results").html(response);
                }
            });
        });
    });

    $(document).ready(function () {
            $("#search-button").click(function () {
                var searchTerm = $("#search-input").val();

                // Send the search term to the PHP script for processing
                $.ajax({
                    type: "POST",
                    url: "search_attendance.php",
                    data: { search: searchTerm },
                    success: function (response) {
                        $("#attendance-table").hide();
                        $("#search-results").html(response).show();
                    }
                });
            });
        });
</script>

    <script src="main.js"></script>
</body>
</html>
