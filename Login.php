<?php
include("header.php");
include("dbconnect.php");

session_start();

$user_name = $user_password = $admin_name = $admin_password = ""; 

$errors = array('user_name' => "", 'user_password' => "", 'admin_name' => "", 'admin_password' => ""); //associative array


if (isset($_POST['user_login'])) {
    
    //check user name
    if (empty($_POST['user_name'])) {
        $errors['user_name'] = "User name is required";
    } else {
        $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    }

    //check user psw
    if (empty($_POST['user_password'])) {
        $errors['user_password'] = "Password is required";
    } else {
        $user_password = $_POST['user_password'];
    }
    
    if (!array_filter($errors)) {

        //sql
        $sql = "SELECT * FROM `user` WHERE user_name='" . $user_name . "'";

        $result = mysqli_query($conn, $sql);
        
        if($result) {
            if($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['user_password'] === $user_password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("location:./user/Homepage.php");
                    die;
                }
            }
        }
        echo "Wrong Username or password!";
    }
} else {
    if (isset($_POST['admin_login'])) {
    
        //check admin name
        if (empty($_POST['admin_name'])) {
            $errors['admin_name'] = "Admin name is required";
        } else {
            $admin_name = mysqli_real_escape_string($conn, $_POST['admin_name']);
        }
    
        //check admin psw
        if (empty($_POST['admin_password'])) {
            $errors['admin_password'] = "Password is required";
        } else {
            $admin_password = $_POST['admin_password'];
        }
        
        if (!array_filter($errors)) {
    
            //sql
            $sql = "SELECT * FROM `admin` WHERE admin_name ='" . $admin_name . "'";
    
            $result = mysqli_query($conn, $sql);
            
            if($result) {
                if($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);
    
                    if($user_data['admin_password'] === $admin_password) {
                        $_SESSION['admin_id'] = $user_data['admin_id'];
                        header("location:./staff/dashboard.php");
                        die;
                    }
                }
            }
            echo "Wrong Admin name or password!";
        }
    }
}


?>

<title>Signup & Login</title>
<link rel="stylesheet" href="./css/login&psw.css">
</head>
<html>
    <body>

    <!-- Screen -->
    <div class="screen">
        <div class="screen container">
            <div class="box">
                <div class="click-box">
                    <div id="btn"></div>
                        <button type="button" class="toggle-button" onclick="user()">User</button>
                        <button type="button" class="toggle-button" onclick="admin()">Admin</button>
                </div>
                <form id="user" method="POST" class="input-field">
                    <input type="text" name="user_name" class="name" placeholder="User Name" value="<?php echo $user_name ?>" required>
                    <div class="errors"><?php echo $errors['user_name']; ?></div>

                    <input type="text" name="user_password" class="name" placeholder="Enter Password" value="<?php echo $user_password ?>" required>
                    <div class="errors"><?php echo $errors['user_password']; ?></div>

                    <input type="checkbox" class="check-box"><span><p>Remember Password</p></span>
                    <button type="submit" name="user_login" class="submit-button">Login</button>
                    <div class="add">
                        <div class="link">
                        <a href="userresetpsw.php">Forgot Password?</a>
                            <div class="box-bottom">
                                <p>Don't have account yet?</p>
                            <div><a href="usersignup.php"><span>Sign up!</span></a></div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--Admin Login Page-->
                <form id="admin" method="POST" class="input-field">
                    <input type="text" name="admin_name" class="name" placeholder="User Name" value="<?php echo $admin_name ?>" required>
                    <div class="errors"><?php echo $errors['admin_name']; ?></div>


                    <input type="text" name="admin_password" class="name" placeholder="Enter Password" value="<?php echo $admin_password ?>" required>
                    <div class="errors"><?php echo $errors['admin_password']; ?></div>


                    <input type="checkbox" class="check-box"><span><p>Remember Password</p></span>
                    <button type="submit" name="admin_login" class="submit-button">Login</button>
                    <div class="add">
                        <div class="link">
                            <a href="adminresetpsw.php">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        var x = document.getElementById("user");
        var y = document.getElementById("admin");
        var z = document.getElementById("btn");

    function admin() {
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "110px";
    }

    function user() {
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0";
    }
    </script>


    </body>
</html>