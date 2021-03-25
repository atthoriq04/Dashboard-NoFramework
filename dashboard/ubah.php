<?php require_once('../template/Dasheader.php')?>
<?php
    require "proses.php";
    $id = $_GET["id"];

    // Memproses Perubahan data yang dilakukan dalam file Proses.php
    $buku = querytampil("SELECT * FROM databuku WHERE id = $id")[0];
    if(isset($_POST["ubah"]) ){

        if(ubah($_POST) >0){
            echo "<script>alert('Data berhasil diubah');
            document.location.href= 'DATA.php';
            </script>";
        }else{
            echo "<script>alert('Data gagal diubah')
            </script>";
        }

    }
?>
    <main>
        <?php
            session_start();
            if(isset( $_SESSION["User"])){ ?>
        <?php
            }else{
                header('location:../index.php');
            }
        ?>
        <h1>Ubah Data</h1>
        <br>
        <form action="" Method="POST" class="form1">
            <input type="hidden" name="id" value="<?= $buku["id"]; ?>" autocomplete="off">
            <input type="text" name="judul" value="<?= $buku["judulbuku"]; ?>" autocomplete="off">
            
            <input type="text" name="penulis" value="<?= $buku["penulis"]; ?>" autocomplete="off">
            
            <input type="text" name="penerbit" value="<?= $buku["penerbit"]; ?>" autocomplete="off">
            <br><br>
            <input type="number" name="Year" value="<?= $buku["tahunterbit"]; ?>" autocomplete="off">
            
            <input type="number" name="ISBN" value="<?= $buku["ISBN"]; ?>" autocomplete="off">
            
            <input type="text" name="kategori" value="<?= $buku["Kategori"]; ?>" autocomplete="off">
            <br><br>
            <button type="submit" name="ubah">Ubah</button>
        </form>
    </main>
<?php require_once('../template/footer1.php') ?>