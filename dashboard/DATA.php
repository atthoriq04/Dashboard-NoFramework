<?php require_once('../template/Dasheader.php')?>
<?php
    require 'proses.php';
    // Membuat Formula untuk melakukan Pagination
    $limit = 10;
    $total = count(querytampil("SELECT * FROM databuku"));
    $halaman = ceil($total / $limit);
    $aktif = (isset($_GET["p"] )) ? $_GET["p"] : 1;
    $mulai = ($limit * $aktif) - $limit;


    //Proses menampilkan keseluruhan data bersama dengan Pagination
    $data = querytampil("SELECT * FROM databuku LIMIT $mulai, $limit");

    //menguji data yang dicari, mencocokkan dengan yang ada pada database
    if (isset($_POST["search"]) ){
        $hasil = $_POST["cari"];
        $data = querytampil("SELECT * FROM databuku WHERE 
        Kategori LIKE '%$hasil%' OR
        judulbuku LIKE '%$hasil%' OR
        penulis LIKE '%$hasil%' OR
        penerbit LIKE '%$hasil%' OR
        tahunterbit LIKE '%$hasil%' OR
        ISBN LIKE '%$hasil%' ");
    }


?>
        <main>
            <?php
                //mengecek Session yang telah diset saat login
                session_start();
                if(isset( $_SESSION["User"])){ ?>
            <?php
                }else{
                    header('location:../index.php');
                }
            ?>
            <h1>Data - Data Buku</h1>
            <br>
            <!-- Form untuk Meelakukan pencarian -->
            <form action="" method="POST" id="caris">
                <input type="text" name="cari" placeholder="SEARCH" id="caris" autofocus autocomplete="off">
                <button type="submit" name="search" id="sub">cari</button>
            </form>
            <br>
            <!-- Menampilkan Nomor Halaman Pagination -->
            <?php if($aktif > 1) : ?>
                <a href="?p=<?= $aktif - 1;  ?>"id="pa"><<||</a>
            <?php endif; ?>
            <div id="p">
                <?php for($i = 1 ; $i <= $halaman; $i++ ) : ?>
                    <?php if($i == $aktif): ?>
                        <a href="?p=<?= $i ?>" id="hal" class="hal"> <?= $i ?></a>
                    <?php else : ?>
                        <a href="?p=<?= $i ?>" class="hal">||<?= $i ?>||</a>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
            <?php if($aktif < $halaman) : ?>
                <a href="?p=<?= $aktif + 1;  ?>" id="pag">>>||</a>
            <?php endif; ?>
        
            <br>
            <br>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>Id</th>
                    <th>Kategori</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th> ISBN </th>
                    <th>Aksi</th>
                </tr>
                <?php foreach($data as $buku) : ?>
                <!-- Menampilkan data yang diproses di atas -->
                <tr>
                    <td><?= $buku["id"] ?></td>
                    <td><?= $buku["Kategori"] ?></td>
                    <td><?= $buku["judulbuku"] ?></td>
                    <td><?= $buku["penulis"] ?></td>
                    <td><?= $buku["penerbit"] ?></td>
                    <td><?= $buku["tahunterbit"] ?></td>
                    <td><?= $buku["ISBN"] ?></td>
                    <td><a href="ubah.php?id=<?= $buku["id"] ?>">Ubah</a> || <a href="hapus.php?id=<?= $buku["id"] ?>" onclick="return confirm('Yakin');">Hapus</a></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </main>
<?php require_once('../template/footer1.php') ?>