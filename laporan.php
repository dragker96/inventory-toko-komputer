<?php include ('koneksi.php'); ?>
<?php include ('owner.php');?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body> 
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="sukses"){
			echo "<div class='alert'>DATA BERHASIL DI INPUT</div>";
		}
	}
	$num=1;
	 function rupiah($angka){
            $format_rupiah = "Rp " . number_format($angka,2,',','.');
            return $format_rupiah;
        }
	?>
      
<nav aria-label="breadcrumb">
	<ol class="breadcrumb mt-3">
    	<li class="breadcrumb-item active" aria-current="page">Unit Terjual</li>
    </ol>
</nav>

<div class="mt-3 m-3">
<h4 class="mt-2">Data Unit Terjual</h4>
  <br>
	<div class="table table-responsive mt-3"> 
	<table class="table table-bordered table-striped table-hover">
		<tr class="table-info">
        	<th>No</th>
			<th>No Nota</th>
			<th>Nama Pembeli</th>
            <th>Harga Beli</th>
			<th>Harga Jual</th>
            <th>Nama Unit</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th>Untung per Unit</th>
            
		</tr>
		<?php 
		$halaman = 10;
  		$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  		$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
  		$result = mysql_query("SELECT 
		unit_keluar.no_nota,
		unit_keluar.nm_p AS namap, 
		dt_unit_masuk.harga_beli AS hrgbeli, 
		unit.harga AS hrgjual, 
		unit.nm_unit, 
		dt_unit_masuk.tgl_masuk,
		unit_keluar.tgl_keluar, 
		(unit.harga-dt_unit_masuk.harga_beli) AS keuntungan 
		
		
			FROM unit_keluar
				INNER JOIN unit
					ON unit_keluar.id_unit=unit.id_unit
				INNER JOIN dt_unit_masuk
					ON unit.kd_masuk=dt_unit_masuk.kd_masuk
		ORDER by unit_keluar.tgl_keluar DESC");
		$total = mysql_num_rows($result);
  		$pages = ceil($total/$halaman);            
 		
		
		$query_mysql = mysql_query("SELECT 
		unit_keluar.no_nota,
		unit_keluar.nm_p AS namap, 
		dt_unit_masuk.harga_beli AS hrgbeli, 
		unit.harga AS hrgjual, 
		unit.nm_unit, 
		dt_unit_masuk.tgl_masuk,
		unit_keluar.tgl_keluar, 
		(unit.harga-dt_unit_masuk.harga_beli) AS keuntungan 
		
		
			FROM unit_keluar
				INNER JOIN unit
					ON unit_keluar.id_unit=unit.id_unit
				INNER JOIN dt_unit_masuk
					ON unit.kd_masuk=dt_unit_masuk.kd_masuk
		ORDER by unit_keluar.tgl_keluar DESC
					LIMIT $mulai, $halaman")or die(mysql_error());
		$num = $mulai+1;
		while($data = mysql_fetch_array($query_mysql)){
		?>
		<tr>
        	<td><?php echo $num++; ?></td>
        	<td><?php echo $data['no_nota']; ?></td>
			<td><?php echo $data['namap']; ?></td>
			<td><?php echo rupiah($data['hrgbeli']); ?></td>
			<td><?php echo rupiah($data['hrgjual']); ?></td>
			<td><?php echo $data['nm_unit']; ?></td>
			<td><?php echo $data['tgl_masuk']; ?></td>
			<td><?php echo $data['tgl_keluar']; ?></td>
           	<td><?php echo rupiah($data['keuntungan']); ?>
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
  
<?php include ('footer.php');?>
</body>

<?php 
mysql_free_result($query_mysql);
?>

</html>
