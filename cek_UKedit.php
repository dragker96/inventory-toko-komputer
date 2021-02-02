<?php 
session_start(); 
include 'koneksi.php';
 
 
$num=1;
$nN=$_POST['no_nota'];
$nU=$_POST['nm_u'];
$nP=$_POST['nm_p'];
$tK=$_POST['tgl_keluar'];
$aP=$_POST['alamat_p'];
$hP=$_POST['hp_p'];
$iU=$_POST['id_unit'];


if (!$koneksi) {
      die("Connection failed: " . mysqli_connect_error());
}
$sql = "UPDATE unit_keluar SET nm_u='$nU', nm_p='$nP', tgl_keluar='$tK', alamat_p='$aP', hp_p='$hP', id_unit='$iU' WHERE no_nota='$nN'";
		if (mysqli_query($koneksi, $sql)) {
			 header("location:unitKeluar.php");
			  //echo "New record created successfully";
		//	echo 'FILE BERHASIL DI UPLOAD';
			}else{
				header("location:UKedit.php?pesan=gagal");
		//		echo 'GAGAL MENGUPLOAD GAMBAR'; atau echo 'file GAGAL DI UPLOAD';
			}
/*		
		 header("location:unit(2).php");
*/		
mysqli_close($koneksi);
?>