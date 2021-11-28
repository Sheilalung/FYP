<?php

session_start();

include("header.php");
include("dbconnect.php");
include("function.php");

$user_name = $user_nric = $user_email = $user_phonenum = $user_password = "";

$errors = array('name' => "", 'IC' => "", 'email' => "", 'phnumber' => "", 'psw' => "");

if(isset($_POST['submit'])) {
    $user_name = mysqli_real_escape_string($conn, $_POST['name']);
    $user_nric = mysqli_real_escape_string($conn, $_POST['IC']);
    $user_email = mysqli_real_escape_string($conn, $_POST['email']);
    $user_phonenum = mysqli_real_escape_string($conn, $_POST['phnumber']);
    $user_password = mysqli_real_escape_string($conn, $_POST['psw']);


    //check name
    if(empty($_POST['name'])) {
        $errors['name'] = "User name is required";
    } else {
        $user_name = $_POST['name'];
        $sql = "SELECT * FROM `user` WHERE user_name='" . $user_name . "'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
			$errors["name"] = "User name is taken by another user!";
		}else {
            if(!preg_match('/^[a-zA-Z\s]+$/', $user_name)) {
                $errors['name'] = "User name must be letters and spaces only";
            }
        }
        
    }

    //check IC
    if(empty($_POST['IC'])) {
        $errors['IC'] = "Identity Card No is required";
    } else {
        $user_nric = $_POST['IC'];
        if(!preg_match('/^\d{6}-\d{2}-\d{4}$/', $user_nric)) {
            $errors['IC'] = "Identity Card No must have 12 digits. Eg:xxxxxx-xx-xxxx";
        }
    }

    //check email
    if(empty($_POST['email'])) {
        $errors['email'] = "Email is required";
    } else {
        $user_email = $_POST['email'];
        if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Email must be a valid email address";
        }
    }

    //check phnumber
    if(empty($_POST['phnumber'])) {
        $errors['phnumber'] = "Phone number is required";
    } else {
        $user_phonenum = $_POST['phnumber'];
        if(!preg_match('/^(01)[0-46-9]-*[0-9]{7,8}$/', $user_phonenum)) {
            $errors['phnumber'] = "Invalid phone number";
        }
    }

    //check psw
    if(empty($_POST['psw'])) {
        $errors['psw'] = "Password is required";
    } else {
        $user_password = $_POST['psw'];
    }

    if (!array_filter($errors)) {

        //create sql save to db

        $sql = "INSERT INTO user(user_name, user_nric, user_email, user_phonenum, user_password) VALUES ('$user_name', '$user_nric', '$user_email', '$user_phonenum', '$user_password')";

        if(mysqli_query($conn, $sql)) {
            header('Location: Login.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }
    }

?>

<title>Sign Up</title>
<link rel="stylesheet" href="./css/Loginpage.css">
</head>
<html>
    <body>


    <!-- Sign up page -->
    <section id="usersignup">
        <div class="screen">
            <div class="screen container">
                <div class="box">
                    <h1>Create your DLBS Account</h1>
                    <form action="usersignup.php" class="input-field" method="POST">
                            <input type="text" name="name" class="name" placeholder="User Name" value="<?php echo $user_name ?>">
                            <div class="errors"><?php echo $errors['name']; ?></div>

                            <input type="text" name="IC" class="name" placeholder="IC/Passport No" maxlength="15"  value="<?php echo $user_nric ?>">
                            <div class="errors"><?php echo $errors['IC']; ?></div>

                            <input type="text" name="email" class="name" placeholder="Email" value="<?php echo $user_email ?>">
                            <div class="errors"><?php echo $errors['email']; ?></div>

                            <input type="text" name="phnumber" class="name" placeholder="Phone number" value="<?php echo $user_phonenum ?>">
                            <div class="errors"><?php echo $errors['phnumber']; ?></div>

                            <input type="text" name="psw" class="name" placeholder="Password" value="<?php echo $user_password ?>">
                            <div class="errors"><?php echo $errors['psw']; ?></div>

                            <button type="submit" name="submit" class="submit-button" value="submit">Sign Up!</button>
                            
                        </form>
                </div>
            </div>
        </div>
    </section>


    </body>
</html>