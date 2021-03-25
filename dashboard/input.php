<?php require_once('../template/Dasheader.php')?>
<?php
    require 'proses.php';

    //Proses menambahkan data yang dilakukan dari file proses.php
    if(isset($_POST['tambah']) ){
        if(insert($_POST) >0 ){
            echo "<script>alert('Data berhasil ditambah');
            document.location.href= 'DATA.php';
            </script>";
        }else{
            echo "<script>alert('Data gagal ditambah')
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
            <h1>Masukan Data ke Database</h1>
            <br>
            <form action="" Method="POST" class="form1">
                <input type="text" name="judul" placeholder="Masukkan Judul Buku" required autocomplete="off">
                
                <input type="text" name="penulis" placeholder="Masukkan Nama Penulis" required autocomplete="off">
                
                <input type="text" name="penerbit" placeholder="Masukkan Nama penerbit" required autocomplete="off">
                <br><br>
                <input type="number" name="Year" placeholder="Masukan Tahun terbit" required autocomplete="off">
                
                <input type="number" name="ISBN" placeholder="Masukkan nomor ISBN" required autocomplete="off">
                
                <input type="text" name="kategori" placeholder="Masukkan kategori Buku" autocomplete="off">
                <br><br>
                <button type="submit" name="tambah" id="button">Tambahkan</button>
            </form>
        </main>
<?php require_once('../template/footer1.php') ?>