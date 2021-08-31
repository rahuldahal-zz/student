<?php
    // echo "delete";
    include("connection.php");
    $exam_id = $_REQUEST['exam_id'];
    // echo $user_id;
    $sql_delete = "DELETE FROM exam_information
                    WHERE exam_id = $exam_id;";
    if(mysqli_query($connection, $sql_delete)){
        header('location:view_exam.php');
    }
    else
        die(mysqli_error($connection));
      mysqli_close($connection);
?>