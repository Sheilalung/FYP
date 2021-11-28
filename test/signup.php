<?php
session_start();

include("dbconn.php");
include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //Save all the data
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];

        if(!empty($user_name) && !empty($user_password) && !is_numeric($user_name))
        {
            //save to db
            $user_id = random_num(20); //put any number length u want
            $sql = "INSERT INTO user(user_id, user_name, user_password) VALUES ('$user_id', '$user_name', '$user_password')";

            mysqli_query($conn, $sql);
            header("location:login.php");
            die;

        } else {
            echo 'Pls enter some valid information!';
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="user_password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>