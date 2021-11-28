<?php
include("header.php")
?>

<title>User Packages</title>
<link rel="stylesheet" href="./css/Userpackages.css">
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
                        <li><a href="UserDetails.php" data-after="Booking">Booking</a></li>
                        <li><a href="Contactus.php" data-after="Contact Us">Contact Us</a></li>
                        <li><a href="Profile.php" data-after="Profile">Profile</a></li>
                        <li><a href="logout.php" data-after="Logut">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- User Packages Content Section  -->
    <section id="profile">
        <div class="profile container">
            <div class="side-nav">
                <img src="./image/ppl_icon.jpg" alt="img">
                <a href=""><h2>User Name</h2></a>
                <button class="dropdown-btn">Profile 
                    <i class="fa fa-caret-down"></i>
                </button>
                    <div class="dropdown-container">
                        <a href="Profile.php">User Details</a>
                        <a href="#Payment Method">Payment Method</a>
                    </div>
                <a href="UserPackages.php">Packages</a>
                <a href="#">Notification</a>
                <a href="#">Unknow</a>
                <a href="#">Unknow</a>
                <hr>
                <a href="#">Logout</a>
                </div>
                <div class="main">
                    <div class="details container1">
                    <form action="">
                        <div id="Packages"><h1>Packages</h1></div>
                        <div class="row">
                            
                            <div class="column-left">
                                <label for="name">Driving institute:</label>
                            </div>
                            <div class="column-right">
                            <div>
                                <label>#</label>
                            </div>
                        </div>
                        <div class="row">

                            <div class="column-left">
                                <label for="name">Types of packages:</label>
                            </div>
                            <div class="column-right">
                                <label>#</label>
                            </div>
                        </div>
                        <div class="row">
                            
                        <div class="column-left">
                            <label for="name">Instructor preference:</label>
                            </div>
                            <div class="column-right">
                            <label>#</label>
                            </div>
                        </div>
                        <div class="row">

                            <div class="column-left">
                                <label for="address">Transportation Service:</label>
                            </div>
                            <div class="column-right">
                                <label>#</label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="details container1">
                <div><h1>Date & Time</h1></div>
                        <div class="row">
                            
                            <div class="column-left">
                                <label for="name">Estimate lessons begin:</label>
                            </div>
                            <div class="column-right">
                            <div>
                                <label>#</label>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="column-left">
                                <label for="fname">Available time for lessons:</label>
                            </div>
                            <div class="column-right">
                            <div>
                                <label>#</label>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="column-left">
                                <label for="fname">Available days for lessons:</label>
                            </div>
                            <div class="column-right">
                            <div>
                                <label>#</label>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="column-left">
                                <label for="fname">Note for the Lessons Date&Time:</label>
                            </div>
                            <div class="column-right">
                            <div>
                                <label>#textarea</label>
                            </div>
                        </div>
            </div>
        </div>
    </section>


    

    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
        } else {
        dropdownContent.style.display = "block";
        }
        });
        }
    </script>

    <script src="./nav.js"></script>
    
</body>
</html>