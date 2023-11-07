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
    <i class="fa fa-search" id="search-icon"></i>
    <input type="text" id="search-input" placeholder="Search by Student name">
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
        <h3 id="header">
            Performance
        </h3>

        <div class="row">
            <div class="card" id="add-scores-card">
                <div class="card-body">
                    <h4 class="card-title">Add scores</h4>
                    <button id="toggle-form-button" class="btn btn-primary">Click me</button>
                </div>
            </div>

            <div class="card" id="view-performance">
              <div class="card-body">
                <h4 class="card-title">View Performance</h4>
                <button id="toggle-table-button" class="btn btn-primary">Click me</button>
              </div>
            </div>
          </div>
        </div>

        <hr style="height: 5px; background-color: blue;">

<!DOCTYPE html>
<head>
<style>
    form {
        background-color: WhiteSmoke;
        padding: 20px;
        box-shadow: 0 0 15px blue;
        border-radius: 10px;
        margin: 45px 20px;
        height: 400px;
        overflow-y: scroll;
    }
    h2, h4 {
        text-align: center;
        margin-top: 20px;
        margin-bottom: 10px;
    }
    
    label {
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .btn-primary {
        background-color: #007bff; 
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

</style>
</head>
<body> 
<div class="form" id="score-form">
<div class="card-body">
<form method="post" action="connect_exam_form.php" >
<h2>Enter Students scores</h2>

<div class="row">
    <?php
    // Step 1: Database connection configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Step 2: Fetch student names and IDs from the database
    $sql = "SELECT id, student_name FROM students_table"; 
    $result = $conn->query($sql);
    ?>

    <div class="row">
        <div class="col-md-6">
            <label for="studentName">Student Name:</label>
            <input type="hidden" id="studentId" name="studentId" value="" />
            <select id="studentName" name="studentName" class="form-control" required>
                <option value="" disabled selected>Choose a student</option>

                <?php
                // Step 3: Dynamically generate <option> elements
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Add the student ID as a data attribute
                        echo '<option value="' . $row['student_name'] . '" data-student-id="' . $row['id'] . '">' . $row['student_name'] . '</option>';
                    }
                }
                ?>

            </select>
    </div>
</div>

