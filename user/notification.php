<?php

session_start();

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



<title>Profile - Notification</title>
<link rel="stylesheet" href="./css/profile_notification.css">
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

    <!-- Notification Section  -->
    <section id="profile">
        <div class="profile container">
            <div class="side-nav">
                <img src="./image/ppl_icon.jpg" alt="img">
                <h2><?php echo $userDetails["user_name"]; ?></h2>
                <button class="dropdown-btn">Profile 
                    <i class="fa fa-caret-down"></i>
                </button>
                    <div class="dropdown-container">
                        <a href="Profile.php">User Details</a>
                        <a href="Profile.php">Payment Method</a>
                    </div>
                <a href="propackages.php">Packages</a>
                <a href="notification.php">Notification</a>
                <hr>
                <a href="logout.php">Logout</a>
                </div>
                <div class="main">
                    <div class="details container1">
                    <div class="cardtitle">
                <h2>Notification</h2>
            </div>
        
            <div class="row">
                <div class="column-left">
                    <label for="send_date">Currently date and time:</label>
                </div>
                <div class="column-right">
                <span id='date-time'></span>
                </div>
            </div>

            <div class="row">
                <div class="column-left">
                    <label for="recipient">To:</label>
                </div>
                <div class="column-right">
                    <label><?php echo $userDetails["user_name"]; ?></label>
                </div>
            </div>

            <div class="row">
                <div class="column-left">
                    <label for="sender">From:</label>
                </div>
                <div class="column-right">
                    <label for="" name="msg_from">Sheila</label>
                </div>
            </div>

            <div class="row">
                    <div class="column-left">
                        <label for="message">Message:</label>
                    </div>
                    <div class="column-right2">
                        <label for="message" name="reply_msg">Your driving lesson schedule has been approved by the admin. Pls, attend rearranged schedule for your driving lesson packages.<h3></h3></label></td>
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

    <script>
    var dt = new Date();
    document.getElementById('date-time').innerHTML=dt;
    </script>
    
</body>
</html>