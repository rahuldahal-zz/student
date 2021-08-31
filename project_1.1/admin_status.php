<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Status</title>
    <link rel="stylesheet" href="view.css">
</head>
<body>
    <h1 id="sms_header">Student Management System</h1>
    <h1 id="info">Admin Status<button onclick="return dashboard()">Dashboard</button></h1>
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
                        * FROM user_information
                        WHERE role = 1 AND mobile != 9816385093;";
            $result = mysqli_query($connection, $sql) or die("Querry Failed! ".mysqli_error($connection));
            echo " <table border='1'>
                    <tr>
                    <th>user Id</th>
                    <th>User Name</th>
                    <th>Gender</th>
                    <th>Mobile</th>
                    <th>Username</th>
                    <th>Status</th>
                    </tr>";
            while($row = mysqli_fetch_assoc($result)){
                $_SESSION['status']=$row['status'];
                $_SESSION['user_id']=$row['user_id'];
                echo "<tr>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['first_name'] . "  ".  $row['last_name']."</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                if($_SESSION['status']==1){
                    echo "<td><a style=\"color:green\" href='admin_active.php? user_id=".$row['user_id']."'>Active</a></td>";
                }else{
                    echo "<td><a style=\"color:red\" href='admin_deactive.php? user_id=".$row['user_id']."'>Deactive</a></td>";
                }
                echo "</tr>";
            }
            
        }
        echo "</table>";
    //------Query for Admin Status End---------------//

?>
    <script>
        function dashboard(){
                window.location="dashboard.php";
        }
    </script>
</body>
</html>