<?php
// mengaktifkan session pada php
session_start();
// menghubungkan php dengan koneksi database
include 'koneksi.php';
// menangkap data yang dikirim dari form unit
$num=1;
$id=$_POST['id_unit'];
$kategori=$_POST['kategori'];
$kondisi=$_POST['kondisi'];
$namaU=$_POST['nm_unit'];
$hrg=$_POST['harga'];
$info=$_POST['informasi'];
$stok=$_POST['stok'];
$kdM=$_POST['kd_msk'];

// input data


if (!$koneksi) {
      die("Connection failed: " . mysqli_connect_error());
}


//echo "Connected successfully";
 //$hell = "SELECT *FROM unit";
$sql = "INSERT INTO unit (id_unit, kategori, kondisi, nm_unit, harga, informasi, stok, kd_masuk) VALUES ('$id','$kategori','$kondisi','$namaU','$hrg','$info','$stok', '$kdM')";

		if (mysqli_query($koneksi, $sql)) {
			 header("location:unit(2).php?pesan=sukses");
			  //echo "New record created successfully";
		//	echo 'FILE BERHASIL DI UPLOAD';
			}else{
				header("location:Utambah.php?pesan=gagal");
		//		echo 'GAGAL MENGUPLOAD GAMBAR'; atau echo 'file GAGAL DI UPLOAD';
			}
		
mysqli_close($koneksi);



?>
