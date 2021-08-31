<?php
    session_start();
    if(!$_SESSION["username"]){
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Detail</title>
    <link rel="stylesheet" href="payment.css">
</head>
<body>
    <h1 id="sms_header">Student Management System</h1>
    <div class="outer_container">
        <div class="inner_container">
        <fieldset id="fieldset">

        <?php
        $payment_id = $_REQUEST['payment_id'];
        // echo $payment_id;
        $payer_first_name = $_REQUEST['payer_first_name'];
        // echo $payer_first_name;
        $payer_last_name = $_REQUEST['payer_last_name'];    
        $student_mobile = $_REQUEST['student_mobile'];
        $amount = $_REQUEST['amount'];
    ?>

            <legend><h2>Update Payment</h2></legend>
            <form action="" method="post">
                <label class="label">Payer:</label><br/>
                <input type="text" value= "<?php echo ($payer_first_name) ?>" placeholder="First Name" name="payer_fristName" required="required"/><br/>
                <input type="text" value= "<?php echo ($payer_last_name) ?>" placeholder="Last Name" name="payer_lastName" required="required"/><br/><hr>
            <label class="label" class="label">Mobile No:</label><br/>
                <input type="text" value= "<?php echo ($student_mobile) ?>" placeholder="Enter Student Moble" name="student_mobile" required="required"/><br/>
            <label class="label">Amount:</label><br/>
                <input type="text" value= "<?php echo ($amount) ?>" placeholder="Enter Amount" name="amount" required="required"/><br/>
                <input type="submit" name="update_payment" value="Update"/>
            </form>
            </fieldset>
        </div>
    </div>

    <?php
   if(isset($_POST['update_payment'])){
    //connecting database
    include('connection.php');
    echo "</br>";

    //collecting form data
    $payment_id = $GLOBALS['payment_id'];
    $payer_first_name= $_POST['payer_fristName'];
    $payer_last_name= $_POST['payer_lastName'];
    $student_mobile= $_POST['student_mobile'];
    $amount=$_POST['amount'];
    // $post_date = date('y-m-d');
// ------update query----------
    $sql_update = "UPDATE payment_information
    SET payer_first_name='$payer_first_name',
        payer_last_name='$payer_last_name',
        student_mobile=$student_mobile,
        amount=$amount
        WHERE payment_id = $payment_id;";
    // checking data insertion
    if(mysqli_query($connection, $sql_update)){
        echo "<script>
        alert(\"Update Successful.\");
        window.location=\"view_payment.php\";
    </script>";
    }else{
        die("Update Fail".mysqli_error($connection));
    }
        mysqli_close($connection);
   }
?>
</body>
</html>