<?php 
session_start();
$connect = mysqli_connect('localhost','root','root','dashboard1');
    if(isset($_POST['regis']) ){
        
        function pendaftar($data){
           global $connect;
            // Mendeklarasikan Variabel yang didapat dari POST 
            $username = strtolower(stripslashes($data["username"]));// Untuk menghurufkecilkkan semua User, dan Menghilangkan tanda slash jika ada User yang menginputnya.
            $email = $_POST['Remail'];
            $password = mysqli_real_escape_string($connect, $data['Rpassword']); //memastikan password yang di input adalah String
            $password2 = mysqli_real_escape_string($connect, $data['Rpassword2']);
            
            // Mengecek Username, Apakah telah ada yang mendaftar sebelumnya, Atau belum.
            $tes = mysqli_query($connect,"SELECT Username From Users WHERE Username = '$username'");
            if (mysqli_fetch_assoc($tes) ){
                echo "<script>
                   alert ('Username telah ada');
                </script>" ; 
                return false;
            }
            // Mengecek kesamaan Password yang di input oleh User
            if($password !== $password2){
                echo "<script>
                   alert ('Password tidak sama!');
                </script>" ; 
                return false;
            }
            
            // Proses Enkripsi Password
            $password = password_hash($password, PASSWORD_DEFAULT);
            // Proses pemasukkan data ke dalam Database
            mysqli_query($connect, "INSERT INTO users(Username, Email, Password)
                VALUES('$username','$email','$password')");
            return mysqli_affected_rows($connect);
        }
        // Jika isi dari Fungsi telah ada, Maka User dimasukan ke dalam Database
        if (pendaftar($_POST) > 0){
            Echo "<script>
                    alert ('user berhasil didaftarkan!');
            </script>";
            header("location:login.php");
        }else{
            //menampilkan pesan Error jika Register Gagal
            echo mysqli_error($connect);
        }
    }
    if(isset( $_SESSION["User"])){
        header('location:../dashboard/homepage.php'); 
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="../home.css">
    </head>
    <body>
        <div id="Regis">
            <div id="formregis">
                <form action="" method="POST">
                    <div class ="form">
                        <center>
                            <input type="text" name="username" placeholder=" Buat Username" autocomplete="off"><br><br>
                            <input type="email" name="Remail" placeholder=" Masukan Email" autocomplete="off"><br><br> 
                            <input type="password" name="Rpassword" placeholder=" Buat Password" autocomplete="off"><br><br>
                            <input type="password" name="Rpassword2" placeholder=" Repeat Password" autocomplete="off"><br>
                        </center>
                    </div><br>
                    <center><input type="submit" name="regis" value="Register"> </center>

                </form>
            </div>
        </div>
        <div id="side">
            <a href="../index.php">Kembali ke Home</a>
        </div>
<?php Require_once('../template/footer1.php'); ?>