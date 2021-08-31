<?php
    include("connection.php");
    echo "hello deactive";
    $user_id = $_REQUEST['user_id'];
    echo $user_id;
    $sql_active = "UPDATE user_information
                   SET status=1
                   WHERE user_id = $user_id";
     if(mysqli_query($connection, $sql_active)){
        echo "<script>
                alert(\"Active successful\");
            </script>";
        echo"</br>";
    }
    else{
         die("Active failed! </br>".mysqli_error($connection));
         echo"</br>";
        }
        header('location:admin_status.php');
      mysqli_close($connection);
?>