<?php
// Close the database connection
$conn->close();
?>
        <div class="col-md-6">
          <label for="yearOfStudy">Year of Study:</label>
          <input type="text" id="yearOfStudy" name="yearOfStudy" class="form-control" required>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label for="date">Date:</label>
          <input type="date" id="date" name="date" class="form-control" required>
          <script>
            const dateInput = document.getElementById('date');
            const currentDate = new Date().toISOString().split('T')[0];
            dateInput.value = currentDate;
          </script>
        </div>
        <div class="col-md-6">
          <label for="examType">Exam Type:</label>
          <select id="examType" name="examType" class="form-control" required>
            <option value="">Select Exam Type</option>
            <option value="Opener Exam">Opener Exam</option>
            <option value="CAT 1 Exam">CAT 1 Exam</option>
            <option value="CAT 2 Exam">CAT 2 Exam</option>
            <option value="CAT 3 Exam">CAT 3 Exam</option>
            <option value="Term 1 Exam">Term 1 Exam</option>
            <option value="Term 2 Exam">Term 2 Exam</option>
            <option value="Term 3 Exam">Term 3 Exam</option>
            <option value="Mock Exam">Mock Exam</option>
            <option value="Admission Exam">Admission Exam</option>
            <option value="Internal Exams">Internal Exams</option>
            
          </select>
        </div>
      </div>

      <h4>Subject Scores</h4>

      <div class="row">
        <div class="col-md-4">
          <label for="maths">Mathematics:</label>
          <input type="number" id="maths" name="maths" class="form-control" min="0" max="100">
          <label for="maths_na">N/A <input type="checkbox" id="maths_na" name="maths_na"></label>
        </div>
        <div class="col-md-4">
          <label for="english">English:</label>
          <input type="number" id="english" name="english" class="form-control" min="0" max="100">
          <label for="english_na">N/A <input type="checkbox" id="english_na" name="english_na"></label>
        </div>
        <div class="col-md-4">
          <label for="biology">Biology:</label>
          <input type="number" id="biology" name="biology" class="form-control" min="0" max="100">
          <label for="biology_na">N/A <input type="checkbox" id="biology_na" name="biology_na"></label>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="physics">Physics:</label>
          <input type="number" id="physics" name="physics" class="form-control" min="0" max="100">
          <label for="physics_na">N/A <input type="checkbox" id="physics_na" name="physics_na"></label>
        </div>
        <div class="col-md-4">
          <label for="chemistry">Chemistry:</label>
          <input type="number" id="chemistry" name="chemistry" class="form-control" min="0" max="100">
          <label for="chemistry_na">N/A <input type="checkbox" id="chemistry_na" name="chemistry_na"></label>
        </div>
        <div class="col-md-4">
          <label for="science">Science:</label>
          <input type="number" id="science" name="science" class="form-control" min="0" max="100">
          <label for="science_na">N/A <input type="checkbox" id="science_na" name="science_na"></label>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="geography">Geography:</label>
          <input type="number" id="geography" name="geography" class="form-control" min="0" max="100">
          <label for="geography_na">N/A <input type="checkbox" id="geography_na" name="geography_na"></label>
        </div>
        <div class="col-md-4">
          <label for="history">History:</label>
          <input type="number" id="history" name="history" class="form-control" min="0" max="100">
          <label for="history_na">N/A <input type="checkbox" id="history_na" name="history_na"></label>
        </div>
        <div class="col-md-4">
          <label for="ict">ICT/Computer Science:</label>
          <input type="number" id="ict" name="ict" class="form-control" min="0" max="100">
          <label for="ict_na">N/A <input type="checkbox" id="ict_na" name="ict_na"></label>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="accounting">B.Studies/Accounting:</label>
          <input type="number" id="accounting" name="accounting" class="form-control" min="0" max="100">
          <label for="accounting_na">N/A <input type="checkbox" id="accounting_na" name="accounting_na"></label>
        </div>
        <div class="col-md-4">
          <label for="religion">Religion:</label>
          <input type="number" id="religion" name="religion" class="form-control" min="0" max="100">
          <label for="religion_na">N/A <input type="checkbox" id="religion_na" name="religion_na"></label>
        </div>
        <div class="col-md-4">
          <label for="homescience">Home Science:</label>
          <input type="number" id="homescience" name="homescience" class="form-control" min="0" max="100">
          <label for="homescience_na">N/A <input type="checkbox" id="homescience_na" name="homescience_na"></label>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="programming">Programming:</label>
          <input type="number" id="programming" name="programming" class="form-control" min="0" max="100">
          <label for="programming_na">N/A <input type="checkbox" id="programming_na" name="programming_na"></label>
        </div>
        <div class="col-md-4">
          <label for="swahili">Swahili:</label>
          <input type="number" id="swahili" name="swahili" class="form-control" min="0" max="100">
          <label for="swahili_na">N/A <input type="checkbox" id="swahili_na" name="swahili_na"></label>
        </div>
        <div class="col-md-4">
          <label for="indig">Indigenous/Foreign Lang.:</label>
          <input type="number" id="indig" name="indig" class="form-control" min="0" max="100">
          <label for="indig_na">N/A <input type="checkbox" id="indig_na" name="indig_na"></label>
        </div>
      </div>

      <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
    </div>
    </div>
    <script>
    const studentNameSelect = document.getElementById('studentName');
    const studentIdInput = document.getElementById('studentId');

    studentNameSelect.addEventListener('change', function() {
        
        const selectedOption = studentNameSelect.options[studentNameSelect.selectedIndex];

        const studentId = selectedOption.getAttribute('data-student-id');

        // Update the hidden input field with the student ID
        studentIdInput.value = studentId;
    });
