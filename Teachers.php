<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <style>
        body{
            font-family:new times roman !important;
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
          /* width: 50%;
          margin-top:20px;
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
        .teacher-row.inactive {
          background-color: gray;
          color: darkgray;
        }
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
            Teachers
        </h3>


        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Active Teachers</h4>
                    <a href="#" class="btn btn-primary" id="showActive">Click me</a>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">inactive Teacher</h4>
                    <a href="#" class="btn btn-primary" id="showInactive">Click me</a>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Teacher</h4>
                    <a href="Teacher_form.php" class="btn btn-primary">Click me</a>
                </div>
            </div>
        </div>
        </div>

        <div class="board" style="background-color: WhiteSmoke; box-shadow: 0px 0px 10px blue;">
            <div class="table-container">
                <div class="table-wrapper">
                    <table class="table">
                        <h4>All Teachers</h4>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Teacher TSC</td>
                                <td>Personal ID</td>
                                <td>Gender</td>
                                <td>Mobile</td>
                                <td>Email</td>
                                <td>Date of Employment</td>
                                <td>Subject Combination</td>
                                <td>Qualification</td>
                                <td>Residence</td>
                                <td>inactive</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
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

                            // SQL query to retrieve data from teacher_table
                            $sql = "SELECT * FROM teacher_table";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr class='teacher-row'>";
                                    echo '<td class="students">';
                                    echo '<i class="fas fa-chalkboard-teacher" style="font-size: 25px; margin:15px; color: red;"></i>';
                                    echo '<div class="people">';
                                    echo '<h5>' . $row['teacherName'] . '</h5>';
                                    echo '</div>';
                                    echo '</td>';
                                    echo "<td>" . $row['teacher_tsc'] . "</td>";
                                    echo "<td>" . $row['personalId'] . "</td>";
                                    echo "<td>" . $row['gender'] . "</td>";
                                    echo "<td>" . $row['mobilePhone'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['date_employed'] . "</td>";
                                    echo "<td>" . $row['subjectCombination'] . "</td>";
                                    echo "<td>" . $row['qualification'] . "</td>";
                                    echo "<td>" . $row['residence'] . "</td>";
                                    echo "<td>";
                                    echo '<input type="checkbox" class="inactive-checkbox" data-teacher-id="' . $row['Id'] . '">';
                                    echo "</td>";
                                    echo '<td>';
                        echo '<a class="edit-btn" href="edit_teachers.php?id=' . $row['Id'] . '">Edit</a>';
                        echo '<a class="delete-btn" href="delete_teachers.php?id=' . $row['Id'] . '">Delete</a>';
                        echo '</td>';
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='11'>No teachers found</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    </section>
    <script>
        // Add an event listener for the checkbox change event
        const checkboxes = document.querySelectorAll('.inactive-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const teacherId = this.getAttribute('data-teacher-id');
                const isChecked = this.checked;
                
                // Save the checkbox state in local storage
                localStorage.setItem(`teacher_${teacherId}_inactive`, isChecked);
                
                // Add or remove a class to make the row inactive/active
                const row = this.closest('.teacher-row');
                if (isChecked) {
                    row.classList.add('inactive');
                } else {
                    row.classList.remove('inactive');
                }
            });
            
            // Check the local storage to set the initial checkbox state
            const teacherId = checkbox.getAttribute('data-teacher-id');
            const isChecked = localStorage.getItem(`teacher_${teacherId}_inactive`) === 'true';
            checkbox.checked = isChecked;
            
            // Add or remove a class to make the row inactive/active based on local storage
            const row = checkbox.closest('.teacher-row');
            if (isChecked) {
                row.classList.add('inactive');
            }
        });
    </script>
    <script>
        $(document).ready(function () {
    $('#showActive').click(function () {
        $('.teacher-row').show(); 

        $('.inactive-checkbox').each(function () {
            if ($(this).prop('checked')) {
                $(this).closest('.teacher-row').hide();
            }
        });
    });

});

$('#showInactive').click(function () {
        $('.teacher-row').hide(); 

        $('.inactive-checkbox').each(function () {
            if ($(this).prop('checked')) {
                $(this).closest('.teacher-row').show();
            }
        });
});

    </script>

    <script src="teachers.js"></script>
    <script src="main.js"></script>

</body>

</html>