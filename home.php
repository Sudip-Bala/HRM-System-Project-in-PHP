<?php
include 'db.php';

session_start();
if(!isset($_SESSION["user"])){
    header("location: login.php");
}
?>

<link rel="stylesheet" type="text/css" href="styles.css">

<ul>
  <li><h2>Company Name</h2></li>
  <li style="float:right"><h4>
    <a href="logout.php" class="btn btn-warning">Logout</a></h4>
  </li>
  <li style="float:right"><h4>
    <a href="create.php" class="btn btn-warning">Add New</a></h4>
  </li>
  
</ul>

<?php
$sql =  "SELECT companies.name AS company_name, departments.name AS department_name,    designations.name AS designation_name, employees.id AS employee_id, 
        employees.name AS employee_name, employees.salary AS employee_salary,
        employees.date_of_joining AS date_of_joining, increments.amount AS increment, 
        increments.new_salary AS new_salary, increments.date AS inc_date
        FROM companies
        JOIN departments ON companies.id = departments.company_id
        JOIN designations ON departments.id = designations.department_id
        JOIN employees ON designations.id = employees.designation_id
        JOIN increments ON employees.id = increments.employee_id";

$result = $conn->query($sql); ?>

    <table>
    <tr>
            <th>Company Name</th>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Salary</th>
            <th>DOJ</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Increment</th>
            <th>New Salary</th>
            <th>Inc. Date</th>
          </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
                <td><?= $row["company_name"] ?></td>
                <td><?= $row["employee_id"]?></td>
                <td><?= $row["employee_name"]?></td>
                <td><?= $row["employee_salary"]?></td>
                <td><?= $row["date_of_joining"]?></td>
                <td><?= $row["department_name"]?></td>
                <td><?= $row["designation_name"]?></td>
                <td><?= $row["increment"]?></td>
                <td><?= $row["new_salary"]?></td>
                <td><?= $row["inc_date"]?></td>
              </tr>
    <?php endwhile; ?>
</table>