<?php
   if(isset($_POST['payment'])){

    //connecting database
    include('connection.php');
    echo "</br>";
    //collecting form data
    $payer_fristName= $_POST['payer_fristName'];
    $payer_lastName= $_POST['payer_lastName'];
    $student_mobile= $_POST['student_mobile'];
    $amount= $_POST['amount'];
    $paid_date = date('y-m-d');

    //--------Data Validation-----------------
    //Number validation-----------------------
    if(!is_numeric($student_mobile)){
        echo "<script>
        alert(\"Characters Not Allowed.\");
        window.location=\"payment.php\";
        </script>";
        echo"</br>";
    }
    if(!(strlen($student_mobile)==10)){
        echo "<script>
        alert(\"Please! Enter Correct Mobile Number.\");
        window.location=\"payment.php\";
        </script>";
        echo"</br>";
    }
    // searching for number to match with payment form
    $sql_search_student_number = "SELECT *
                                  FROM user_information
                                  WHERE mobile =$student_mobile;";
    $result = mysqli_query($connection, $sql_search_student_number) or die("Querry Failed! ".mysqli_error($connection));
    
    //database Number validation-------------
    if(mysqli_num_rows($result)==0){
        echo "<script>
        alert(\"Sorry! Student Number Not Match\");
        window.location=\"payment.php\";
        </script>";
        echo"</br>";
    }
    //------amount validation----------
     else if($amount<0){
        echo "<script>
        alert(\"Sorry! Negative Amount Not Acceptable\");
        window.location=\"payment.php\";
        </script>";
        echo"</br>";
          
        }else{
            //inserting into table
            $sql_insert_data = "INSERT INTO 
            payment_information (paid_date, payer_first_name,
            payer_last_name, student_mobile, amount) 
            VALUES('$paid_date', '$payer_fristName', '$payer_lastName',
            $student_mobile, $amount)";

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
        }
        mysqli_close($connection);
   }
?>