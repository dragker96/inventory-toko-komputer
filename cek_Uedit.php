<?php 
session_start(); 
include 'koneksi.php';
 
 
 
$num=1;
$id=$_POST['id_unit'];
$kategori=$_POST['kategori'];
$kondisi=$_POST['kondisi'];
$namaU=$_POST['nm_unit'];
$hrg=$_POST['harga'];
$info=$_POST['informasi'];
$stok=$_POST['stok'];
$kdM=$_POST['kd_msk'];


if (!$koneksi) {
      die("Connection failed: " . mysqli_connect_error());
}
$sql = "UPDATE unit SET kategori='$kategori', kondisi='kondisi', nm_unit='$namaU', harga='$hrg', informasi='$info', stok='$stok', kd_masuk='$kdM' WHERE id_unit='$id'";
		if (mysqli_query($koneksi, $sql)) {
			 header("location:unit(2).php");
			  //echo "New record created successfully";
		//	echo 'FILE BERHASIL DI UPLOAD';
			}else{
				header("location:Uedit.php?pesan=gagal");
		//		echo 'GAGAL MENGUPLOAD GAMBAR'; atau echo 'file GAGAL DI UPLOAD';
			}
/*		
		 header("location:unit(2).php");
*/		
mysqli_close($koneksi);
?>