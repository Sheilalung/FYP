<?php

include("../header.php");
include("../dbconnect.php");

$user_id = "";
$userDetails = [];


//retrieve user data from db

$sql = "SELECT * FROM user WHERE user_id";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

?>

<title>Home - Staff</title>
<link rel="stylesheet" href="./css/dashdash.css">
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

            <!--Cards-->
            <div class="cardbox">
                <div class="card">
                    <div>
                        <div class="numbers">1,200</div>
                        <div class="cardname">Daily Views</div>
                    </div>
                    <div class="iconbox">
                    <i class="fa fa-eye"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">50</div>
                        <div class="cardname">Booking</div>
                    </div>
                    <div class="iconbox">
                    <i class="fa fa-check-square-o"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">120</div>
                        <div class="cardname">Message</div>
                    </div>
                    <div class="iconbox">
                    <i class="fa fa-envelope"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">10</div>
                        <div class="cardname">New Users</div>
                    </div>
                    <div class="iconbox">
                    <i class="fa fa-user"></i>
                    </div>
                </div>
            </div>

            <!--boking details-->
            <div class="booking">
                <div class="recentbookings">
                    <div class="cardtitle">
                        <h2>Recent Bookings</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>User Name</td>
                                <td>Package</td>
                                <td>Payment</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sheila Chong</td>
                                <td>Class D</td>
                                <td>Paid</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Joel Lim</td>
                                <td>Class D</td>
                                <td>Paid</td>
                                <td><span class="status complete">Complete</span></td>
                            </tr>
                            <tr>
                                <td>Joshua Teh</td>
                                <td>Class B2</td>
                                <td>In-progress</td>
                                <td><span class="status error">Error</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!--New User-->
                <div class="recentusers">
                    <div class="cardtitle">
                        <h2>Recent Users</h2>
                    </div>
                    <table>
                    <?php
                        if($resultCheck > 0) {
                            while ($userDetails = mysqli_fetch_assoc($result)) {

                    ?>
                        <tr>
                            <td width="60px"><div class="imgsize"><img src="../user/image/ppl_icon.jpg" alt="user_img"></div></td>
                            <td><h4><?php echo $userDetails["user_name"]; ?><br><span><?php echo $userDetails["location_state"]; ?></span></h4></td>
                        </tr>
                        
                        <?php
                    }
                }
                ?>
                    </table>
                </div>

            </div>

        </div>
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