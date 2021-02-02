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

$sql = "INSERT INTO unit_keluar (no_nota, nm_u, nm_p, tgl_keluar, alamat_p, hp_p, id_unit) VALUES ('$nN','$nU','$nP','$tK','$aP','$hP','$iU')";

		if (mysqli_query($koneksi, $sql)) {
			 header("location:unitKeluar.php?pesan=input");
			  //echo "New record created successfully";
		//	echo 'FILE BERHASIL DI UPLOAD';
			}else{
				header("location:UKtambah.php?pesan=gagal");
		//		echo 'GAGAL MENGUPLOAD GAMBAR'; atau echo 'file GAGAL DI UPLOAD';
			}
		
mysqli_close($koneksi);



?>
