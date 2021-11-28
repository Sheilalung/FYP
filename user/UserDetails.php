<?php

session_start();

include("header.php");
include("../dbconnect.php");

$user_learner = $user_name_2 = $user_nric = $user_dob = $user_location = $user_gender = $user_phonenum = $user_email = $tnc1 = $tnc2 = $user_id = "";

$errors = array('user_learner' => "", 'user_name_2' => "", 'user_nric' => "", 'user_dob' => "", 'user_location' => "", 'user_gender' => "", 'user_phonenum' => "", 'user_email' => "", 'tnc1' => "", 'tnc2' => "");

//, 'tnc1' => "", 'tnc2' => ""

$sql = "SELECT * FROM `user` WHERE user_id='" . $_SESSION['user_id'] . "'";


$result = mysqli_query($conn, $sql);
$user_data = mysqli_fetch_assoc($result);


if(isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $user_learner = mysqli_real_escape_string($conn, $_POST['user_learner']) ?? null;
    $user_name_2 = mysqli_real_escape_string($conn, $_POST['user_name_2']);
    $user_nric = mysqli_real_escape_string($conn, $_POST['user_nric']);
    $user_dob = mysqli_real_escape_string($conn, $_POST['user_dob']);
    $user_location = mysqli_real_escape_string($conn, $_POST['user_location']);
    $user_gender = mysqli_real_escape_string($conn, $_POST['user_gender']);
    $user_phonenum = mysqli_real_escape_string($conn, $_POST['user_phonenum']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $tnc1 = mysqli_real_escape_string($conn, $_POST['tnc1'])?? null;
    $tnc2 = mysqli_real_escape_string($conn, $_POST['tnc2'])?? null;

    //check learner
    if(empty($_POST['user_learner'])) {
        $errors['user_learner'] = "Require to select one";
    } else {
        $user_learner = $_POST['user_learner'];
    }

    //check name
    if(empty($_POST['user_name_2'])) {
        $errors['user_name_2'] = "User name is required";
    } else {
        $user_name_2 = $_POST['user_name_2'];
        $sql = "SELECT * FROM `user` WHERE user_name_2 ='" . $user_name_2 . "'";
        $result = mysqli_query($conn, $sql);
        //$resultCheck = mysqli_num_rows($result);

        if (mysqli_num_rows($result) > 0) {
			$errors["user_name_2"] = "Looks like your name already in database.";
		}else {
            if(!preg_match('/^[a-zA-Z\s]+$/', $user_name_2)) {
                $errors['user_name_2'] = "User name must be letters and spaces only";
            }
        }
        
    }

    //check IC
    if(empty($_POST['user_nric'])) {
        $errors['user_nric'] = "Identity Card No is required";
    } else {
        $user_nric = $_POST['user_nric'];
        if(!preg_match('/^\d{6}-\d{2}-\d{4}$/', $user_nric)) {
            $errors['user_nric'] = "Identity Card No must have 12 digits. Eg:xxxxxx-xx-xxxx";
        }
    }
    

    //check DOB
    if(empty($_POST['user_dob'])) {
        $errors['user_dob'] = "Date-of-birth is required";
    } else {
        $user_dob = $_POST['user_dob'];
    }

    //check address
    if(empty($_POST['user_location'])) {
        $errors['user_location'] = "Address is required";
    } else {
        $user_location = $_POST['user_location'];
    }

    //check radio button gender
    if(empty($_POST['user_gender'])) {
        $errors['user_gender'] = "Require to select one";
    } else {
        $user_gender = $_POST['user_gender'];
    }

    //check email
    if(empty($_POST['user_email'])) {
        $errors['user_email'] = "Email is required";
    } else {
        $user_email = $_POST['user_email'];
        if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
            $errors['user_email'] = "Email must be a valid email address";
        }
    }

    //check phnumber
    if(empty($_POST['user_phonenum'])) {
        $errors['user_phonenum'] = "Phone number is required";
    } else {
        $user_phonenum = $_POST['user_phonenum'];
        if(!preg_match('/^(01)[0-46-9]-*[0-9]{7,8}$/', $user_phonenum)) {
            $errors['user_phonenum'] = "Invalid phone number"; 
		}

    }

    //print_r($errors);
    if (!array_filter($errors)) {

        $sql = "UPDATE `user` SET `user_learner` = '$user_learner', `user_name_2` = '$user_name_2', `user_nric` = '$user_nric', `user_dob` = '$user_dob', `user_location` = '$user_location', `user_gender` = '$user_gender', `user_phonenum` = '$user_phonenum', `user_email` = '$user_email', `tnc1` = '$tnc1', `tnc2` = '$tnc2' WHERE `user` . `user_id` = '$user_id'";
 
        //echo $sql;
        //, 'tnc1' = '$tnc1', 'tnc2' = '$tnc2' 

        $result = mysqli_query($conn, $sql);
        if($result) {
            $sql = "SELECT * FROM `user` WHERE user_id='" . $_SESSION['user_id'] . "'";
            $result = mysqli_query($conn, $sql);
            $user_data = mysqli_fetch_assoc($result);
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
        header('Location: Packages.php');
    }
    }
    
?>

<title>User Details</title>
<link rel="stylesheet" href="./css/udetails.css">
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

    <!-- Details Section -->
    <section id="details">
    <h1>Please fill in the following requirements</h1>
        <div class="icon">
            <div class="text">
                <a href="UserDetails.php">
                <i class="fa fa-edit" style="color:red"></i><h2 style="color:red">YourDetails</h2></a>
            </div>
            <div class="text">
                <a href="Packages.php">
                <i class="fa fa-ticket"></i><h2>Packages</h2></a>
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
        <div class="details container1">
            <form action="UserDetails.php" method="POST">

                <div class="row">
                    <div class="column-left">
                        <label for="text">Are you a new learner?</label>
                    </div>
                    <div class="column-right">
                    <input type="radio" id="yes" name="user_learner" value="yes">
                    <label for="yes">Yes</label>
                    <br>
                    <input type="radio" id="no" name="user_learner" value="no">
                     <label for="no">No</label>
                    <br>
                    <div class="errors"><?php echo $errors['user_learner']; ?></div>
                </div>
            </div>

                <div class="row">
                    <div class="column-left">
                        <label for="text">Full Name (as per IC/Passport):</label>
                    </div>
                    <div class="column-right">
                        <input type="text" id="name" name="user_name_2" placeholder="Enter Your Full Name" value="<?php echo $user_name_2 ?>">
                    <div class="errors"><?php echo $errors['user_name_2']; ?></div>
                    </div>
                </div>

                <div class="row">
                    <div class="column-left">
                        <label for="text">NRIC No.:</label>
                    </div>
                    <div class="column-right">
                        <input type="text" id="IC" name="user_nric" placeholder="IC/Passport No" maxlength="15"  value="<?php echo $user_nric ?>">
                    <div class="errors"><?php echo $errors['user_nric']; ?></div>
                    </div>
                </div>

                <div class="row">
                    <div class="column-left">
                        <label for="text">Date of birth:</label>
                    </div>
                    <div class="column-right">
                        <input type="date" id="dob" name="user_dob" placeholder="Enter Your Date of Birth" value="<?php echo $user_dob ?>">
                    <div class="errors"><?php echo $errors['user_dob']; ?></div>
                    </div>
                </div>

                <div class="row">
                    <div class="column-left">
                        <label for="text">Address:</label>
                    </div>
                    <div class="column-right">
                        <textarea id="location" name="user_location" cols="60" rows="10" placeholder="Name, street number, street name, region, postal code and town/city, state." value="<?php echo $user_location ?>"></textarea>
                    <div class="errors"><?php echo $errors['user_location']; ?></div>
                    </div>
                </div>

                <div class="row">
                    <div class="column-left">
                        <label for="text">Gender:</label>
                    </div>
                    <div class="column-right">
                    <input type="text" name="user_gender" placeholder="Choose one gender" list="gender_select" value="<?php echo $user_gender ?>"/>
                    
                    <datalist id="gender_select">
                        <option value="Female"></option>
                        <option value="Male"></option>
                        <option value="Other"></option>
                    </datalist>
                    <div class="errors"><?php echo $errors['user_gender']; ?></div>
                </div>
            </div>

                <div class="row">
                    <div class="column-left">
                        <label for="text">Phone Number:</label>
                    </div>
                    <div class="column-right">
                        <input type="text" id="phonenum" name="user_phonenum" placeholder="Enter Your Phone Number" value="<?php echo $user_phonenum ?>">
                    <div class="errors"><?php echo $errors['user_phonenum']; ?></div>
                    </div>
                </div>

                <div class="row">
                    <div class="column-left">
                        <label for="text">Email Address:</label>
                    </div>
                    <div class="column-right">
                        <input type="text" id="email" name="user_email" placeholder="Enter Your Email Address" value="<?php echo $user_email ?>">
                    <div class="errors"><?php echo $errors['user_email']; ?></div>
                    </div>
                </div>

                <div class="row">
                    <div class="column-left1">
                        <input type="checkbox" id="tnc1" name="tnc1" value="agree">
                    </div>
                    <div class="column-right1">
                        <label for="tnc"> <p>I agree that by continuing to the next step I am giving my consent to allow Driving Lesson Booking System to hold my personal data so that I can be presented with relevant Learner Driver offers and information as part of my initial enquiry. I understand Driving Lesson Booking System will hold my data for no more than 30 days. I understand Driving Lesson Booking System will hold my data for longer if I book a lesson and/or purchase a pre-paid lesson package, in accordance with their Privacy Policy.</p></label><br>
                    
                    </div>
                </div>

                <div class="row">
                    <div class="column-left1">
                        <input type="checkbox" id="tnc2" name="tnc2" value="agree">
                    </div>
                    <div class="column-right1">
                        <label for="tnc"> <p>I am happy that Driving Lesson Booking System may contact me by phone call or SMS in relation to my initial enquiry regarding Learner Driver offers and information prior to booking a lesson and/or purchasing a pre-paid lesson package.</p></label><br>
                   
                    </div>
                    </div>
                </div>
                <div class="placebtn">
                <button type="submit" name="submit" class="button" value="submit">Next Page</button>
        </div>
            </form>
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