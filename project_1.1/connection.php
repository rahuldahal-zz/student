<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="student_management_system";

    //creating database connection
    $connection = mysqli_connect($servername,$username,$password,$database);
    //check connection
    if(!$connection){
       die("Database Not Connected!".mysqli_connect_errno());
    }else{
        // echo "Database Connected Successfully!";
        echo "</br>";
    }
?>