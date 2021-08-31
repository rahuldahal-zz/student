<?php
    session_start();
    if(!$_SESSION["username"]){
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Detail</title>
    <link rel="stylesheet" href="course.css">
</head>
<body>
    <h1 id="sms_header">Student Management System</h1>
    <div class="outer_container">
        <div class="inner_container">
        <fieldset id="fieldset">
        <legend><h2>Course Detail</h2></legend>
            <form action="course_sql.php" method="post">
                <label class="label">Course Name:</label><br/>
                <select class=course name="course_name">
                    <option value="BIM" selected="selected">BIM</option>
                    <option value="BCA">BCA</option>
                    <option value="BSC.CSIT">BSC.CSIT</option>
                    <option value="BHM">BHM</option>
                    <option value="BBS">BBS</option>
                </select><br/>
                <label class="label">Type:</label><br/>
                <select class=course_type name="course_type">
                    <option value="Information Technology" selected="selected">Information Technology</option>
                    <option value="Managent">Managent</option>
                </select><br/>
                <label class="label">Credit Hour:</label><br/>
                <input type="text" placeholder="Enter Credit Hour" name="credit_hr"/><br/>
                <input type="submit" name="course" value="Submit"/>
            </form>
            </fieldset>
        </div>
    </div>
</body>
</html>