
<?php
// mengaktifkan session pada php
session_start();
// menghubungkan php dengan koneksi database
include 'koneksi.php';
// input data


if (!$koneksi) {
      die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
$sql = "DELETE FROM unit WHERE id_unit='$_GET[id_unit]'";
	if (mysqli_query($koneksi, $sql)) {
		header("location:unit(2).php");
	//	 echo "data berhasil dihapus!";
			 
		//	echo 'FILE BERHASIL DIHAPUS';
	}else{
				//header("location:UMhapus.php?pesan=gagal");
		echo 'GAGAL menghapus';
		echo mysqli_error();
		header("location:cek_Uhapus.php");
	
			}
		
mysqli_close($koneksi);

?>

 
<!--

-->