<?php

session_start();

include("header.php");
include("dbconnect.php");

$vis_name = $vis_email = $vis_subject = $vis_message = "";

$errors = array('vis_name' => "", 'vis_email' => "", 'vis_subject' => "", 'vis_message' => "");

if(isset($_POST['submit'])) {
    //$vis_id = mysqli_real_escape_string($conn, $_POST['vis_id']);
    $vis_name = mysqli_real_escape_string($conn, $_POST['vis_name']);
    $vis_email = mysqli_real_escape_string($conn, $_POST['vis_email']);
    $vis_subject = mysqli_real_escape_string($conn, $_POST['vis_subject']);
    $vis_message = mysqli_real_escape_string($conn, $_POST['vis_message']);

    
    if (!array_filter($errors)) {

        print_r($errors);

        $sql = "INSERT INTO visitor(vis_name, vis_email, vis_subject, vis_message) VALUES ('$vis_name', '$vis_email', '$vis_subject', '$vis_message')";

        echo $sql;

        if(mysqli_query($conn, $sql)) {
            header('Location: Contactus.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    
    }
    }

    
?>

<title>Contact Us</title>
<link rel="stylesheet" href="./css/Contactus.css">
</head>
<body>
    <!-- Header Section -->
    <section id="header">
        <div class="header container">
            <div class="nav-bar">
                <div class="brand">
                    <a href="index.php"><img src="./user/image/logo3.png" class="logo" alt="logo" id="logo"></a>
                </div>
                <div class="nav-list">
                    <div class="hamburger"><div class="bar"></div></div>
                    <ul>
                        <li><a href="index.php" data-after="Home">Home</a></li>
                        <li><a href="Aboutus.php" data-after="About Us">About Us</a></li>
                        <li><a href="Services.php" data-after="Services">Services</a></li>
                        <li><a href="Login.php" data-after="Booking">Booking</a></li>
                        <li><a href="Contactus.php" data-after="Contact Us">Contact Us</a></li>
                        <li><a href="Login.php" data-after="Login">Login</a></li>
                        <li><a href="usersignup.php" data-after="Sign Up">Sign Up</a></li>
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
                    <h2>dristitute@gmail.com</h2>
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

                        <input type="text" name="vis_name" placeholder="Enter your name" value="<?php echo $vis_name ?>" required>

                        <input type="email" name="vis_email" placeholder="Enter email address" <?php echo $vis_email ?> required>

                        <input type="text" name="vis_subject" placeholder="Enter your subject" <?php echo $vis_subject ?> required>

                        <textarea rows="10" name="vis_message" placeholder="Message" <?php echo $vis_message ?> required></textarea>

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
            <div class="brand"><a href="index.php">
                <img src="./user/image/logo3.png" class="logo" alt="logo" id="logo"></div></a>
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