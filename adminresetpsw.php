<!--This admin reset psw page not working yet-->
<!--Will enhance reset psw system as 'Sending reset password email' in future-->

<?php

include("header.php");
include("dbconnect.php");

$errors = array('resetname' => "", 'resetpword' => "", 'confirmpword' => "");
$name = $resetpword = $confirmpword = "";      


if (isset($_POST['reset'])) {

    //check name
    if (empty($_POST['resetname'])) {
        $errors['resetname'] = "Username is required";
    } else {
        $name = $_POST['resetname']; // * name is unique in the database
    }

    if (empty($_POST['resetpword'])) {
        $errors['resetpword'] = "Password is required";             
    } else {
        $resetpword = $_POST['resetpword'];
    }

    if (empty($_POST['confirmpword'])) {
        $errors['cofirmpword'] = "Please retype your password to confirm";      
    } else {
        $confirmpword = $_POST['confirmpword'];
    }

    if (!empty($_POST['resetpword']) && !empty($_POST['confirmpword'])) {
        if ($resetpword !== $confirmpword) {
            $errors["confirmpword"] = "Passwords do not match";
        }
    }
    if (!array_filter($errors)) {
        $name = mysqli_real_escape_string($conn, safe_converter($_POST["resetname"]));
        $confirmpword = mysqli_real_escape_string($conn, safe_converter($_POST["confirmpword"]));
        $hashedpassword = password_hash($confirmpword, PASSWORD_DEFAULT);
        
        $sql = "UPDATE `admin` SET `admin_password` = '$hashedpassword' WHERE `users`.`username` = '$name'";

        $result = mysqli_query($conn, $sql);
    }
}
?>

<title>Reset Password</title>
<link rel="stylesheet" href="./css/login&psw.css">
</head>
<html>
    <body>

    <!-- Screen -->
    <section id="reset">
    <div class="screen">
        <div class="screen container">
            <div class="box">
                <div class="img-container">
                    <div class="img-crop">
                        <img src="./user/image/reset.jpeg" alt="image">

                        <form id="admin" action="adminresetpsw.php" class="input-field" method="POST">

                            <input type="text" class="name" name="resetname" placeholder="User Name" value="<?php echo empty($errors["resetname"]) ? '' : "error" ?>" required>
                            <div class="errors"><?php echo $errors['resetname'] ?></div>

                            <input type="text" class="name" name="resetpword" placeholder="Enter Password" value="<?php echo empty($errors["resetpword"]) ? '' : "error" ?>" required>
                            <div class="errors"><?php echo $errors['resetpword'] ?></div>
                            
                            <input type="text" class="name" name="confirmpword" placeholder="Re-enter Password" value="<?php echo empty($errors["confirmpword"]) ? '' : "error" ?>" required>
                            <div class="errors"><?php echo $errors['confirmpword'] ?></div>

                            <button type="reset" name="reset" class="submit-button">Reset</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    </body>
</html>