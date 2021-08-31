<?php
session_start();
if (!$_SESSION["username"]) {
    header('location:index.php');
}
    $first_name = $_REQUEST['first_name'];
    $user_id = $_REQUEST['user_id'];
    $last_name = $_REQUEST['last_name'];    
    $semester = $_REQUEST['semester'];
    $mobile = $_REQUEST['mobile'];
    $address = $_REQUEST['address'];
    $email = $_REQUEST['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="registration.css">
</head>

<body>
    <h1 id="sms_header">Student Management System</h1>
    <div class="outer_container">
        <div class="inner_container">
            <fieldset id="fieldset">
                <legend>
                    <h2>Update User</h2>
                </legend>
                <form action="" method="post" name="registration_form" enctype="multipart/form-data">
                    <input type="text" value= "<?php echo ($first_name) ?>" name="fristName" required="required" />
                    <input type="text" value= "<?php echo $last_name ?>" name="lastName" required="required" /><br />
                    <input type="text" value= "<?php echo $address ?>" name="address" required="required" />
                    <input type="text" value= "<?php echo $email ?>" name="email" required="required" /><br />
                    <input type="text" value= "<?php echo $mobile ?>" name="mobile" required="required" />
                    <input type="text" value= "<?php echo $semester ?>" name="current_semester" /><br />
                    <select class="role" name="role">
                        <option value="1" selected="selected">Administrator</option>
                        <option value="2">Student</option>
                    </select>
                    <select class=course name="course">
                        <option value="Administrator" selected="selected">Administrator</option>
                        <option value="BIM">BIM</option>
                        <option value="BCA">BCA</option>
                        <option value="BSC.CSIT">BSC.CSIT</option>
                        <option value="BHM">BHM</option>
                        <option value="BBS">BBS</option>
                    </select>
                    <input type="file" class="photo" name="photo" /><br />
                    <input type="radio" name="gender" value="male" checked="checked" />Male
                    <input type="radio" name="gender" value="female" />Female
                    <input type="radio" name="gender" value="other" />Others
                    <input type="submit" name="update" id="submit" value="Update" />
                </form>
            </fieldset>
        </div>
    </div>

    <?php
        if(isset($_POST['update'])){
            include('connection.php');
            session_start();
             //collecting form data
            $first_name= $_POST['fristName'];
            // echo $first_name;
            // echo "</br>";
            $user_id = $GLOBALS['user_id'];
            // echo $user_id;
            // echo "</br>";
            $last_name= $_POST['lastName'];
            // echo $last_name;
            // echo "</br>";
            $address= $_POST['address'];
            // echo $address;
            // echo "</br>";
            $email= $_POST['email'];
            // echo  $email;
            // echo "</br>";
            $mobile= $_POST['mobile'];
            // echo $mobile;
            // echo "</br>";
            $current_semester= $_POST['current_semester'];
            // echo $current_semester;
            // echo "</br>";
            $role= $_POST['role'];
            // echo $role;
            // echo "</br>";
            $course= $_POST['course'];
            // echo $course;
            // echo "</br>";
            $photo_name= $_FILES['photo']['name'];
            // echo $photo_name;
            // echo "</br>";
            $gender= $_POST['gender'];
            // echo $gender;
//-----------------update query-----------------------------------

            $sql_update = "UPDATE user_information
            SET first_name='$first_name',
                last_name='$last_name',
                address='$address',
                email='$email',
                mobile=$mobile,
                semester='$current_semester',
                role=$role,
                course='$course',
                gender='$gender',
                photo='$photo_name'
                WHERE user_id = $user_id;";
            // checking data insertion
            if(mysqli_query($connection, $sql_update)){
                echo "<script>
                alert(\"Update Successful.\");
                window.location=\"view_student.php\";
            </script>";
            }else{
                die("Update Fail".mysqli_error($connection));
            }
            mysqli_close($connection);

        }
    ?>
</body>
</html>