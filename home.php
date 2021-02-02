<?php include ('koneksi.php'); ?>
<?php include ('owner.php');?>

<body> 

<nav aria-label="breadcrumb">
	<ol class="breadcrumb mt-3">
    	<li class="breadcrumb-item"><a href="home.php">Owner</a></li>
    	<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</nav>

<div class="mt-3 m-3">
<h4 class="mt-2">Data Terjual</h4>
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="sukses"){
			echo "<div class='alert'>DATA BERHASIL DI INPUT</div>";
		}
	}
	$num=1;
	?>
   
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
					")or die(mysql_error());
		$num = 1;
		while($data = mysql_fetch_array($query_mysql)){
		?>
		<tr>
        	<td><?php echo $num++; ?></td>
        	<td><?php echo $data['no_nota']; ?></td>
			<td><?php echo $data['namap']; ?></td>
			<td><?php echo $data['hrgbeli']; ?></td>
			<td><?php echo $data['hrgjual']; ?></td>
			<td><?php echo $data['nm_unit']; ?></td>
			<td><?php echo $data['tgl_masuk']; ?></td>
			<td><?php echo $data['tgl_keluar']; ?></td>
           	<td><?php echo $data['keuntungan']; ?>
            </td>
  			
		</tr>
		<?php } ?>
	</table>
 </div>
</div>
</body>

<?php 
mysql_free_result($query_mysql);
?>
