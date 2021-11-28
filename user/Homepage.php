<?php
include("header.php")
?>

<title>Home</title>
<link rel="stylesheet" href="./css/HomePage.css">
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

    <!-- Banner Section -->
    <section id="banner">
        <div class="banner container">
            <div>
             <h1>Find the BEST</h1>
             <h1><b>DRIVING INSTITUTE</b></h1>
             <h1>near you!</h1>
             <a href="UserDetails.php" type="button" class="button1">Learn more</a>
            </div>
        </div>
    </section>

    <!-- About Us -->
    <section id="about">
        <div class="about container">
            <div class="column-left">
                <div class="about-img">
                    <img src="./image/about.jpg" alt="About Us img">
                </div>
            </div>
            <div class="column-right">
                <h1 class="section-title">About <span>Us</span></h2>
                <p>Founded in September 2021 and based in Bandar Sungai Long, Bandar
                Mahkota Cheras is a trusted community marketplace for people to 
                list, and book the Best Driving Institute - online or from a mobile
                phone or tablet.</p>
                <a href="Aboutus.php" type="button" class="button2">Show More</a>
            </div>
        </div>
    </section>

    <!-- Services Section-->
    <section id="services">
        <div class="services container">
            <div class="service-top">
                <h1 class="section-title"><span>S</span>ervices</h1>
                <p>In Driving Lesson Booking System, we strive to provide 
                training focusing on safe driving skills and developing 
                responsible attitudes of new drivers behind the wheel.</p>
            </div>
            <div class="service-bottom">
                <div class="service-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/50/000000/car.png"/>
                </div>
                <h2>License</h2>
                    <p><a href="ClassD.php">Class D (Car-Manual)</a></p>
                    <p><a href="ClassD.php">Class DA (Car-Automatic)</a></p>
                    <p><a href="ClassB2.php">Class B2 (Motorcycle)</a></p>
                    <p><a href="ClassB.php">Class B Full (Superbike)</a></p>
                    <p><a href="Class00.php">Class E (Lorry)</a></p>
                    <p><a href="Class00.php">Class H (Tractor)</a></p>
                </div>
                <div class="service-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/50/000000/car.png"/>
                </div>
                <h2>Commercial Vehicle License</h2>
                    <p><a href="Class00.php">GDL (Lorry / Van)</a></p>
                    <p><a href="Class00.php">GDL (Trailer)</a></p>
                    <p><a href="Class00.php">PSV (Van / Mini Bus)</a></p>
                    <p><a href="Class00.php">PSV (Taxi)</a></p>
                    <p><a href="Class00.php">PSV (Bus)</a></p>
                </div>
                <div class="service-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/50/000000/car.png"/>
                </div>
                <h2>Refreshment Course</h2>
                    <p><a href="Class00.php">Car-Manual</a></p>
                    <p><a href="Class00.php">Car-Automatic</a></p>
                </div>
            </div>
            </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Register Section -->
    <section id="register">
        <div class="register container">
            <div>
            <p>Still wait what? Click the button below and make a booking now!</p>
            <a href="UserDetails.php" type="button" class="button3">Book Now</a>
            </div>
        </div>
    </section>
    
    <!-- Contact Us -->
    <section id="contact">
        <div class="contact container">
            <div><h1 class="section-title">Contact <span>Info</span></h1></div>
            <div class="contact-item">
            <div class="contact-section">
                <div class="contact-icon"><img src="https://img.icons8.com/bubbles/50/000000/phone--v1.png"/></div>
            <div class="contact-info">
                <h1>Phone</h1>
                <h2>03- 7972 3915</h2>
            </div>
            </div>
            <div class="contact-section">
                <div class="contact-icon"><img src="https://img.icons8.com/bubbles/50/000000/email--v1.png"/></div>
            <div class="contact-info">
                <h1>Email</h1>
                <h2>xikita9321@ecofreon.com</h2>
            </div>
            </div>
            <div class="contact-section">
                <div class="contact-icon"><img src="https://img.icons8.com/bubbles/50/000000/address.png"/></div>
            <div class="contact-info">
                <h1>Address</h1>
                <h2>LOT 5317, KAMPUNG NANDING, 
                    BATU 12 JALAN HULU LANGAT, 43100 SELANGOR</h2>
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