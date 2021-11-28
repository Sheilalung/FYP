<?php

session_start();

include("header.php");
include("../dbconnect.php");

$user_id = "";
$userDetails = [];

//retrieve data from db
$sql = "SELECT user_name_2, user_email, user_location FROM user WHERE user_id='" . $_SESSION['user_id'] . "'";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0) {
    //output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        // echo "user_name_2: ".$row["user_name_2"]."user_email: ".$row["user_email"]." user_location: ".$row["user_location"]. "<br>";
        foreach($row as $key => $value) {
            $userDetails[$key] = $value;
        }
        
    }
} else {
    echo "0 results";
}
    
?>

<?php

include("header.php");
include("../dbconnect.php");

$location_city = $postal_code = $location_state = $name_card = $card_num = $card_exp_month = $card_exp_year = $CVC = $user_id = "";

$errors = array('location_city' => "", 'postal_code' => "", 'location_state' => "", 'name_card' => "", 'card_num' => "", 'card_exp_month' => "", 'card_exp_year' => "", 'CVC' => "");

//save data to db
$sql = "SELECT * FROM `user` WHERE user_id='" . $_SESSION['user_id'] . "'";

$result = mysqli_query($conn, $sql);
$user_data = mysqli_fetch_assoc($result);


if(isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $location_city = mysqli_real_escape_string($conn, $_POST['location_city']);
    $postal_code = mysqli_real_escape_string($conn, $_POST['postal_code']);
    $location_state = mysqli_real_escape_string($conn, $_POST['location_state']);
    $name_card = mysqli_real_escape_string($conn, $_POST['name_card']);
    $card_num = mysqli_real_escape_string($conn, $_POST['card_num']);
    $card_exp_month = mysqli_real_escape_string($conn, $_POST['card_exp_month']);
    $card_exp_year = mysqli_real_escape_string($conn, $_POST['card_exp_year']);
    $CVC = mysqli_real_escape_string($conn, $_POST['CVC']);

    //hash things
    $hashed = hash('sha512', $CVC);

    //check location_city
    if(empty($_POST['location_city'])) {
        $errors['location_city'] = "Require to fill in";
    } else {
        $location_city = $_POST['location_city'];
    }

    //check location_city
    if(empty($_POST['postal_code'])) {
        $errors['postal_code'] = "Require to fill in";
    } else {
        $postal_code = $_POST['postal_code'];
    }
    
    //check location_state
    if(empty($_POST['location_state'])) {
        $errors['location_state'] = "Require to fill in";
    } else {
        $location_state = $_POST['location_state'];
    }

    //check name_card
    if(empty($_POST['name_card'])) {
        $errors['name_card'] = "Name card is required";
    } else {
        $name_card = $_POST['name_card'];
    }

    //check card_num
    if(empty($_POST['card_num'])) {
        $errors['card_num'] = "Require to fill in";
    } else {
        $card_num = $_POST['card_num'];
        if(!preg_match('^(?:4[0-9]{12}(?:[0-9]{3})?|[25][1-7][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$^', $card_num)) {
            $errors['card_num'] = "Invalid card number"; 
		}

    //check card_exp_month
    if(empty($_POST['card_exp_month'])) {
        $errors['card_exp_month'] = "Exp Month is required";
    } else {
        $card_exp_month = $_POST['card_exp_month'];
    }

    //check card_exp_year
    if(empty($_POST['card_exp_year'])) {
        $errors['card_exp_year'] = "Exp Year is required";
    } else {
        $card_exp_year = $_POST['card_exp_year'];
    }

    //check CVC
    if(empty($_POST['CVC'])) {
        $errors['CVC'] = "CVC is required";
    } else {
        $CVC = $_POST['CVC'];
        if(!preg_match('/^[0-9]{3,4}$/', $CVC)) {
            $errors['CVC'] = "Invalid CVC"; 
		}
    }

    //print_r($errors);
    if (!array_filter($errors)) {

        $sql = "UPDATE `user` SET `location_city` = '$location_city', `postal_code` = '$postal_code', `location_state` = '$location_state', `name_card` = '$name_card', `card_num` = '$card_num', `card_exp_month` = '$card_exp_month', `card_exp_year` = '$card_exp_year', `CVC` = '$hashed' WHERE `user` . `user_id` = '$user_id'";

        //echo $sql;

        $result = mysqli_query($conn, $sql);
        if($result) {
            $sql = "SELECT * FROM `user` WHERE user_id='" . $_SESSION['user_id'] . "'";
            $result = mysqli_query($conn, $sql);
            $user_data = mysqli_fetch_assoc($result);
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
        header('Location: Thank.php');

    }
    }
}
    
?>

<title>Payment</title>
<link rel="stylesheet" href="./css/payment_info.css">
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
                        <li><a href="userDetails.php" data-after="Booking">Booking</a></li>
                        <li><a href="Contactus.php" data-after="Contact Us">Contact Us</a></li>
                        <li><a href="Profile.php" data-after="Profile">Profile</a></li>
                        <li><a href="logout.php" data-after="Logut">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Payment Section -->
    <section id="payment">
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
                <i class="fa fa-calendar"></i><h2>Date&amp;Time</h2></a>
            </div>
            <div class="text">
                <a href="Payment.php">
                <i class="fa fa-credit-card" style="color:red"></i><h2 style="color:red">Payment</h2></a>
            </div>
            <div class="text">
                <a href="Thank.php">
                <i class="fa fa-thumbs-up"></i><h2>ThankYou</h2></a>
            </div>
        </div>
    </section>

    <!-- Payment Content Section -->
    <section id="payment-content">
        <div class="payment-content container1">
        <div class="column-1 box">
            <h1>Total Amount: <span class="price" style="color:black"></span></h1>
            <p><a href="#">Packages</a> <span class="price">RM 1200</span></p>
            <p><a href="#">Transportation fees</a> <span class="price">RM 200</span></p>
            <hr>
            <p>Total <span class="price" style="color:black"><b>RM 1400</b></span></p>
        </div>
        <div class="column-2 box">
            <h2>Billing Address</h2>
            <form action="Payment.php" method="POST">

                    <div class="row">
                        <div class="column-70">

                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="user_name_2" value="<?php echo $userDetails["user_name_2"]; ?>">

                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="email" id="email" name="user_email" value="<?php echo $userDetails["user_email"]; ?>">

                            <label for="address"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="address" name="user_location" value="<?php echo $userDetails["user_location"]; ?>">

                            <label for="city"><i class="fa fa-institution"></i> town/City</label>
                            <input type="text" id="city" name="location_city" placeholder="Kuala Lumpur">
                            <div class="errors"><?php echo $errors['location_city']; ?></div>

                            <label for="postalcode">Postal Code</label>
                            <input type="text" id="postalcode" name="postal_code" placeholder="43000">
                            <div class="errors"><?php echo $errors['postal_code']; ?></div>

                            <label for="state">State</label>
                            <input type="text" id="state" name="location_state" placeholder="Selangor">
                            <div class="errors"><?php echo $errors['location_state']; ?></div>

            <h2>Payment</h2>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>

                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="name_card" placeholder="Joel Lim Zhen Yue">
                            <div class="errors"><?php echo $errors['name_card']; ?></div>

                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="card_num" placeholder="1111-2222-3333-4444">
                            <div class="errors"><?php echo $errors['card_num']; ?></div>

                            <label for="expmonth">Exp Month</label>
                            <select name='card_exp_month' id='expireMM'>
                                <option value='January'>January</option>
                                <option value='February'>February</option>
                                <option value='March'>March</option>
                                <option value='April'>April</option>
                                <option value='May'>May</option>
                                <option value='June'>June</option>
                                <option value='July'>July</option>
                                <option value='August'>August</option>
                                <option value='September'>September</option>
                                <option value='October'>October</option>
                                <option value='November'>November</option>
                                <option value='December'>December</option>
                            </select>
                            <div class="errors"><?php echo $errors['card_exp_month']; ?></div>
                            
                            <label for="expyear">Exp Year</label>
                            <select name='card_exp_year' id='expireYY'>
                                <option value=''>Year</option>
                                <option value='2020'>2020</option>
                                <option value='2021'>2021</option>
                                <option value='2022'>2022</option>
                                <option value='2023'>2023</option>
                                <option value='2024'>2024</option>
                            </select>
                            <div class="errors"><?php echo $errors['card_exp_year']; ?></div>

                            <label for="cvc">CVC</label>
                            <input type="text" id="cvc" name="CVC">
                            <div class="errors"><?php echo $errors['CVC']; ?></div>
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