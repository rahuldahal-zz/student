<?php
    // echo "delete";
    include("connection.php");
    $course_id = $_REQUEST['course_id'];
    // echo $user_id;
    $sql_delete = "DELETE FROM course_information
                    WHERE course_id = $course_id;";
    if(mysqli_query($connection, $sql_delete)){
        header('location:view_course.php');
    }
    else
        die(mysqli_error($connection));
      mysqli_close($connection);
?>