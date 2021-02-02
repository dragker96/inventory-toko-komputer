<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$user = $_POST['kls'];
$pw = $_POST['pw'];
 
 	
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from login where kelas='$user' and password='$pw'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['kelas']=="admin"){
 
		// buat session login dan username
		$_SESSION['password'] = $pw;
		$_SESSION['kelas'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:dashboard.php");
 
	// cek jika user login sebagai owner
	}else if($data['kelas']=="manajer"){
		// buat session login dan username
		$_SESSION['password'] = $pw;
		$_SESSION['kelas'] = "manajer";
		// alihkan ke halaman dashboard pengurus
		header("location:Odashboard.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}
 
?>