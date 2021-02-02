<?php 

$koneksi = mysqli_connect("localhost","root","","kp_pks")or die(mysqli_error());
 

// Check connection
if (mysqli_connect_errno()){
	
	echo "Koneksi database gagal : " . mysqli_connect_error();
	}
	
?>