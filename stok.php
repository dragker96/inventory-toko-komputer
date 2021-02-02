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
    	<li class="breadcrumb-item active" aria-current="page">Stok Unit</li>
    </ol>
</nav>

<div class="mt-3 m-3">
<h4 class="mt-2">Stok Tersedia</h4>
  <br>
	<div class="table table-responsive mt-3"> 
	<table class="table table-bordered table-striped table-hover">
		<tr class="table-info">
        	<th>No</th>
			<th>Nama Unit</th>
            <th>Kategori</th>
			<th>Kondisi </th>
            <th>Harga </th>
            <th>Informasi </th>
            
		</tr>
		<?php 
		$halaman = 10;
  		$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  		$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
 	 	$result = mysql_query("SELECT unit.nm_unit, unit.kategori, unit.kondisi, unit.harga, unit.informasi FROM unit LEFT OUTER JOIN unit_keluar ON unit.id_unit=unit_keluar.id_unit WHERE unit_keluar.id_unit IS NULL");
	  	$total = mysql_num_rows($result);
  		$pages = ceil($total/$halaman);            
		$query_mysql = mysql_query("SELECT unit.nm_unit, unit.kategori, unit.kondisi, unit.harga, unit.informasi FROM unit LEFT OUTER JOIN unit_keluar ON unit.id_unit=unit_keluar.id_unit WHERE unit_keluar.id_unit IS NULL LIMIT $mulai, $halaman");
		$num = $mulai+1;
		while($data = mysql_fetch_array($query_mysql)){
		?>
		<tr>
        	<td><?php echo $num++; ?></td>
			<td><?php echo $data['nm_unit']; ?></td>
			<td><?php echo $data['kategori']; ?></td>
			<td><?php echo $data['kondisi']; ?></td>
			<td><?php echo rupiah($data['harga']); ?></td>
			<td><?php echo $data['informasi']; ?></td>
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
