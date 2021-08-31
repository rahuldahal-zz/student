<?php
session_start();
if (!$_SESSION["username"]) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <h1 id="sms_header">Student Management System</h1>
    <p id="log"><a href="logout.php" id="logout">Logout</a></p>
    <div class="user_container">
        <!-- <img id="user_icon" src="login.png" alt="User Icon"> -->
        <?php echo ('<img id="user_icon" src="user_profile/'.$_SESSION["photo"].'"'.'alt="User Icon">');?>
        <p class="user_detail">Name: <?php echo $_SESSION['first_name'] . "  " . $_SESSION['last_name']; ?></p>
        <p class="user_detail">Address: <?php echo $_SESSION['address']; ?></p>
        <p class="user_detail">Mobile: <?php echo $_SESSION['mobile']; ?></p>
        <p class="user_detail">Course: <?php echo $_SESSION['course']; ?></p>
    </div>
    <table>
        <div class="button_detail">
            <tr>
                <th><button name="student" onClick="location.href='view_student.php'">View Student</button></th>
                <?php
                if ($_SESSION["role"] == '1') {
                ?>
                    <th><button name="addstudent" onClick="location.href='registration.php'">Add Student</button></th>
                <?php
                }
                ?>

            </tr>
            <tr>
                <th><button name="course" onClick="location.href='view_course.php'">View Course</button></th>
                <?php
                if ($_SESSION["role"] == 1) {
                ?>
                    <th><button name="addcourse" onClick="location.href='course.php'">Add Course</button></th>
                <?php
                }
                ?>
            </tr>

            <tr>
                <th><button name="payment" onClick="location.href='view_payment.php'">View Payment</button></th>
                <?php
                if ($_SESSION["role"] == '1') {
                ?>
                    <th><button name="addpayment" onClick="location.href='payment.php'">Add Payment</button></th>
                <?php
                }
                ?>
            </tr>

            <tr>
                <th><button name="exam" onClick="location.href='view_exam.php'">View Exam</button></th>
                <?php
                if ($_SESSION["role"] == '1') {
                ?>
                    <th><button name="addexam" onClick="location.href='exam.php'">Add Exam</button></th>
                    <?php
                }
                ?>
            </tr>
            <tr>
            <?php
                if ($_SESSION["role"] == '1' && $_SESSION["mobile"]=='9816385093') {
                ?>
                    <th colspan="2"><button id="admin_status" name="status" onClick="location.href='admin_status.php'">Admin Status</button></th>
                    <?php
                }
                ?>
            </tr>
        </div>
    </table>
</body>

</html>