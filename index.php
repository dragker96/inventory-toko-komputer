<?php 
require_once('Connections/inventory_kp.php');
mysql_select_db($database_inventory_kp, $inventory_kp);
?>
<?php include ('koneksi.php'); ?>
<!DOCTYPE HTML>
<html class="h-100">
	<head>
		<link rel="shortcut icon" href="gambar/pks.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
	<title>DASHBOARD</title>
		<link href="bootstrap-4.4.1/css/bootstrap.css" rel="stylesheet">
        <link href="plugin/css/bootstrap-datepicker3.min.css" rel="stylesheet">
        
        <link href="open-iconic-master/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">
	    
	</head>
    
<body>

  <?php 
  	session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['kelas']==""){
		header("location:login.php?pesan=gagal");
		
	}//else{define('index.php',true);

	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="sukses"){
			echo "<div class='alert' role='alert'>LOGIN BERHASIL</div>";
			/* echo "<div class='alert alert-danger alert-dismissible fade show fixed-top text-uppercase text-center' role='alert'>LOGIN BERHASIL
			<button type='button' class='close' data-dismiss='alert' aria-label='close'>
			<span aria-hidden='true'>&times;</span>
			</button>
		</div>"; */
	}
	}
	
	$num=1;
	?>


<nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
	<!-- <div class="container-fluid"> -->
	<div class="navbar-nav">
        <img src="gambar/pks.png" width="60" class="navbar-brand">
	</div>
	
    <!-- navigasi pada layar kecil -->   
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigasi_kecil" aria-expanded="false" aria-controls="navigasi_kecil">
    <span class="navbar-toggler-icon"></span> 
    </button>
    
    <div class="collapse navbar-collapse" id="navigasi_kecil">
    
		<ul class="navbar-nav mr-auto text-body text-dark">
			<li class="nav-item"><a class="nav-link" href="dashboard.php"><span class="oi oi-dashboard text-black-50"></span> Home</a></li>
			<li class="nav-item"><a class="nav-link" href="homeUM.php"><span class="oi oi-clipboard text-black-50"></span> Unit Masuk</a></li>
			<li class="nav-item"><a class="nav-link" href="unit(2).php"><span class="oi oi-document text-black-50"></span> Unit</a></li> 
			<li class="nav-item"><a class="nav-link" href="unitKeluar.php"><span class="oi oi-external-link text-black-50"></span> Unit Keluar</a></li> 
			<!--
            <li class="nav-item dropdown"><a class="nav-item dropdown-toggle text-black-50" data-toggle="dropdown" href="#">Tutorial</a>
            -->
				
                <!-- Untuk Menampilkan menu POP UP/dropdown menu --> 
           <!--     
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">fff</a>
                    <a class="dropdown-item" href="#">fef</a>
                    <a class="dropdown-item" href="#">fbfb</a>
                </div>
			</li>
            -->
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a class="nav-link text-black-50" href="logout.php"><span class="oi oi-account-logout text-black-50"></span> Logout</a></li>
		</ul>
   	</div>
</nav>
<br>
<br>

    <!-- footer -->
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
<script src="bootstrap-4.4.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.js"></script> 
<script type="text/javascript" src="plugin/js/bootstrap-datepicker.min.js"></script> 

<script type="text/javascript">
 $(function(){
  $(".tanggal").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>
<script>
$(function(){
	$('.table').DataTable();
	$('.tanggal').datepicker();
	});
</script>
</body>
</html>
<?php
//}
?>
