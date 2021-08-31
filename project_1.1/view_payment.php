<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Student</title>
    <link rel="stylesheet" href="view.css">
</head>
<body>
    <h1 id="sms_header">Student Management System</h1>
    <h1 id="info">Payment Information <button onclick="return dashboard()">Dashboard</button></h1>
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
                        s.user_id, s.first_name, s.last_name,
                        s.mobile, p.payer_first_name,
                        p.payer_last_name, p.paid_date, p.amount,
                        p.payment_id, p.student_mobile
                        FROM user_information s
                        INNER JOIN payment_information p
                        ON s.mobile = p.student_mobile;";
            $result = mysqli_query($connection, $sql) or die("Querry Failed! ".mysqli_error($connection));

            echo " <table border='1'>
                    <tr>
                    <th>User Id</th>
                    <th>Paid Date</th>
                    <th>Student Name</th>
                    <th>Mobile</th>
                    <th>Amount</th>
                    <th>Payer Name</th>
                    <th>Update</th>
                    <th>Delete</th>
                    </tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['paid_date'] . "</td>";
                echo "<td>" . $row['first_name'] . "  ".  $row['last_name']."</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "<td>" . $row['payer_first_name'] . "  ".  $row['payer_last_name']."</td>";
                echo "<td> <a id='update' href='update_payment.php?&
                            payment_id= $row[payment_id]&
                            payer_first_name=$row[payer_first_name]&
                            payer_last_name=$row[payer_last_name]&
                            student_mobile=$row[student_mobile]&
                            amount=$row[amount]'>Update</td>";
                echo "<td> <a id='delete' href='delete_payment.php? payment_id=".$row['payment_id']."' onclick='return check_delete()'>Delete</td>";
                echo "</tr>";
            }
            
        }
        //------Query for Admin End---------------//
        //------Query for Student---------------//
        if($_SESSION["role"]=='2'){
                $sql = "SELECT
                            s.user_id, s.first_name, s.last_name,
                            s.mobile, p.payer_first_name,
                            p.payer_last_name, p.paid_date, p.amount
                            FROM user_information s
                            INNER JOIN payment_information p
                            ON s.mobile = p.student_mobile
                            WHERE s.mobile=". $_SESSION['mobile'].
                            ";";
                $result = mysqli_query($connection, $sql) or die("Querry Failed! ".mysqli_error($connection));

                echo " <table border='1'>
                    <tr>
                    <th>User Id</th>
                    <th>Paid Date</th>
                    <th>Student Name</th>
                    <th>mobile</th>
                    <th>Amount</th>
                    <th>Payer Name</th>
                    </tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['paid_date'] . "</td>";
                echo "<td>" . $row['first_name'] . "  ".  $row['last_name']."</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "<td>" . $row['payer_first_name'] . "  ".  $row['payer_last_name']."</td>";
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