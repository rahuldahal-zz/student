<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Student</title>
    <link rel="stylesheet" href="view.css">
</head>

<body>
    <h1 id="sms_header">Student Management System</h1>
    <h1 id="info">Course Information <button onclick="return dashboard()">Dashboard</button></h1>
    <!-- use Goto Top for ease -->
    <?php
    include("connection.php");
    session_start();
    if (!$_SESSION["username"]) {
        header('location:index.php');
    }
    {
        $sql = "SELECT *FROM course_information;";
        $result = mysqli_query($connection, $sql) or die("Querry Failed! " . mysqli_error($connection));
        echo " <table border='1'>
                    <tr>
                    <th>Course Id</th>
                    <th>Course Name</th>
                    <th>Course Type</th>
                    <th>Credit Hour</th>";
        if ($_SESSION["role"] == '1') {
            // echo "<th>Update</th>";
            echo "<th>Delete</th>";
        }
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['course_id'] . "</td>";
            echo "<td>" . $row['course_name'] . "</td>";
            echo "<td>" . $row['course_type'] . "</td>";
            echo "<td>" . $row['credit_hour'] . "</td>";
            if ($_SESSION["role"] == '1') {
                // echo "<td> <a id='update' href=''>Update</td>";
                echo "<td> <a id='delete' href='delete_course.php? course_id=".$row['course_id']."' onclick = ' return deletec()'>Delete</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
    <script>
    function deletec(){
        return confirm("Confirm Delete?");
    }
    function dashboard(){
                window.location="dashboard.php";
        }
    </script>
</body>

</html>