<?php

session_start();

include("header.php");
include("../dbconnect.php");

$ava_days = $lesson_start_date = $ava_time = $user_notes = $user_id = "";

$errors = array('lesson_start_date' => "", 'ava_time' => "", 'user_notes' => "");

//, 'tnc1' => "", 'tnc2' => ""

$sql = "SELECT * FROM `user` WHERE user_id='" . $_SESSION['user_id'] . "'";

$result = mysqli_query($conn, $sql);
$user_data = mysqli_fetch_assoc($result);


if(isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    //$ava_days = mysqli_real_escape_string($conn, $_POST['ava_days']);
    $lesson_start_date = mysqli_real_escape_string($conn, $_POST['lesson_start_date']);
    $ava_time = mysqli_real_escape_string($conn, $_POST['ava_time']);
    $user_notes = mysqli_real_escape_string($conn, $_POST['user_notes']);

    //Avilable days for lesson
    $user_data['ava_days'] = $ava_days;
    if(!empty($_POST['ava_days'])) {    
        $ava_days = implode(",",$_POST['ava_days']);
    }

    // Insert and Update record
    $checkEntries = mysqli_query($conn,"SELECT * FROM user");
    if(mysqli_num_rows($checkEntries) == 0){
      mysqli_query($con,"INSERT INTO user(ava_days) VALUES('".$ava_days."')");
    }else{
      mysqli_query($conn,"UPDATE user SET ava_days='".$ava_days."' ");
    }

    //check starting date
    if(empty($_POST['lesson_start_date'])) {
        $errors['lesson_start_date'] = "Require to select one";
    } else {
        $lesson_start_date = $_POST['lesson_start_date'];
    }

    //check available time
    if(empty($_POST['ava_time'])) {
        $errors['ava_time'] = "Require to select one";
    } else {
        $ava_time = $_POST['ava_time'];
    }

    //check user notes
    if(empty($_POST['user_notes'])) {
        $errors['user_notes'] = "Require to select one";
    } else {
        $user_notes = $_POST['user_notes'];
    }


    //print_r($errors);
    if (!array_filter($errors)) {

        $sql = "UPDATE `user` SET `ava_days` = '$ava_days', `lesson_start_date` = '$lesson_start_date', `ava_time` = '$ava_time', `user_notes` = '$user_notes' WHERE `user` . `user_id` = '$user_id'";
 
        echo $sql;

        $result = mysqli_query($conn, $sql);
        if($result) {
            $sql = "SELECT * FROM `user` WHERE user_id='" . $_SESSION['user_id'] . "'";
            $result = mysqli_query($conn, $sql);
            $user_data = mysqli_fetch_assoc($result);
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
        header('Location: Payment.php');

    }
    }
    
?>

<title>Date & Time</title>
<link rel="stylesheet" href="./css/Date&Time.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Header Section -->
    <section id="header">
        <div class="header container">
            <div class="nav-bar">
                <div class="brand">
                    <a href="Homepage.php"><img src="./image/logo3.png" class="logo" alt="logo" id="logo"></a>
                </div>
                <div class="nav-list">
                    <div class="hamburger"><div class="bar"></div></div>
                    <ul>
                        <li><a href="Homepage.php" data-after="Home">Home</a></li>
                        <li><a href="Aboutus.php" data-after="About Us">About Us</a></li>
                        <li><a href="Services.php" data-after="Services">Services</a></li>
                        <li><a href="Details.php" data-after="Booking">Booking</a></li>
                        <li><a href="Contactus.php" data-after="Contact Us">Contact Us</a></li>
                        <li><a href="Profile.php" data-after="Profile">Profile</a></li>
                        <li><a href="logout.php" data-after="Logut">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Section -->
    <section id="booking">
    <h1>Please fill in the following requirements</h1>
        <div class="icon">
            <div class="text">
                <a href="UserDetails.php">
                <i class="fa fa-edit"></i><h2>YourDetails</h2></a>
            </div>
            <div class="text">
                <a href="Packages.php">
                <i class="fa fa-ticket"></i><h2>Packages</h2></a>
            </div>
            <div class="text">
                <a href="Date&Time.php">
                <i class="fa fa-calendar" style="color:red"></i><h2 style="color:red">Date&amp;Time</h2></a>
            </div>
            <div class="text">
                <a href="Payment.php">
                <i class="fa fa-credit-card"></i><h2>Payment</h2></a>
            </div>
            <div class="text">
                <a href="Thank.php">
                <i class="fa fa-thumbs-up"></i><h2>ThankYou</h2></a>
            </div>
        </div>
        <div class="booking container1">
            <form action="Date&Time.php" method="POST">
                <div class="row">
                        <div class="column-left">
                            <label for="text">Estimate lessons begin:</label>
                        </div>
                        <div class="column-right">
                            <input type="date" id="LSD" name="lesson_start_date" placeholder="Choose a date you available" value="<?php echo $lesson_start_date ?>">
                            <div class="errors"><?php echo $errors['lesson_start_date']; ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column-left">
                            <label for="time">Available time for lessons</label>
                        </div>
                        <div class="column-right">
                            <input type="time" id="time" name="ava_time" value="<?php echo $ava_time ?>">
                            <div class="errors"><?php echo $errors['ava_time']; ?></div>
                        </div>
                    </div>
                <div class="row">
                    <div class="column-left">
                        <label for="name">Choose the days you available for lessons</label>
                    </div>
                    <div class="column-right"><!---->
                        
                    <?php

                    $checked_arr = array();

                    // Fetch checked values
                    $fetchDate = mysqli_query($conn,"SELECT * FROM user");
                    if(mysqli_num_rows($fetchDate) > 0){
                    $result = mysqli_fetch_assoc($fetchDate);
                    $checked_arr = explode(",",$result['ava_days']);
                    }

                    // Create checkboxes
                    $ava_days_arr = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
                    foreach($ava_days_arr as $ava_days){

                    $checked = "";
                    if(in_array($ava_days,$checked_arr)){
                        $checked = "checked";
                    }
                    echo '<input type="checkbox" name="ava_days[]" value="'.$ava_days.'" '.$checked.' > '.$ava_days.' <br/>';
                    }
                    ?>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="column-left">
                        <label for="address">Note for the Lessons Date&Time:</label>
                    </div>
                    <div class="column-right">
                        <textarea id="note" name="user_notes" cols="60" rows="10" placeholder="You can specific the available date and time here for further learning" value="<?php echo $user_notes ?>"></textarea>
                        <div class="errors"><?php echo $errors['user_notes']; ?></div>
                    </div>
                </div>
                <div class="placebtn">
                <button type="submit" name="submit" class="button" value="submit">Next Page</button>
            </form>
        </div>
        </div>
    </section>

    <!-- Footer Section -->
    <section id="footer">
        <div class="footer container">
            <div class="brand"><a href="Homepage.php">
                <img src="./image/logo3.png" class="logo" alt="logo" id="logo"></div></a>
                <h2>Your trusted partner for searching best driving institute</h2>
                <div class="social-icon">
                    <div class="social-item">
                        <a href="https://www.facebook.com/FYPDLBS/"><img src="https://img.icons8.com/bubbles/50/000000/facebook-new.png" alt="facebook"/></a>
                    </div>
                    <div class="social-item">
                        <a href="https://www.instagram.com/dlbs_2021/"><img src="https://img.icons8.com/bubbles/50/000000/instagram-new--v1.png" alt="instagram"/></a>
                    </div>
                    <div class="social-item">
                        <a href="mailto:xikita9321@ecofreon.com"><img src="https://img.icons8.com/bubbles/50/000000/email--v1.png" alt="e-mail"/></a>
                    </div>
                    <div class="social-item">
                        <a href="https://goo.gl/maps/q4LVZd34ekeQjFhQ9"><img src="https://img.icons8.com/bubbles/50/000000/worldwide-location.png" alt="location"/></a>
                    </div>
                </div>
                <p>Copyright &copy; 2021 dristitute. All rights reserved</p>
        </div>
    </section>

    <script src="./nav.js"></script>
    
</body>
</html>