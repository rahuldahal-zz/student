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
    <title>Update Exam</title>
    <link rel="stylesheet" href="course.css">
</head>
<body>
    <h1 id="sms_header">Student Management System</h1>
    <div class="outer_container">
        <div class="inner_container">
        <fieldset id="fieldset">
    <?php
        $exam_id = $_REQUEST['exam_id'];
        $exam_name = $_REQUEST['exam_name'];
        $exam_date = $_REQUEST['exam_date'];    
        $exam_time = $_REQUEST['exam_time'];
        $exam_description = $_REQUEST['exam_description'];
    ?>
        <legend><h2>Update Exam</h2></legend>
            <form action="" method="post" name="exam_form" enctype="multipart/form-data">
                <label class="label">Exam Name:</label><br/>
                <input type="text" value= "<?php echo ($exam_name) ?>" placeholder="Enter Exam Name" name="exam_name" required="required"/><br/>
                <label class="label"> Exam Date:</label><br/>
                <input type="date" value= "<?php echo ($exam_date) ?>"  name="examdate" required="required"/><br/>
                <label class="label">Exam Time:</label><br/>
                <input type="time" value= "<?php echo ($exam_time) ?>" name="examtime" required="required"><br/>
                <label class="label">Exam Routine:</label><br/>
                <input type="file" class="photo" name="examRoutine" required="required"/><br/>
                <label class="label">Exam Description:</label><br/>
                <textarea name="exam_desc" rows="5" cols="55" placeholder="Enter Description here...5" required="required"><?php echo ($exam_description) ?></textarea><br/>
                <input type="submit" name="exam_update" value="Update"/>
            </form>
            </fieldset>
        </div>
    </div>

    <?php
   if(isset($_POST['exam_update'])){

    //connecting database
    include('connection.php');
    echo "</br>";
    //collecting form data
    $exam_id = $GLOBALS['exam_id'];
    $exam_name= $_POST['exam_name'];
    $examdate= $_POST['examdate'];
    $examtime= $_POST['examtime'];
    $examRoutine= $_FILES['examRoutine']['name'];
    $temp_name= $_FILES['examRoutine']['tmp_name'];
    $exam_desc=$_POST['exam_desc'];
    // $post_date = date('y-m-d');
// ------update query----------
    $sql_update = "UPDATE exam_information
    SET exam_name='$exam_name',
        exam_date='$exam_date',
        exam_time='$exam_time',
        routine_image='$examRoutine',
        exam_description='$exam_desc'
        WHERE exam_id = $exam_id;";
    // checking data insertion
    if(mysqli_query($connection, $sql_update)){
        echo "<script>
        alert(\"Update Successful.\");
        window.location=\"view_exam.php\";
    </script>";
    }else{
        die("Update Fail".mysqli_error($connection));
    }
        mysqli_close($connection);
   }
?>
</body>
</html>