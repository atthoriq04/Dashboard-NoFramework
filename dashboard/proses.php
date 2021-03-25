<?php
    //Melakukan koneksi ke dalam Database
    $connect = mysqli_connect("localhost","root","root","dashboard1");

    //Function untuk mengabil data
    function querytampil($datas){
        global $connect;
        $dok = mysqli_query($connect , $datas);
        $field = [];
        while($data = mysqli_fetch_assoc($dok) ){
            $field [] = $data;
        }
        return $field;
        
    }
    
    //function untuk menampilkan error
    function error(){
        global $connect;
        mysqli_error($connect);
    }

    //Function untuk menambah data
    function insert($tambah){
        global $connect;
        //Memasukkan data yang didapat dari $_POST ke dalam variabel baru
        $judul = htmlspecialchars($tambah["judul"]);
        $penulis = htmlspecialchars($tambah["penulis"]);
        $penerbit = htmlspecialchars($tambah["penerbit"]);
        $ISBN = htmlspecialchars($tambah["ISBN"]);
        $kategori = htmlspecialchars($tambah["kategori"]);
        $tahun = htmlspecialchars($tambah["Year"]);
        
        //Proses menambahkan data
        $insert = "INSERT INTO databuku (Kategori, judulbuku, penulis , penerbit, tahunterbit, ISBN)
                VALUES('$kategori','$judul','$penulis','$penerbit','$tahun','$ISBN')    
                ";
        mysqli_query($connect, $insert);
        //mengebalikan feedback berupa int yang akan dilanjutkan dengan proses di halaman yang bersangkutan
        return mysqli_affected_rows($connect);
    }
    
    //mengapus data sesuai dengan Id yang didapat oleh $_GET
    function delete($id){
        global $connect;
        mysqli_query($connect, "DELETE FROM databuku WHERE id = $id");
        return mysqli_affected_rows($connect);
    }

    //Mengubah data
    function ubah($data){
        
        //Kembali menangkap data dari $_POST ke Variabel
        global $connect;
        $id = $data["id"];
        $judul = htmlspecialchars($data["judul"]);
        $penulis = htmlspecialchars($data["penulis"]);
        $penerbit = htmlspecialchars($data["penerbit"]);
        $ISBN = htmlspecialchars($data["ISBN"]);
        $kategori = htmlspecialchars($data["kategori"]);
        $tahun = htmlspecialchars($data["Year"]);

        //proses Update data
        $update = "UPDATE databuku SET
                    Kategori = '$kategori',
                    judulbuku = '$judul',
                    penulis = '$penulis',
                    penerbit = '$penerbit',
                    tahunterbit = '$tahun',
                    ISBN = '$ISBN'
                    WHERE id = $id
                     ";
        mysqli_query($connect, $update);
        return mysqli_affected_rows($connect);

    }
    function kat($Jkat){
        global $connect;
        $kat = mysqli_query($connect , $Jkat);
        $field = [];
        while($data = mysqli_fetch_assoc($kat) ){
            $field [] = $Jkat;
        }
        return $field;
   
    }


?>