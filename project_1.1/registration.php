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
                    <h2>Registration</h2>
                </legend>
                <form action="registration_sql.php" method="post" name="registration_form" enctype="multipart/form-data">
                    <input type="text" placeholder="First Name" name="fristName" required="required" />
                    <input type="text" placeholder="Last Name" name="lastName" required="required" /><br />
                    <input type="text" placeholder="Address" name="address" required="required" />
                    <input type="text" placeholder="Email" name="email" required="required" /><br />
                    <input type="text" placeholder="Mobile" name="mobile" required="required" />
                    <input type="text" placeholder="Current Semester" name="current_semester" /><br />
                    <input type="text" placeholder="Username" name="username" required="required" />
                    <input type="password" placeholder="Password" name="password" required="required" /><br />
                    <input type="password" placeholder="Confirm-Password" name="confirm_password" required="required" />
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
                    <input type="file"  name="userphoto" required="required"/><br />
                    <input type="radio" name="gender" value="male" checked="checked" />Male
                    <input type="radio" name="gender" value="female" />Female
                    <input type="radio" name="gender" value="other" />Others
                    <input type="submit" name="registration" id="submit" value="Register" />
                </form>
            </fieldset>
        </div>
    </div>
</body>
</html>