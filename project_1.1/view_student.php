<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Student</title>
    <link rel="stylesheet" href="view.css">
</head>
<body>
    <h1 id="sms_header">Student Management System</h1>
    <h1 id="info">User Information <button onclick="return dashboard()">Dashboard</button></h1>
    <!-- use Goto Top for ease -->
<?php
    include("connection.php");
    session_start();
    if (!$_SESSION["username"]) {
        header('location:index.php');
    }
    //------Query for Admin---------------//
    if($_SESSION["role"]=='1'){
            $sql = "SELECT
                        * FROM user_information;";
            $result = mysqli_query($connection, $sql) or die("Querry Failed! ".mysqli_error($connection));

            echo " <table border='1'>
                    <tr>
                    <th>user Id</th>
                    <th>User Name</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Semester</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Update</th>
                    <th>Delete</th>
                    </tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['first_name'] . "  ".  $row['last_name']."</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['course'] . "</td>";
                echo "<td>" . $row['semester'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td> <a id='update' href='update.php?first_name= $row[first_name]&
                            last_name=$row[last_name]&
                            gender=$row[gender]&
                            course=$row[course]&
                            semester=$row[semester]&
                            mobile=$row[mobile]&
                            user_id=$row[user_id]&
                            address=$row[address]&
                            email=$row[email]

                    '>Update</td>";
                echo "<td> <a id='delete' href='delete.php? user_id=".$row['user_id']."' onclick='return check_delete()'>Delete</td>";
                echo "</tr>";
            }
            
        }
        //------Query for Admin End---------------//

        //------Query for Student---------------//
        if($_SESSION["role"]=='2'){
            $sql = "SELECT
                        * FROM user_information
                        WHERE mobile=". $_SESSION['mobile'].
                            ";";
            $result = mysqli_query($connection, $sql) or die("Querry Failed! ".mysqli_error($connection));

            echo " <table border='1'>
                    <tr>
                    <th>User Id</th>
                    <th>User Name</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Semester</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Username</th>
                    <th>Email</th>
                    </tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['first_name'] . "  ".  $row['last_name']."</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['course'] . "</td>";
                echo "<td>" . $row['semester'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "</tr>";
            }
            
        }
        //------Query for Student End---------------//
        echo "</table>";
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