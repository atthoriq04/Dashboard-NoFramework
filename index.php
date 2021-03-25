<html>
    <head>
        <title>Menuju Dashboard</title>
        <link rel="stylesheet" href="home.css">
    </head>
    <body>
            <?php
                session_start();
                if(isset( $_SESSION["User"])){ 
                    header('location:dashboard/homepage.php');
                }
            ?>
        <div id="kartu">
            <p id="front"> Private Book List</p>
            <div id="belakang">
                <center><a href="login-register/login.php">Login</a><br><br></center>
                <center><a href="login-register/register.php">Register</a></center>
            </div>
        </div>
<?php Require_once('template/footer1.php'); ?>