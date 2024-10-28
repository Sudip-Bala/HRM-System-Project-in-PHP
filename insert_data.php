<?php
include 'db.php';

session_start();
if(!isset($_SESSION["user"])){
    header("location: login.php");
}

$company_name = $_POST['company_name'];
$department_name = $_POST['department_name'];
$designation_name = $_POST['designation_name'];
$employee_name = $_POST['employee_name'];
$salary = $_POST['salary'];
$date_of_joining = $_POST['date_of_joining'];
$amount = $_POST['amount'];
$date = $_POST['date'];


$conn->begin_transaction();

try {
    $sql1 = "INSERT INTO companies (name) VALUES ('$company_name')";
    $conn->query($sql1);
    $company_id = $conn->insert_id;

    $sql2 = "INSERT INTO departments (company_id, name) VALUES ('$company_id', '$department_name')";
    $conn->query($sql2);
    $department_id = $conn->insert_id;

    $sql3 = "INSERT INTO designations (department_id, name) VALUES ('$department_id', '$designation_name')";
    $conn->query($sql3);
    $designation_id = $conn->insert_id;

    $sql4 = "INSERT INTO employees (designation_id, name, salary,date_of_joining) VALUES ('$designation_id', '$employee_name', '$salary', '$date_of_joining')";
    $conn->query($sql4);
    $employee_id = $conn->insert_id;

    $new_salary = $salary + $amount;
    $sql5 = "INSERT INTO increments (employee_id, date, amount, new_salary) VALUES ('$employee_id', '$date', '$amount', '$new_salary')";
    $conn->query($sql5);

    $conn->commit();
    header("location: home.php");

} catch (Exception $e) {
    $conn->rollback();
    echo "Failed to insert data: " . $e->getMessage();
}

$conn->close();
?>