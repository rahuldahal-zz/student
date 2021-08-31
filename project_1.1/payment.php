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
            <legend><h2>Payment Detail</h2></legend>
            <form action="payment_sql.php" method="post">
                <label class="label">Payer:</label><br/>
                <input type="text" placeholder="First Name" name="payer_fristName" required="required"/><br/>
                <input type="text" placeholder="Last Name" name="payer_lastName" required="required"/><br/><hr>
            <label class="label" class="label">Mobile No:</label><br/>
                <input type="text" placeholder="Enter Student Moble" name="student_mobile" required="required"/><br/>
            <label class="label">Amount:</label><br/>
                <input type="text" placeholder="Enter Amount" name="amount" required="required"/><br/>
                <input type="submit" name="payment" value="Save"/>
            </form>
            </fieldset>
        </div>
    </div>
</body>
</html>