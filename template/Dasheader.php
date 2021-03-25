<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="dashboard.css">
    </head>
    <body>
        <nav>
            <a href="homepage.php" class="awal">HOME</a><br>
            <a href="DATA.php" class="awal">Books List</a><br>
            <a href="input.php" class="awal">Add Books</a><br>
            <form action="" method="POST" class="logout">
                <center><input type="submit" name="logout" value="logout"></center>
            </form>
        </nav>


    <?php
        if(isset($_POST["logout"])){
            session_start();
            session_destroy();
            session_unset();
            header('location:../index.php');
        } 
    ?>