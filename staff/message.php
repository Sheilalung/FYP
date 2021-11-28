<title>Message - Staff</title>
<link rel="stylesheet" href="./css/Message.css">
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

    <!--show message-->
    <div class="message">
        <div class="recentmessage">
            <div class="cardtitle">
                <h2>Message</h2>
                <a href="messageall.php" class="btn">View All</a><!---->
            </div>

            <?php

            include("../header.php");
            include("../dbconnect.php");

            $user_id = "";
            $userDetails = [];


            //retrieve user data from db

            $sql = "SELECT * FROM user WHERE update_notify OR message_notify IS NOT NULL";


            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            ?>
            <table>
                    <thead>
                        <tr>
                            <h2>User</h2>

                            <td>User ID</td>
                            <td>User Name</td>
                            <td>Profile Pic</td>
                            <td>User Email</td>
                            <td>Message</td>
                            <td>Lesson update notes</td>
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
                            <td>Stay Tuned</td>
                            <td><?php echo $userDetails["user_email"]; ?></td>
                            <td><?php echo $userDetails["message_notify"]; ?></td>
                            <td><?php echo $userDetails["update_notify"]; ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
                    </tbody>    
                </table>

            
                <?php

                include("../header.php");
                include("../dbconnect.php");

                $vis_id = "";
                $visitorDetails = [];


                //retrieve visitor data from db

                $sql = "SELECT * FROM visitor WHERE vis_id";

                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                ?>
                <table>
                    <thead>
                        <tr>
                            <br>
                            <h2>Visitor</h2>

                            <td>Visitor ID</td>
                            <td>Visitor Name</td>
                            <td>Visitor Email</td>
                            <td>Visitor Subject</td>
                            <td>Visitor Message</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if($resultCheck > 0) {
                            while ($visitorDetails = mysqli_fetch_assoc($result)) {

                    ?>
                        <tr>
                            <td><?php echo $visitorDetails["vis_id"]; ?></td>
                            <td><?php echo $visitorDetails["vis_name"]; ?></td>
                            <td><?php echo $visitorDetails["vis_email"]; ?></td>
                            <td><?php echo $visitorDetails["vis_subject"]; ?></td>
                            <td><?php echo $visitorDetails["vis_message"]; ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
                    </tbody>    
                </table>
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