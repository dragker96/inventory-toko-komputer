
<?php
// mengaktifkan session pada php
session_start();
// menghubungkan php dengan koneksi database
include 'koneksi.php';
// menangkap data yang dikirim dari form unit
$kdM=$_GET['kd_msk'];

// input data


if (!$koneksi) {
      die("Connection failed: " . mysqli_connect_error());
}


//echo "Connected successfully";
$sql = "DELETE FROM dt_unit_masuk WHERE kd_masuk='$kdM'";

		if (mysqli_query($koneksi, $sql)) {
			 header("location:homeUM.php");
			 echo "data berhasil dihapus!";
			 
		//	echo 'FILE BERHASIL DIHAPUS';
			}else{
				//header("location:UMhapus.php?pesan=gagal");
				echo 'GAGAL menghapus';
				echo mysqli_error();
			}
		
mysqli_close($koneksi);

?>

 
<!--

-->