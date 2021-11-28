<?php

session_start();

include("header.php");
include("../dbconnect.php");

$user_id = "";
$userDetails = [];

//retrieve data from db
$sql = "SELECT user_name, user_dri, user_packages, instructor, transportation_service, lesson_start_date, ava_time, ava_days, user_notes, user_notes_update FROM user WHERE user_id='" . $_SESSION['user_id'] . "'";

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

<?php

include("header.php");
include("../dbconnect.php");

$user_notes_update = $update_notify = $user_id = "";

$errors = array();

//save data to db
$sql = "SELECT * FROM `user` WHERE user_id='" . $_SESSION['user_id'] . "'";

$result = mysqli_query($conn, $sql);
$user_data = mysqli_fetch_assoc($result);


if(isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $user_notes_update = mysqli_real_escape_string($conn, $_POST['user_notes_update']);
    $update_notify = mysqli_real_escape_string($conn, $_POST['update_notify']);

    //print_r($errors);
    if (!array_filter($errors)) {

        $sql = "UPDATE `user` SET `user_notes_update` = '$user_notes_update', `update_notify` = '$update_notify' WHERE `user` . `user_id` = '$user_id'";

        //echo $sql;

        $result = mysqli_query($conn, $sql);
        if($result) {
            $sql = "SELECT * FROM `user` WHERE user_id='" . $_SESSION['user_id'] . "'";
            $result = mysqli_query($conn, $sql);
            $user_data = mysqli_fetch_assoc($result);
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
        
    }
}
    
?>

<title>Profile - Packages</title>
<link rel="stylesheet" href="./css/profile_packages.css">
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

    <!-- Packages Section  -->
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

                    <form action="propackages.php" method="POST">
                        <div id="packages"><h1>Packages</h1></div>
                        <div class="row">
                            
                            <div class="column-left">
                                <label for="name">Driving Institute:</label>
                            </div>
                            <div class="column-right">
                            <div>
                            <label><?php echo $userDetails["user_dri"]; ?></label>
                            </div>
                        </div>
                        <div class="row">

                            <div class="column-left">
                                <label for="name">Packages have chosen:</label>
                            </div>
                            <div class="column-right">
                            <label><?php echo $userDetails["user_packages"]; ?></label>
                            </div>
                        </div>
                        <div class="row">
                            
                        <div class="column-left">
                                <label for="name">Instructor preference:</label>
                            </div>
                            <div class="column-right">
                            <label><?php echo $userDetails["instructor"]; ?></label>
                            </div>
                        </div>
                        <div class="row">

                            <div class="column-left">
                                <label for="name">Transportation service:</label>
                            </div>
                            <div class="column-right">
                                <label><?php echo $userDetails["transportation_service"]; ?></label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="details container1">
                <div id="date_time"><h1>Date &amp Time:</h1></div>
                        <div class="row">
                            
                            <div class="column-left">
                                <label for="name">Estimate lessons starting date:</label>
                            </div>
                            <div class="column-right">
                            <div>
                            <label><?php echo $userDetails["lesson_start_date"]; ?></label>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="column-left">
                            <label for="name">Available time for lessons:</label>
                            </div>
                            <div class="column-right">
                            <div>
                            <label><?php echo $userDetails["ava_time"]; ?></label>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="column-left">
                            <label for="name">Available days for lessons:</label>
                            </div>
                            <div class="column-right">
                            <div>
                            <label><?php echo $userDetails["ava_days"]; ?></label>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="column-left">
                            <label for="name">Note details for driving lessons:</label>
                            </div>
                            <div class="column-right">
                            <div>
                            <label><?php echo $userDetails["user_notes"]; ?></label>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="column-left">
                            <label for="name">Update Lessons Date &amp Time:</label>
                            </div>
                            <div class="column-right">
                            <div>
                            <textarea id="location" name="user_notes_update" cols="60" rows="10" placeholder="Pls specific date & time for the update." value="<?php echo $user_notes_update ?>"><?php echo $userDetails["user_notes_update"]; ?>
                            </textarea>
                            <div class="red">*Pls update the lesson date and time if you would like to change to the other days. Pls check message regularly to get approval by admin.</div>
                            </div>

                            <!--show update message in admin page-->
                            <input type="hidden" id="msg_notify" name="update_notify" value="1">

                        </div>

                        <div class="placebtn">
                        <button type="submit" name="submit" class="button" value="submit">Update</button>
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