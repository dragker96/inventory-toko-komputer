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
/*
$gbr = $_FILES['gambar']['name'];
	$ukuran	= $_FILES['gambar']['size'];
	$file_tmp = $_FILES['gambar']['tmp_name'];
	
	*/
//$gambar=$_FILES['gambar'];
$kdM=$_POST['kd_msk'];

// input data


if (!$koneksi) {
      die("Connection failed: " . mysqli_connect_error());
}


//echo "Connected successfully";
 /*
 
if($id[""]){
	//$ekstensi_diperbolehkan	= array('png','jpg');
	
	//if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
	if($ukuran < 5125000){
		move_uploaded_file($file_tmp, "gambar/".$gbr);
			//$sql ="INSERT INTO unit VALUES('$id','$kategori','$kondisi','$namaU','$hrg','$info','$gambar' ,'$kdM')";
					*/
			$sql = "INSERT INTO unit (id_unit, kategori, kondisi, nm_unit, harga, informasi, stok, kd_masuk) VALUES ('$id','$kategori','$kondisi','$namaU','$hrg','$info','stok', '$kdM')";

		if (mysqli_query($koneksi, $sql)) {
			 header("location:unit.php?pesan=sukses");
			  //echo "New record created successfully";
		//	echo 'FILE BERHASIL DI UPLOAD';
			}else{
				header("location:Utambah.php?pesan=gagal");
		//		echo 'GAGAL MENGUPLOAD GAMBAR'; atau echo 'file GAGAL DI UPLOAD';
			}
		/*	}else{
			header("location:Utambah.php?pesan=gagal2");
			//echo 'UKURAN FILE TERLALU BESAR';
		}
	//}else{
	//	header("location:Utambah.php?pesan=ekstensisalah");
	//	echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
} 

*/
mysqli_close($koneksi);
?>

