<?php
   if(isset($_POST['exam'])){

    //connecting database
    include('connection.php');
    echo "</br>";
    //collecting form data
    $exam_name= $_POST['exam_name'];
    $examdate= $_POST['examdate'];
    $examtime= $_POST['examtime'];
    $examRoutine= $_FILES['examRoutine']['name'];
    $temp_name= $_FILES['examRoutine']['tmp_name'];
    $folder_upload="exam_notice/";
    $exam_desc=$_POST['exam_desc'];
    $post_date = date('Y-m-d');

    //date validation-----------------
    if($examdate < $post_date){
      echo "<script>
      alert(\"Exam Date Should Not Be Less Than Today\");
      window.location=\"exam.php\";
      </script>";
    }
          //inserting into table
            $sql_insert_data = "INSERT INTO exam_information
            (exam_name, exam_date, exam_time,
            routine_image, exam_description, post_date) 
            VALUES('$exam_name', '$examdate',
            '$examtime', '$examRoutine', '$exam_desc', '$post_date')";
            //checking data insertion
            if(mysqli_query($connection, $sql_insert_data)){
               move_uploaded_file($temp_name,$folder_upload.$examRoutine);
               echo "<script>
               alert(\"Insertion successful\");
               window.location=\"dashboard.php\";
               </script>";
               echo"</br>";
            }
            else{
            die("Insertion failed! </br>".mysqli_error($connection));
            echo"</br>";
            }
        mysqli_close($connection);
   }
?>