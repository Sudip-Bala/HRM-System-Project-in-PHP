<?php
include 'db.php';

session_start();
if(!isset($_SESSION["user"])){
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <div class="container">
        <ul>
            <li><h2>Entry Form</h2></li>
            <li style="float:right"><h4>
            <a href="logout.php" class="btn btn-warning">Logout</a></h4>
            </li>
        </ul>
    <form action="insert_data.php" method="post">

        <div class="section">
            <h3>Company Information</h3>
            <label for="company_name">Company Name:</label>
            <input type="text" name="company_name" id="company_name" required>
        </div>

        <div class="section">
            <h3>Department Information</h3>
            <label for="department_name">Department Name:</label>
            <input type="text" name="department_name" id="department_name" required>
        </div>

        <div class="section">
            <h3>Designation Information</h3>
            <label for="designation_name">Title:</label>
            <input type="text" name="designation_name" id="designation_name" required>
        </div>

        <div class="section">
            <h3>Employee Information</h3>
            <label for="employee_name">Employee Name:</label>
            <input type="text" name="employee_name" id="employee_name" required>

            <label for="date_of_joining">Date of Joining:</label>
            <input type="date" name="date_of_joining" id="date_of_joining" required>

            <label for="salary">Salary:</label>
            <input type="number" name="salary" id="salary" step="0.01" required>
        </div>

        <div class="section">
            <h3>Increment Information</h3>
            <label for="date">Increment Date:</label>
            <input type="date" name="date" id="date" required>

            <label for="amount">Increment Amount:</label>
            <input type="number" name="amount" id="amount" step="0.01" required>
        </div>

        <input type="submit" value="Insert Data">
    </form>
</div>
</body>
</html>
