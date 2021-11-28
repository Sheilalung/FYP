<?php

session_start();

include("header.php");
include("../dbconnect.php");

$user_id = "";
$userDetails = [];

//retrieve data from db
$sql = "SELECT user_name, user_name_2, user_nric, user_dob, user_gender, user_email, user_phonenum, user_location, name_card, card_num FROM user WHERE user_id='" . $_SESSION['user_id'] . "'";

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

<title>User Profile</title>
<link rel="stylesheet" href="./css/profile_details.css">
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

    <!-- Payment Content Section  -->
    <section id="profile">
        <div class="profile container">
            <div class="side-nav">
                <img src="./image/ppl_icon.jpg" alt="img">
                <h2><?php echo $userDetails["user_name"]; ?></h2>
                <button class="dropdown-btn">Profile 
                    <i class="fa fa-caret-down"></i>
                </button>
                    <div class="dropdown-container">
                        <a href="#User_Details">User Details</a>
                        <a href="#Payment Method">Payment Method</a>
                    </div>
                <a href="propackages.php">Packages</a>
                <a href="notification.php">Notification</a>
                <hr>
                <a href="logout.php">Logout</a>
                </div>
                <div class="main">
                    <div class="details container1">
                    <form action="Profile.php" method="POST">
                        <div id="User_Details"><h1>User Details</h1></div>
                        <div class="row">
                            
                            <div class="column-left">
                                <label for="name">Full Name (as per IC/Passport):</label>
                            </div>
                            <div class="column-right">
                            <div>
                            <label><?php echo $userDetails["user_name_2"]; ?></label>
                            </div>
                        </div>

                        <div class="row">

                            <div class="column-left">
                                <label for="nric">NRIC No.:</label>
                            </div>
                            <div class="column-right">
                            <label><?php echo $userDetails["user_nric"]; ?></label>
                            </div>
                        </div>

                        <div class="row">
                            
                        <div class="column-left">
                                <label for="DOB">Date of birth:</label>
                            </div>
                            <div class="column-right">
                            <label><?php echo $userDetails["user_dob"]; ?></label>
                            </div>
                        </div>

                        <div class="row">
                            
                        <div class="column-left">
                                <label for="gender">Gender:</label>
                            </div>
                            <div class="column-right">
                            <label><?php echo $userDetails["user_gender"]; ?></label>
                            </div>
                        </div>

                        <div class="row">
                            
                        <div class="column-left">
                                <label for="email">Email:</label>
                            </div>
                            <div class="column-right">
                            <label><?php echo $userDetails["user_email"]; ?></label>
                            </div>
                        </div>

                        <div class="row">
                            
                        <div class="column-left">
                                <label for="phnum">Phone number:</label>
                            </div>
                            <div class="column-right">
                            <label><?php echo $userDetails["user_phonenum"]; ?></label>
                            </div>
                        </div>

                        <div class="row">

                            <div class="column-left">
                                <label for="address">Address:</label>
                            </div>
                            <div class="column-right">
                                <label><?php echo $userDetails["user_location"]; ?></label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="details container1">
                <div id="Payment Method"><h1>Payment Method</h1></div>
                        <div class="row">
                            
                            <div class="column-left">
                                <label for="name">Name on Card:</label>
                            </div>
                            <div class="column-right">
                            <div>
                            <label><?php echo $userDetails["name_card"]; ?></label>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="column-left">
                            <label for="fname">Card Number:</label>
                            </div>
                            <div class="column-right">
                            <div>
                            <label><?php echo $userDetails["card_num"]; ?></label>
                            </div>
                        </div>       
                </div>
            </form>
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