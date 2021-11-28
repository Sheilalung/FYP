<?php
include("header.php")
?>

<title>Thank you</title>
<link rel="stylesheet" href="./css/Thanks.css">
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

    <!-- Thankyou Section -->
    <section id="thankyou">
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
                <i class="fa fa-credit-card"></i><h2>Payment</h2></a>
            </div>
            <div class="text">
                <a href="Thank.php">
                <i class="fa fa-thumbs-up" style="color:red"></i><h2 style="color:red">ThankYou</h2></a>
            </div>
        </div>
        <div class="thankyou container1">
            <h1>Thank you for using Driving Lesson Booking System.</h1>
        </div>
        <div class="back-btn">
        <a href="Homepage.php" type="button" class="button">Back to Home</a>
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