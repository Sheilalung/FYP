<?php

session_start();

include("../header.php");
include("../dbconnect.php");

$admin_name = $admin_id = $admin_email = $admin_dob = $admin_phonenum = $admin_password = $admin_notes = "";

$errors = array('admin_name' => "", 'admin_email' => "", 'admin_dob' => "", 'admin_phonenum' => "", 'admin_password' => "", 'admin_notes' => "");

//save admin data to db
$sql = "SELECT * FROM `admin` WHERE admin_id='" . $_SESSION['admin_id'] . "'";

$result = mysqli_query($conn, $sql);
$user_data = mysqli_fetch_assoc($result);


if(isset($_POST['submit'])) {
    $admin_id = $_SESSION['admin_id'];
    $admin_name = mysqli_real_escape_string($conn, $_POST['admin_name']);
    $admin_email = mysqli_real_escape_string($conn, $_POST['admin_email']);
    $admin_dob = mysqli_real_escape_string($conn, $_POST['admin_dob']);
    $admin_phonenum = mysqli_real_escape_string($conn, $_POST['admin_phonenum']);
    $admin_password = mysqli_real_escape_string($conn, $_POST['admin_password']);
    $admin_notes = mysqli_real_escape_string($conn, $_POST['admin_notes']);

    //$user_data['admin_name'] = $admin_name;
    //$user_data['admin_email'] = $admin_email;
    //$user_data['admin_dob'] = $admin_dob;
    //$user_data['admin_phonenum'] = $admin_phonenum;
    //$user_data['admin_password'] = $admin_password;
    //$user_data['admin_notes'] = $admin_notes;


    if (!array_filter($errors)) {

        $sql = "UPDATE `admin` SET `admin_name` = '$admin_name', `admin_email` = '$admin_email', `admin_dob` = '$admin_dob', `admin_phonenum` = '$admin_phonenum', `admin_password` = '$admin_password', `admin_notes` = '$admin_notes' WHERE `admin` . `admin_id` = '$admin_id'";

        echo $sql;

        $result = mysqli_query($conn, $sql);
        if($result) {
            $sql = "SELECT * FROM `admin` WHERE admin_id ='" . $_SESSION['admin_id'] . "'";
            $result = mysqli_query($conn, $sql);
            $user_data = mysqli_fetch_assoc($result);
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
        header('Location: personal.php');

    }
}
    
?>

<title>Edit Information - Staff</title>
<link rel="stylesheet" href="./css/editpersonal.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <!-- Navigation-->
    <div class="container">
        <div class="nav">
            <div class="brand">
                <a href="dashboard.php"><img src="../user/image/logo3.png" class="logo" alt="logo" id="logo"></a>
            </div>
            <ul>
                <li>
                    <a href="dashboard.php">
                        <span class="icon"><i class="fa fa-home"></i></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="userdetails.php">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <span class="title">User Details</span>
                    </a>
                </li>
                <li>
                    <a href="userbooking.php">
                        <span class="icon"><i class="fa fa-ticket"></i></span>
                        <span class="title">User Booking</span>
                    </a>
                </li>
                <li>
                    <a href="message.php">
                        <span class="icon"><i class="fa fa-envelope"></i></span>
                        <span class="title">Message</span>
                    </a>
                </li>
                <li>
                    <a href="reply.php">
                        <span class="icon"><i class="fa fa-reply"></i></span>
                        <span class="title">Reply</span>
                    </a>
                </li>
                <li>
                    <a href="personal.php">
                        <span class="icon"><i class="fa fa-id-card-o"></i></span>
                        <span class="title">Admin Information</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon"><i class="fa fa-sign-out"></i></span>
                        <span class="title">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>

    <!--main-->
    <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="fa fa-bars"></i>
                </div>
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <i class="fa fa-search"></i>
                    </label>
                </div>
                <div class="user">
                    <img src="../user/image/ppl_icon.jpg" alt="user_img">
                </div>
            </div>

    <!--user details-->
    <div class="admin">
        <div class="admininfo">
            <div class="cardtitle">
                <h2>Edit Admin Information</h2>
                <a href="personal.php" class="btn">Back</a><!---->
            </div>

            <form action ="editpersonal.php" method="POST">
        <table>

            <tr>
                <td>Admin ID</td>
                <td colspan="2" >
                <input type="text" id="id" name="admin_id" value="<?php echo $_SESSION["admin_id"]; ?>"></td>
                
            </tr>
            <tr>
                <td>Admin Name</td>
                <td colspan="2" >
                <input type="text" id="name" name="admin_name" value="<?= $admin_name ?>" ></td>

            </tr>
            <tr>
                <td>Admin DOB</td>
                <td colspan="2" >
                <input type="date" id="name" name="admin_dob" value="<?php echo $admin_dob ?>"></td>
                
            </tr>
            <tr>
                <td>Admin Email</td>
                <td colspan="2" >
                <input type="text" id="email" name="admin_email" value="<?php echo $admin_email ?>"></td>
                
            </tr>
            <tr>
                <td>Admin Phone Number</td>
                <td colspan="2" >
                <input type="text" id="phnum" name="admin_phonenum" value="<?php echo $admin_phonenum ?>"></td>
                
            </tr>
            <tr>
                <td>Admin Password</td>
                <td colspan="2" >
                <input type="text" id="psw" name="admin_password" value="<?php echo $admin_password?>"></td>
                
            </tr>
            <tr>
                <td>About Me:</td>
                    <td colspan="2">
                    <textarea id="note" name="admin_notes" cols="60" rows="10" placeholder="Describe yourself"><?php echo $admin_notes ?></textarea></td>
                </td>
                
            </tr>
            
        </table>

        <div class="placebtn">
        <button type="submit" name="submit" class="button" value="submit">Update</button>
        
            </div>
            </form>
        </div>
    </div>



    <script>
    //main toggle
    let toggle = document.querySelector('.toggle');
    let nav = document.querySelector('.nav');
    let main = document.querySelector('.main');

    toggle.onclick = function() {
        nav.classList.toggle('active');
        main.classList.toggle('active');
    }

    //add hovered to selected nav
    let list = document.querySelectorAll('.nav li');
    function activeLink() {
        list.forEach((item) =>
        item.classList.remove('hovered'));
        this.classList.add('hovered');
    }
    list.forEach((item) =>
    item.addEventListener('mouseover',activeLink));
    </script>

</body>
</html>