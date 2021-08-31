<?php
   if(isset($_POST['registration'])){

    //connecting database
    include('connection.php');
    echo "</br>";
    //collecting form data
    $first_name= $_POST['fristName'];
    $last_name= $_POST['lastName'];
    $address= $_POST['address'];
    $email= $_POST['email'];
    $mobile= $_POST['mobile'];
    $current_semester= $_POST['current_semester'];
    $username= $_POST['username'];
    $password= md5($_POST['password']);
    $confirm_password= md5($_POST['confirm_password']);
    $role= $_POST['role'];
    $course= $_POST['course'];
    $gender= $_POST['gender'];
    $user_photo= $_FILES['userphoto']['name'];
    $temp_name= $_FILES['userphoto']['tmp_name'];
    $folder_upload="user_profile/";
    //  $folder_upload="exam_notice/";

    //number validation
    if(!is_numeric($mobile)){
        echo "<script>
        alert(\"Please Enter Only Number\")
        window.location=\"registration.php\";
    </script>";
    }
    //length validation
    if(strlen($mobile)!=10){
        echo "<script>
        alert(\"Enter 10 Digits Number \");
        window.location=\"registration.php\";
    </script>";
    }
     //inserting into table
    if($password == $confirm_password){
    $sql_insert_data = "INSERT INTO user_information
        (first_name, last_name, address,
        email, mobile, semester, username,
        password, role, course, gender, photo)
        VALUES('$first_name', '$last_name', '$address',
        '$email', $mobile,'$current_semester', '$username',
        '$password', $role, '$course', '$gender', '$user_photo')";
        //checking data insertion
        if(mysqli_query($connection, $sql_insert_data)){
            move_uploaded_file($temp_name,$folder_upload.$user_photo);
            // move_uploaded_file($temp_name,$folder_upload.$examRoutine);
            session_start();
            if($_SESSION['role']=='1'){
            echo "<script>
                    alert(\"Creation Successful\");
                    window.location=\"dashboard.php\";
                </script>";
            }
            else{
                echo "<script>
                    alert(\"Creation Successful\");
                    window.location=\"index.php\";
                </script>";
            }
        }
        else{
             die("data insertion failed! </br>".mysqli_error($connection));
             echo"</br>";
            }
    }else{
        echo "<script>
        alert(\"Password Not Match!\");
        window.location=\"registration.php\";
    </script>";
    }
          mysqli_close($connection);
   }
?>