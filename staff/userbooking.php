<?php

include("../header.php");
include("../dbconnect.php");

$user_id = "";
$userDetails = [];


//retrieve data from db

$sql = "SELECT * FROM user WHERE user_learner IS NOT NULL ";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);


?>

<title>User Booking - Staff</title>
<link rel="stylesheet" href="./css/userbooking.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <!-- Navigation-->
    <div class="container">
        <div class="nav">
            <div class="brand">
                <a href="dashboard.php"><img src="../user/image/logo3.png" class="logo" alt="logo" id="logo"></a>
            </div>
            <ul>
                <li>
                    <a href="dashboard.php">
                        <span class="icon"><i class="fa fa-home"></i></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="userdetails.php">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <span class="title">User Details</span>
                    </a>
                </li>
                <li>
                    <a href="userbooking.php">
                        <span class="icon"><i class="fa fa-ticket"></i></span>
                        <span class="title">User Booking</span>
                    </a>
                </li>
                <li>
                    <a href="message.php">
                        <span class="icon"><i class="fa fa-envelope"></i></span>
                        <span class="title">Message</span>
                    </a>
                </li>
                <li>
                    <a href="reply.php">
                        <span class="icon"><i class="fa fa-reply"></i></span>
                        <span class="title">Reply</span>
                    </a>
                </li>
                <li>
                    <a href="personal.php">
                        <span class="icon"><i class="fa fa-id-card-o"></i></span>
                        <span class="title">Admin Information</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon"><i class="fa fa-sign-out"></i></span>
                        <span class="title">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>

    <!--main-->
    <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="fa fa-bars"></i>
                </div>
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <i class="fa fa-search"></i>
                    </label>
                </div>
                <div class="user">
                    <img src="../user/image/ppl_icon.jpg" alt="user_img">
                </div>
            </div>

    <!--user booking-->
    <div class="userbooking">
        <div class="recentbookings">
            <div class="cardtitle">
                <h2>User Booking</h2>
                
            </div>
                <table>
                    <thead>
                        <tr>
                            <td>User_ID</td>
                            <td>User Name</td>
                            <td>New Learner</td>
                            <td>Driving Institute</td>
                            <td>Packages</td>
                            <td>Instructor</td>
                            <td>Transport</td>
                            <td>Available lessons days</td>
                            <td>Available time for lessons</td>
                            <td>Note for the lessons Date & Time</td>
                            <td>Update for the lessons Date & Time</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if($resultCheck > 0) {
                            while ($userDetails = mysqli_fetch_assoc($result)) {

                    ?>
                        <tr>
                            <td><?php echo $userDetails["user_id"]; ?></td>
                            <td><?php echo $userDetails["user_name_2"]; ?></td>
                            <td><?php echo $userDetails["user_learner"]; ?></td>
                            <td><?php echo $userDetails["user_dri"]; ?></td>
                            <td><?php echo $userDetails["user_packages"]; ?></td>
                            <td><?php echo $userDetails["instructor"]; ?></td>
                            <td><?php echo $userDetails["transportation_service"]; ?></td>
                            <td><?php echo $userDetails["ava_days"]; ?></td>
                            <td><?php echo $userDetails["ava_time"]; ?></td>
                            <td><?php echo $userDetails["user_notes"]; ?></td>
                            <td><?php echo $userDetails["user_notes_update"]; ?></td>
                        </tr>
                        <?php
                        }
                    }
                    ?>
                    </tbody>    
                </table>
        </div>



    <script>
    //main toggle
    let toggle = document.querySelector('.toggle');
    let nav = document.querySelector('.nav');
    let main = document.querySelector('.main');

    toggle.onclick = function() {
        nav.classList.toggle('active');
        main.classList.toggle('active');
    }

    //add hovered to selected nav
    let list = document.querySelectorAll('.nav li');
    function activeLink() {
        list.forEach((item) =>
        item.classList.remove('hovered'));
        this.classList.add('hovered');
    }
    list.forEach((item) =>
    item.addEventListener('mouseover',activeLink));
    </script>

</body>
</html>