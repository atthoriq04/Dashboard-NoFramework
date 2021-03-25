<?php
    $connect = mysqli_connect('localhost','root','root','dashboard1');
    // Fungsi If tidak akan berjalan jika Login belum di Set.
    if (isset($_POST['Login'] ) ){
        session_start();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = mysqli_query($connect,"SELECT * FROM users WHERE email = '$email'");    //Untuk Apakah pengguna telah terdaftar/ belum.
        
        if(mysqli_num_rows($user)=== 1){
            $pass = mysqli_fetch_assoc($user); // Untuk mengambil data yang ada lalu menyiapkannya untuk proses selanjutnya.
           if( password_verify($password, $pass['Password'])){ // Menguji Apakah password yang dimasukkan User sama dengan Enkripsi password yang ada di Database
                $_SESSION["User"] = true;
                header("location:../dashboard/homepage.php");
                exit;
           }
        }
        $error = true;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN</title>
        <link rel="stylesheet" href="../home.css">
    </head>
    <body>

        <?php if(isset($error)){?>
            <p id="error"> Email/Password Salah</p>
        </p>
        <?php } ?>
        <?php
                if(isset( $_SESSION["User"])){
                    header('location:../dashboard/homepage.php'); 
                }
            ?>
        <div id="Login">
            <div id="form">
                <form action="" method="POST">
                    <div class ="form">
                        <center><input type="email" name="email" placeholder=" Email" autocomplete="off"> </center><br>
                        <center><input type="password" name="password" placeholder=" password" autocomplete="off"> </center>
                    </div><br>
                    <center><input type="submit" name="Login" value="Login"> </center>

                </form>
            </div>
        </div>
        <div id="side">
            <a href="../index.php">Kembali ke Home</a>
        </div>
<?php Require_once('../template/footer1.php'); ?>