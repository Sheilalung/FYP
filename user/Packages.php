<?php

session_start();

include("header.php");
include("../dbconnect.php");

$user_dri = $user_packages = $instructor = $transportation_service = $user_id = "";

$errors = array('user_dri' => "", 'user_packages' => "", 'instructor' => "", 'transportation_service' => "");


$sql = "SELECT * FROM `user` WHERE user_id='" . $_SESSION['user_id'] . "'";

$result = mysqli_query($conn, $sql);
$user_data = mysqli_fetch_assoc($result);


if(isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $user_dri = mysqli_real_escape_string($conn, $_POST['user_dri']);
    $user_packages = mysqli_real_escape_string($conn, $_POST['user_packages']);
    //$instructor = mysqli_real_escape_string($conn, $_POST['instructor']);
    //$transportation_service = mysqli_real_escape_string($conn, $_POST['transportation_service']);

    //check driving institute
    if(empty($_POST['user_dri'])) {
        $errors['user_dri'] = "Require to select one";
    } else {
        $user_dri = $_POST['user_dri'];
    }

    //check which packages 
    if(empty($_POST['user_packages'])) {
        $errors['user_packages'] = "Require to select one";
    } else {
        $user_packages = $_POST['user_packages'];
    }

    //check which instructor 
    if(empty($_POST['instructor'])) {
        $errors['instructor'] = "Require to select one";
    } else {
        $instructor = $_POST['instructor'];
    }
    
    //check transportation service 
    if(empty($_POST['transportation_service'])) {
        $errors['transportation_service'] = "Require to select one";
    } else {
        $transportation_service = $_POST['transportation_service'];
    }

    //print_r($errors);
    if (!array_filter($errors)) {

        $sql = "UPDATE `user` SET `user_dri` = '$user_dri', `user_packages` = '$user_packages', `instructor` = '$instructor', `transportation_service` = '$transportation_service' WHERE `user` . `user_id` = '$user_id'";
 
        echo $sql;

        $result = mysqli_query($conn, $sql);
        if($result) {
            $sql = "SELECT * FROM `user` WHERE user_id='" . $_SESSION['user_id'] . "'";
            $result = mysqli_query($conn, $sql);
            $user_data = mysqli_fetch_assoc($result);
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
        header('Location: Date&Time.php');

    }
    }
    
?>

<title>Packages</title>
<link rel="stylesheet" href="./css/packages.css">
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

    <!-- Packages Section -->
    <section id="packages">
    <h1>Please fill in the following requirements</h1>
        <div class="icon">
            <div class="text">
                <a href="UserDetails.php">
                <i class="fa fa-edit"></i><h2>YourDetails</h2></a>
            </div>
            <div class="text">
                <a href="Packages.php">
                <i class="fa fa-ticket" style="color:red"></i><h2 style="color:red">Packages</h2></a>
            </div>
            <div class="text">
                <a href="Date&Time.php">
                <i class="fa fa-calendar"></i><h2>Date&amp;Time</h2></a>
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
            <form action="Packages.php" method="POST">
            <div class="row">
                <div class="column-left">
                    <label for="name">Driving institute:</label>
                </div>

                <div class="column-right">
                    <input type="text" name="user_dri" id="driving_institute" placeholder="Choose one driving institute you are interested" list="dri_name" value="<?php echo $user_dri ?>"/>
                    
                    <datalist id="dri_name">
                        <option value="Surfine Hitech Sdn. Bhd"></option>
                        <option value="Metro Driving Academy"></option>
                    </datalist>
                    <div class="errors"><?php echo $errors['user_dri']; ?></div>

                </div>
            </div>
                <div class="row">
                <div class="column-left">
                    <label for="name">Types of packages:</label>
                </div>

                <div class="column-right">
                    <input type="text" name="user_packages" placeholder="Choose one packages you would like to proceed booking" list="v_packages" value="<?php echo $user_packages ?>"/>
                    
                    <datalist id="v_packages">
                        <option value="Class D (Car-Manual)">Non MYKAD Holders Price - RM 2600*</option>
                        <option value="Class DA (Car-Automatic)">Non MYKAD Holders Price - RM 2600*</option>
                        <option value="Class B2 (Motorcycle)">Non MYKAD Holders Price - RM 800*</option>
                        <option value="Class B Full (Superbike)">Non MYKAD Holders Price - RM 1300*</option>
                        <option value="Class E (Lorry)">Stay tuned</option>
                        <option value="Class H (Tractor)">Stay tuned</option>
                        <option value="GDL (Lorry / Van)">Stay tuned</option>
                        <option value="GDL (Trailer)">Stay tuned</option>
                        <option value="PSV (Van / Mini Bus)">Stay tuned</option>
                        <option value="PSV (Taxi)">Stay tuned</option>
                        <option value="PSV (Bus)">Stay tuned</option>
                        <option value="Car-Manual">Stay tuned</option>
                        <option value="Car-Automatic">Stay tuned</option>
                    </datalist>
                    <div class="errors"><?php echo $errors['user_packages']; ?></div>
                </div>
            </div>

            <div class="row">
                <div class="column-left">
                    <label for="name">What is your instructor preference</label>
                </div>
                <div class="column-right">

                <div>
                <input type="radio" id="chinese" name="instructor" value="chinese">
                <label for="chinese">Chinese</label>
                </div>

                <div>
                <input type="radio" id="malay" name="instructor" value="malay">
                <label for="malay">Malay</label>
                </div>

                <div>
                <input type="radio" id="indian" name="instructor" value="indian">
                <label for="indian">Indian</label>
                </div>
                <div class="errors"><?php echo $errors['instructor']; ?></div>
                </div>
            </div>

            <div class="row">
                <div class="column-left">
                    <label for="name">Would you like to have Transportation service to your Doorstep</label>
                    <div><small style="color:red">RM200 Charges For Transportation Service To Your Doorstep*</small></div>
                    
                </div>
                <div class="column-right">

                <div>
                    <input type="radio" id="yes" name="transportation_service" value="yes">
                    <label for="yes">Yes</label><br>
                </div>

                <div>
                    <input type="radio" id="no" name="transportation_service" value="no">
                    <label for="no">No</label><br>
                    <div class="errors"><?php echo $errors['transportation_service']; ?></div>
                </div>
                </div>
                <div class="placebtn">
                <button type="submit" name="submit" class="button" value="submit">Next Page</button>
            </div>
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