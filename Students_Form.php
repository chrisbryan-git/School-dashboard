<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">

    <style>
        body {
            background-color: whitesmoke;
            font-family:new times roman;
        }

        .container {
            box-shadow: 0px 0px 10px blue;
            padding: 70px;
            margin-top: 25px;
            
        }
        .form-control {
        width: 300px;
    }
    .form-select{
        width: 300px;
    }
    h2{
        text-align:center;
    }
    </style>
</head>
<body>
    <div class="container">
        <form action="connect_studentForm.php" method="post">
            <h2>Student registration form</h2>

            <h4>Student Details</h4>
            <div class="row">
                <div class="col-md-4">
                    <label for="studentname" class="form-label">Student Name</label>
                    <input type="text" class="form-control" id="studentname" name="studentname">
                </div>
                <div class="col-md-4">
                    <label for="dateofadmissionInput" class="form-label">Date Of Admission</label>
                    <input type="date" class="form-control" id="dateofadmissionInput" name="date_adm">
                </div>
                <div class="col-md-4">
                    <label for="subjects" class="form-label">Subjects To Be Taught</label>
                    <input type="text" class="form-control" id="subjects" name="subjects">
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="typeofprogram" class="form-label">Type of Program</label>
                    <input type="text" class="form-control" id="typeofprogram" name="typeofprogram">
                </div>
                <div class="col-md-4">
                    <label for="inputDepartment" class="form-label">Select Class</label>
                    <select id="inputDepartment" class="form-select" name="class">
                        <option selected>Select class</option>
                        <option value="Form one">Form One</option>
                        <option value="Form two">Form Two</option>
                    </select>
                </div>
            </div>

            <h4>Contact Information</h4>
            <div class="row">
                <div class="col-md-4">
                    <label for="parentName" class="form-label">Parent Name</label>
                    <input type="text" class="form-control" id="parentName" name="parentName">
                </div>
                <div class="col-md-4">
                    <label for="phonenumber" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone number">
                </div>
                <div class="col-md-4">
                    <label for="parentemail" class="form-label">Parent's Email</label>
                    <input type="email" class="form-control" id="parentemail" name="parentemail" placeholder="Optional">
                </div>
            </div>

            <h4>Address</h4>
            <div class="row">
                <div class="col-md-12">
                    <label for="locationaddress" class="form-label">Location</label>
                    <input type="text" class="form-control" id="locationaddress" name="locationaddress" placeholder="">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <a href="students.php" class="btn btn-secondary">Back</a>
                </div>
                <div class="col-md-6 text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script>
</body>

</html>
