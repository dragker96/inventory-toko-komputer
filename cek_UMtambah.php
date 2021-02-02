<?php
// mengaktifkan session pada php
session_start();
// menghubungkan php dengan koneksi database
include 'koneksi.php';
// menangkap data yang dikirim dari form login
$num=1;
$kdM=$_POST['kd_masuk'];
$hrgB=$_POST['hrg_beli'];
$tglM=$_POST['tgl_masuk'];

// input data

//$sql = mysqli_query($koneksi,"insert into dt_unit_masuk VALUES('$kdM','$hrgB','$tglM')");

if (!$koneksi) {
      die("Connection failed: " . mysqli_connect_error());
}
 
//echo "Connected successfully";
 
$sql = "INSERT INTO dt_unit_masuk (kd_masuk, harga_beli, tgl_masuk) VALUES ('$kdM','$hrgB','$tglM')";

if (mysqli_query($koneksi, $sql)) {
      //header("location:homeUM.php?pesan=input");
		
      header("location:homeUM.php");
 			
	  //echo "New record created successfully";
} else {
      	header("location:UMtambah.php?pesan=gagal");

	  //echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}
mysqli_close($koneksi);



?>

