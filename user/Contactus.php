<?php

session_start();

include("header.php");
include("../dbconnect.php");

$user_name = $user_email = $user_subject = $user_message = $message_notify = $user_id = "";

$errors = array('user_email' => "", 'user_subject' => "", 'user_message' => "", 'message_notify' => "");

$sql = "SELECT * FROM `user` WHERE user_id='" . $_SESSION['user_id'] . "'";


$result = mysqli_query($conn, $sql);
$user_data = mysqli_fetch_assoc($result);


if(isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $user_subject = mysqli_real_escape_string($conn, $_POST['user_subject']);
    $user_message = mysqli_real_escape_string($conn, $_POST['user_message']);
    $message_notify = mysqli_real_escape_string($conn, $_POST['message_notify']);

    
    if (!array_filter($errors)) {

        $sql = "UPDATE `user` SET `user_email` = '$user_email', `user_subject` = '$user_subject', `user_message` = '$user_message', `message_notify` = '$message_notify' WHERE `user` . `user_id` = '$user_id'";

        echo $sql;

        $result = mysqli_query($conn, $sql);
        if($result) {
            $sql = "SELECT * FROM `user` WHERE user_id='" . $_SESSION['user_id'] . "'";
            $result = mysqli_query($conn, $sql);
            $user_data = mysqli_fetch_assoc($result);
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
        header('Location: Contactus.php');

    }
    }

    
?>

<?php

include("header.php");
include("../dbconnect.php");

$user_id = "";
$userDetails = [];

//retrieve data from db
$sql = "SELECT user_name FROM user WHERE user_id='" . $_SESSION['user_id'] . "'";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0) {
    //output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        foreach($row as $key => $value) {
            $userDetails[$key] = $value;
        }
        
    }
} else {
    echo "0 results";
}
    
?>

<title>Contat Us</title>
<link rel="stylesheet" href="./css/ContactUs.css">
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
                        <li><a href="UserDetails.php" data-after="Booking">Booking</a></li>
                        <li><a href="Contactus.php" data-after="Contact Us">Contact Us</a></li>
                        <li><a href="Profile.php" data-after="Profile">Profile</a></li>
                        <li><a href="logout.php" data-after="Logut">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Map Section -->
    <section id="contact">
        <div class="contact container">
            <div class="location">
            <iframe src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d7967.908130508706!2d101.805723!3d3.106853!3m2!1i1024!2i768!4f13.1!4m8!3e0!4m0!4m5!1s0x31cc3158916c9493%3A0x73a292801dd08358!2sSurfine%20Hitech%20Sdn%20Bhd%2C%205317%2C%2012%2C%20Jalan%20Hulu%20Langat%2C%20Kampung%20Dusun%20Nanding%2C%2043100%20Hulu%20Langat%2C%20Selangor!3m2!1d3.1082270999999997!2d101.8073543!5e0!3m2!1sen!2smy!4v1635612621784!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <!-- Contact Content Section -->
    <section id=contact>
        <div class="contact container">
            <div class="row">
                <div class="column">
                <div class="contact-section">
                    <div class="contact-icon">
                    <img src="https://img.icons8.com/bubbles/50/000000/phone--v1.png"/>
                    </div>
                    <div class="contact-text">
                    <h1>Phone</h1>
                    <h2>03- 7972 3915</h2>
                    </div>
                </div>
                <div class="contact-section">
                    <div class="contact-icon">
                    <img src="https://img.icons8.com/bubbles/50/000000/email--v1.png"/>
                    </div>
                    <div class="contact-text">
                    <h1>Email</h1>
                    <h2>xikita9321@ecofreon.com</h2>
                    </div>
                </div>
                <div class="contact-section">
                    <div class="contact-icon">
                    <img src="https://img.icons8.com/bubbles/50/000000/address.png"/>
                    </div>
                    <div class="contact-text">
                    <h1>Address</h1>
                    <h2>LOT 5317, KAMPUNG NANDING, 
                    BATU 12 JALAN HULU LANGAT, 43100 SELANGOR</h2>
                    </div>
                </div>
                </div>
                <div class="column">
                <div class="contact-col">
                    <h1>Send us a message</h1>
                    <form action="Contactus.php" method="POST">

                        <!--User name retrieve from db-->
                        <input type="text" name="user_name" placeholder="Enter your name" value="<?php echo $userDetails["user_name"]; ?>">

                        <input type="email" name="user_email" placeholder="Enter email address" <?php echo $errors['user_email']; ?> required>

                        <input type="text" name="user_subject" placeholder="Enter your subject" <?php echo $errors['user_subject']; ?> required>

                        <textarea rows="10" name="user_message" placeholder="Message" <?php echo $errors['user_message']; ?>required></textarea>

                        <!--show message in admin page-->
                        <input type="hidden" id="msg_notify" name="message_notify" value="1">

                        <button type="submit" name="submit" class="button" value="submit">Send Message</button>
                    </form>
                </div>
                </div>
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