</script>

    </body>
    </html>

    
<!DOCTYPE html>
<html>
<head>
    <style>
        .board{
            background-color: WhiteSmoke;
            box-shadow: 0px 0px 10px blue;
            display: block; /* Changed to "block" to make it initially visible */
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
        .print-btn{
          padding: 5px 10px;
            background-color: grey;
            color: white;
            border: none;
            text-decoration: none;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 5px;
        }
        .table-wrapper {
          max-height: 400px;
          overflow-y: scroll;
          overflow-x: scroll;
        }
        .table-container {
          overflow-x: auto;
          max-width: 100%;
        }
        .table {
          width: 100%;
        }
        .table thead {
          position: sticky;
          top: 0;
          background-color: #f7f7f7;
          z-index: 1;
          box-shadow: 0px 0.5px blue;
          padding: 50px;
        }
        .fas{
            font-size: 35px;
            color: #FF0000; 
        }
    </style>
</head>
<body>
    <div class="board">
        <div class="table-container">
            <div class="table-wrapper">
                <table class="table">
                    <h4>Results</h4>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Exam type</td>
                            <td>Date</td>
                            <td>Maths</td>
                            <td>English</td>
                            <td>Biology</td>
                            <td>Physics</td>
                            <td>Chemistry</td>
                            <td>Science</td>
                            <td>Geography</td>
                            <td>History</td>
                            <td>ICT/Computer Science</td>
                            <td>B.Studies/Accounting</td>
                            <td>Religion</td>
                            <td>Home Science</td>
                            <td>Programming</td>
                            <td>Swahili</td>
                            <td>Indigenous/Foreign Lang</td>
                            <td>Grade</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    // Database connection configuration
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "school";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Assuming you have an "exam_scores" table with appropriate columns

                    $sql = "SELECT * FROM exam_scores";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["student_name"] . "</td>";
                            echo "<td>" . $row["exam_type"] . "</td>";
                            echo "<td>" . $row["exam_date"] . "</td>";

                            // Retrieve subject scores from the database
                            $subjectScores = explode(", ", $row["subjects_scores"]);

                            // Loop through the subjects and display scores
                            $subjects = [
                                "maths", "english", "biology", "physics", "chemistry", "science",
                                "geography", "history", "ict", "accounting", "religion",
                                "homescience", "programming", "swahili", "indig"
                            ];

                            foreach ($subjects as $subject) {
                                $score = "N/A"; // Default value if subject not found
                                foreach ($subjectScores as $subjectScore) {
                                    list($subj, $subjScore) = explode(": ", $subjectScore);
                                    if ($subject === $subj) {
                                        $score = $subjScore;
                                        break;
                                    }
                                }
                                echo "<td>" . $score . "</td>";
                            }

                            echo "<td>" . $row["grade"] . "</td>";
                            echo '<td>';
                            echo '<a class="edit-btn" href="edit_exam.php?id=' . $row['id'] . '">Edit</a>';
                            echo '<a class="delete-btn" href="delete_exam.php?id=' . $row['id'] . '">Delete</a>';
                            echo '<a class="print-btn" href="print_results.php?id=' . $row['id'] . '">Print</a>';
                            echo '</td>';
                            echo "</tr>";
                        }
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

<div id="search-results">
    <!-- Display search results here -->
</div>



</div>
</div>
</body>
</html>
    </section>
    <script>
    
            $("#search-button").click(function () {
                var searchTerm = $("#search-input").val();

                // Use AJAX to send the search term to the server
                $.ajax({
                    type: "POST",
                    url: "search_performance.php", // Create this PHP file for handling the search
                    data: { searchTerm: searchTerm },
                    success: function (data) {
                        // Replace the content of the result container with the search results
                        $("#search-results").html(data);

                        // Hide form and table
                        $("#score-form").hide();
                        $("#board").hide();
                    }
                });
            });
    </script>
    
      <script src="exam.js"></script>
      <script src="main.js"></script>
    </body>
    </html>