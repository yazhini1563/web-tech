<?php
// Step 1: Connect to MySQL
$servername = "localhost";
$username = "root";
$password = ""; // Update if needed
$dbname = "company_db"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Step 2: Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 3: Create employee table if not exists
$createTableSQL = "CREATE TABLE IF NOT EXISTS employee (
    emp_no INT PRIMARY KEY,
    emp_name VARCHAR(100),
    date_of_join DATE,
    salary DECIMAL(10,2),
    designation VARCHAR(50)
)";
$conn->query($createTableSQL);

// Step 4: Fetch employee data
$sql = "SELECT emp_no, emp_name, date_of_join, salary, designation FROM employee";
$result = $conn->query($sql);

// Step 5: Display in HTML table
echo "<h2>Employee Details</h2>";
echo "<table border='1' cellpadding='10'>
        <tr>
            <th>Emp No</th>
            <th>Name</th>
            <th>Date of Join</th>
            <th>Salary</th>
            <th>Designation</th>
        </tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['emp_no']}</td>
                <td>{$row['emp_name']}</td>
                <td>{$row['date_of_join']}</td>
                <td>{$row['salary']}</td>
                <td>{$row['designation']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No employee records found</td></tr>";
}

echo "</table>";

// Step 6: Close connection
$conn->close();
?>
