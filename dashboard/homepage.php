<?php Require_once('../template/Dasheader.php'); ?>
    <?php require("proses.php"); ?>
        <main>
            <?php
                session_start();
                if(isset( $_SESSION["User"])){ ?>
            <?php
                }else{
                    header('location:../index.php');
                }
            ?>
            <h1> Selamat Datang </h1>
            <P> Status Data Buku  </P>
            <br>
            <!-- Menampilkan Jumlah Buku Secara keseluruhan-->
            <article>
                <h3> Jumlah Buku</h3>
                <?php 
                $jbuku = count(querytampil("SELECT * FROM databuku"));
                ?>
                <center><h3>Jumlah Buku : <?= $jbuku; ?> </h3></center>
            </article>
            <!-- Menampilkan hanya jumlah kategori yang berbeda-->
            <article>
                <h3> Jumlah Kategori Buku</h3>
                <?php 
                $Jumlahkategori = count(kat("SELECT DISTINCT Kategori FROM databuku "));
                ?>
                <center>
                    <h3>Jumlah Kategori : <?= $Jumlahkategori; ?> </h3>
                </center>
            </article>
            <!-- Menampilkan hanya jumlah penerbit yang berbeda-->
            <article>
                <h3> jumlah Penerbit</h3>
                <?php 
                $Jumlahpenerbit = count(kat("SELECT DISTINCT penerbit FROM databuku "));
                ?>
                <center>
                    <h3>Jumlah Penerbit : <?= $Jumlahpenerbit; ?> </h3>
                </center>                
            </article>
            <!-- Menampilkan hanya Judul buku yang berada di index paling bawah-->
            <article>
                <h3> Buku terakhir yang Ditambahkan</h3>
                <?php
                $akhir = querytampil("SELECT * FROM databuku");
                $Buter = count(querytampil("SELECT * FROM databuku"));
                $terakhir = ($Buter - 1);

                ?>
                <center><h3><?= $akhir["$terakhir"]["judulbuku"]?></h3></center>
            </article>

        </main>
<?php require_once('../template/footer1.php') ?>