<?php 
session_start(); 
include 'koneksi.php';
$kdM=$_POST['kd_masuk'];
$hrgB=$_POST['hrg_beli'];
$tglM=$_POST['tgl_masuk'];
 


if (!$koneksi) {
      die("Connection failed: " . mysqli_connect_error());
}
 
$sql = "UPDATE dt_unit_masuk SET harga_beli='$hrgB', tgl_masuk='$tglM' WHERE kd_masuk='$kdM'";

		if (mysqli_query($koneksi, $sql)) {
			 header("location:homeUM.php");
			  //echo "New record created successfully";
		//	echo 'FILE BERHASIL DI UPLOAD';
			}else{
				header("location:UMedit.php?pesan=gagal");
		//		echo 'GAGAL MENGUPLOAD GAMBAR'; atau echo 'file GAGAL DI UPLOAD';
			}
		
mysqli_close($koneksi);
?>