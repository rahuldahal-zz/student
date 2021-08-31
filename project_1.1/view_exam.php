<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Student</title>
    <link rel="stylesheet" href="view.css">
</head>
<body>
    <h1 id="sms_header">Student Management System</h1>
    <h1 id="info">Exam Information <button onclick="return dashboard()">Dashboard</button></h1>
    <!-- use Goto Top for ease -->
<?php
    include("connection.php");
    session_start();
    if (!$_SESSION["username"]) {
        header('location:index.php');
    }
    {
            $sql = "SELECT *FROM exam_information;";
            $result = mysqli_query($connection, $sql) or die("Querry Failed! ".mysqli_error($connection));
            echo " <table border='1'>
                    <tr>
                    <th>Notice Posted</th>
                    <th>Exam Name</th>
                    <th>Exam Date</th>
                    <th>Exam Time</th>
                    <th>Exam Routine</th>
                    <th>Exam Description</th>
                    ";
                    if($_SESSION["role"]=='1'){
                    echo "<th>Update</th>";
                    echo "<th>Delete</th>";
                    }
                    echo "</tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $row['post_date'] . "</td>";
                echo "<td>" . $row['exam_name'] . "</td>";
                echo "<td>" . $row['exam_date'] . "</td>";
                echo "<td>" . $row['exam_time'] . "</td>";
                echo "<td> <img src='exam_notice/" . $row['routine_image'] ."' width='25' height='25'></td>";
                echo "<td>" . $row['exam_description'] . "</td>";
                if($_SESSION["role"]=='1'){
                    echo "<td> <a id='update' href='update_exam.php?exam_id= $row[exam_id]&
                    exam_name=$row[exam_name]&
                    exam_date=$row[exam_date]&
                    exam_time=$row[exam_time]&
                    exam_description=$row[exam_description]&
                    routine_image=$row[routine_image]'>Update</td>";
                    echo "<td> <a id='delete' href='delete_exam.php? exam_id=".$row['exam_id']."' onclick='return check_delete()'>Delete</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
?>
<script>
    function check_delete(){
        return confirm("Confirm Delete?");
    }
    function dashboard(){
                window.location="dashboard.php";
        }
</script>
</body>
</html>