<?php

    if(isset($_POST['login'])){
        //connecting database
        include('connection.php');
        
        //accessing username and password form login page
        $username= mysqli_escape_string($connection, $_POST['username']);
        $password= md5($_POST['password']);
        $user_role=$_POST['role'];

        //retriving username and password from database
        $sql = "SELECT user_id, username, photo, status, first_name, last_name, address, mobile, course, role FROM user_information
                WHERE username='$username' AND password='$password' AND role = $user_role";
        $result = mysqli_query($connection, $sql) or die("Querry Failed! ".mysqli_error($connection));

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                session_start();
                $_SESSION["status"] = $row['status'];
                $_SESSION["photo"] = $row['photo'];
                $_SESSION["user_id"] = $row['user_id'];
                $_SESSION["username"] = $row['username'];
                $_SESSION["role"] = $row['role'];
                $_SESSION["first_name"] = $row['first_name'];
                $_SESSION["last_name"] = $row['last_name'];
                $_SESSION["address"] = $row['address'];
                $_SESSION["mobile"] = $row['mobile'];
                $_SESSION["course"] = $row['course'];

                // ---------Checking admin status-----------------
                if(($_SESSION["role"] ==2) && ($_SESSION["status"] ==0)){
                    header('location:dashboard.php');
                }
                if($_SESSION["role"] ==1){
                    if($_SESSION["status"]==1){
                        header('location:dashboard.php');
                    }else{
                        echo "<script>
                        alert(\"Sorry! You Are Not Active Admin.\");
                        window.location=\"index.php\";
                    </script>";
                    }
                }
            }
        }
        else{
            echo "<script>
            alert(\"Username And Password not match!\");
            window.location=\"index.php\";
        </script>";
        }
    }
?>