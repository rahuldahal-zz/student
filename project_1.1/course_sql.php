<?php
   if(isset($_POST['course'])){

    //connecting database
    include('connection.php');
    echo "</br>";
    //collecting form data
    $course_name= $_POST['course_name'];
    $course_type= $_POST['course_type'];
    $credit_hr= $_POST['credit_hr'];

     //inserting into table
    $sql_insert_data = "INSERT INTO course_information
                        (course_name, course_type, credit_hour)
                        VALUES('$course_name', '$course_type', $credit_hr)";
        //checking data insertion
        if(mysqli_query($connection, $sql_insert_data)){
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