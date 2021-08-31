<?php
    // echo "delete";
    include("connection.php");
    $payment_id = $_REQUEST['payment_id'];
    // echo $user_id;
    $sql_delete = "DELETE FROM payment_information
                    WHERE payment_id = $payment_id;";
    if(mysqli_query($connection, $sql_delete)){
        header('location:view_payment.php');
    }
    else
        die(mysqli_error($connection));
      mysqli_close($connection);
?>