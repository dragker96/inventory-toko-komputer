<?php include ('koneksi.php'); ?>
<?php include ('index.php');?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body> 
	<?php 
	
include 'koneksi.php';
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="sukses"){
			echo "<div class='alert'>DATA BERHASIL DI INPUT</div>";
		}
	}
	$num=1;
	
	//if(!defined('index.php')) die("");
	    function rupiah($angka){
            $format_rupiah = "Rp " . number_format($angka,2,',','.');
            return $format_rupiah;
        }
      
	?>
    
<nav aria-label="breadcrumb">
	<ol class="breadcrumb mt-3">
    	<li class="breadcrumb-item active" aria-current="page">Unit</li>
    </ol>
</nav>

<div class="mt-3 m-3">
<h4 class="mt-2">Kelola Unit</h4>
	
	<a class="btn btn-outline-info" href="Utambah.php"><i class="oi oi-plus"></i> Tambah Data</a>
  	<br>
<br>

	<table class="table table-bordered table-striped table-hover">
		<tr class="table-info">
			<th>No</th>
			<th>ID Unit</th>
			<th>Nama Unit</th>
            <th>Kategori</th>
			<th>Kondisi </th>
            <th>Harga </th>
            <th>Informasi </th>
            <th>Kode Masuk </th>
            <th>Stok </th>
            <th>Aksi </th>
		</tr>
		<?php 
mysql_select_db($database_inventory_kp, $inventory_kp);

		include "koneksi.php";
		$halaman = 10;
  		$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  		$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
 	 	$result = mysql_query("SELECT * FROM unit");
	  	$total = mysql_num_rows($result);
  		$pages = ceil($total/$halaman); 
		
		
$query_unit = "SELECT * FROM unit LIMIT $mulai, $halaman";
$unit = mysql_query($query_unit, $inventory_kp) or die(mysql_error());
		           
// 		$query_mysql = mysql_query("SELECT * FROM unit LIMIT $mulai, $halaman")or die(mysql_error());
		$num = $mulai+1;
		//while($data = mysql_fetch_array($query_mysql)){
while($data = mysql_fetch_array($unit)){
			
			
		?>
		<tr>
        	<td><?php echo $num++; ?></td>
        	<td><?php echo $data['id_unit']; ?></td>
			<td><?php echo $data['nm_unit']; ?></td>
			<td><?php echo $data['kategori']; ?></td>
			<td><?php echo $data['kondisi']; ?></td>
			<td><?php echo rupiah($data['harga']); ?></td>
			<td><?php echo $data['informasi']; ?></td>
			<td><?php echo $data['kd_masuk']; ?></td>
			<td><?php echo $data['stok']; ?>
            	<a class="btn-sm btn-warning" href="Ustok_habis.php?id_unit=<?php echo $data['id_unit']; ?>"><i class="oi oi-circle-x"></i></a> 
            </td>
  			<td>
				<a class="btn btn-sm btn-info" href="Uedit.php?id_unit=<?php echo $data['id_unit']; ?>"><i class="oi oi-pencil"></i> Edit</a> 
				<a class="btn btn-sm btn-danger" href="cek_Uhapus.php?id_unit=<?php echo $data['id_unit']; ?>"><i class="oi oi-trash"></i> Hapus</a>					
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
   <?php include('footer.php');?> 
</body>
<?php 
//mysql_free_result($query_mysql);
mysql_free_result($unit);

?>
</html>
