
<?php include ('koneksi.php'); ?>
<?php include('index.php');?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body> 
	<?php 
	/*
	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo "<div class='alert' role='alert'>data berhasil ditambah.";
		}else if($pesan == "update"){
			echo "<div class='alert' role='alert'>Data berhasil di update.";
		}else if($pesan == "hapus"){
			echo "<div class='alert' role='alert'>Data berhasil di hapus.";
		}else if($pesan == "x"){
			echo "<div class='alert' role='alert'>Data gagal diproses";
		}
	}
	*/
	?>
    <?php 
        function rupiah($angka){
            $format_rupiah = "Rp " . number_format($angka,2,',','.');
            return $format_rupiah;
        }
      ?>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb mt-3">
    	<li class="breadcrumb-item active" aria-current="page">Unit Masuk</li>
    </ol>
</nav>

<div class="mt-3 m-3">
<h4 class="mt-2">Kelola Unit Masuk</h4>
	<a class="btn btn-outline-info" href="UMtambah.php"><i class="oi oi-plus"></i> Tambah Data</a>
	<br>

  
<div class="table table-responsive mt-3"> 
	<table class="table table-bordered table-striped table-hover">
		<tr class="table-info">
			<th>No</th>
			<th>Kode Masuk</th>
			<th>harga beli</th>
			<th>tanggal masuk</th>
			<th> </th>
		</tr>
		<?php 
		include ('koneksi.php');
		$halaman = 10;
  		$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  		$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
 	 	$result = mysql_query("SELECT * FROM dt_unit_masuk");
	  	$total = mysql_num_rows($result);
  		$pages = ceil($total/$halaman);            
 		$query_mysql = mysql_query("SELECT * FROM dt_unit_masuk LIMIT $mulai, $halaman")or die(mysql_error());
		$nomor = $mulai+1;
		
	
		while($data = mysql_fetch_array($query_mysql)){
		?>
		<tr>
			<td><?php echo $nomor++; ?></td>
			<td><?php echo $data['kd_masuk']; ?></td>
			<td><?php echo rupiah($data['harga_beli']); ?></td>
            <td><?php echo $data['tgl_masuk']; ?></td>
            
			<td>
				<a class="btn btn-sm btn-info" href="UMedit.php?kd_msk=<?php echo $data['kd_masuk']; ?>"><i class="oi oi-pencil"></i> Edit</a> 
				<a class="btn btn-sm btn-danger" href="cek_UMhapus.php?kd_msk=<?php echo $data['kd_masuk']; ?>"><i class="oi oi-trash"></i> Hapus</a>					
			</td>
		</tr>
		<?php } ?>
	</table>
    <ul class="pagination">
  		<?php for ($i=1; $i<=$pages ; $i++){ ?>
        <li class="page-item">
 	 		<a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
        </li>
 		<?php } ?>
	</ul>
</div>
</div>
 <?php include('footer.php');?>   
</body>
</html>