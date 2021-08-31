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
    <title>Exam Detail</title>
    <link rel="stylesheet" href="course.css">
</head>
<body>
    <h1 id="sms_header">Student Management System</h1>
    <div class="outer_container">
        <div class="inner_container">
        <fieldset id="fieldset">
        <legend><h2>Exam Detail</h2></legend>
            <form action="exam_sql.php" method="post" name="exam_form" enctype="multipart/form-data">
                <label class="label">Exam Name:</label><br/>
                <input type="text" placeholder="Enter Exam Name" name="exam_name" required="required"/><br/>
                <label class="label"> Exam Date:</label><br/>
                <input type="date" name="examdate" required="required"/><br/>
                <label class="label">Exam Time:</label><br/>
                <input type="time" name="examtime" required="required"><br/>
                <label class="label">Exam Routine:</label><br/>
                <input type="file" class="photo" name="examRoutine" required="required"/><br/>
                <label class="label">Exam Description:</label><br/>
                <textarea name="exam_desc" rows="5" cols="55" placeholder="Enter Description here...5" required="required"></textarea><br/>
                <input type="submit" name="exam" value="Submit"/>
            </form>
            </fieldset>
        </div>
    </div>
</body>
</html>