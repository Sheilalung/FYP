<?php

session_start();

include("../header.php");
include("../dbconnect.php");

$admin_id = "";
$adminDetails = [];

//retrieve admin data from db
$sql = "SELECT admin_name FROM `admin` WHERE admin_id='" . $_SESSION['admin_id'] . "'";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0) {
    //output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        foreach($row as $key => $value) {
            $adminDetails[$key] = $value;
        }
        
    }
} else {
    echo "0 results";
}
    
?>

<?php

include("../header.php");
include("../dbconnect.php");

$reply_msg = $msg_to = $msg_from = "";
$errors = array();

if(isset($_POST['submit'])) {
    $reply_msg = mysqli_real_escape_string($conn, $_POST['reply_msg']);
    $msg_to = mysqli_real_escape_string($conn, $_POST['msg_to']);
    $msg_from = mysqli_real_escape_string($conn, $_POST['admin_name']);

    
    if (!array_filter($errors)) {

        $sql = "INSERT INTO `message`(reply_msg, msg_to, msg_from) VALUES ('$reply_msg', '$msg_to', '$msg_from')";


        if(mysqli_query($conn, $sql)) {
            header('Location: reply.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }
    }

?>


<title>Reply - Staff</title>
<link rel="stylesheet" href="./css/admin_reply.css">
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

    <!--reply-->
    <div class="userbooking">
        <div class="recentbookings">
            <div class="cardtitle">
                <h2>Reply message</h2>
                <form action="reply.php" method="POST">
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
                    <label for="sender">Sender:</label>
                </div>
                <div class="column-right">

                    <input type="text" name="admin_name" placeholder="Enter your name" value="<?php echo $adminDetails["admin_name"]; ?>" value="<?php echo $msg_from ?>">

                </div>
            </div>

            <div class="row">
                <div class="column-left">
                    <label for="recipient">Recipient:</label>
                </div>
                <div class="column-right">
                    
                <input type="text" name="msg_to" placeholder="Name a user"  value="<?php echo $msg_to ?>">
                    
                </div>
            </div>

            <div class="row">
                    <div class="column-left">
                        <label for="message">Message:</label>
                    </div>
                    <div class="column-right">
                        <textarea id="message" name="reply_msg" cols="60" rows="10" placeholder="Type message here" value="<?php echo $reply_msg ?>"><?php echo $reply_msg; ?></textarea>
                    </div>
                </div>

            <div class="placebtn">
            <button type="submit" name="submit" class="button" value="submit">Send</button>
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

    <script>
    var dt = new Date();
    document.getElementById('date-time').innerHTML=dt;
    </script>

</body>
</html>