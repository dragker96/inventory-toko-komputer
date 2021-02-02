<?php include ('koneksi.php'); ?>
<?php include ('owner.php');?>
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
	 function rupiah($angka){
            $format_rupiah = "Rp " . number_format($angka,2,',','.');
            return $format_rupiah;
        }
	//if(!defined('index.php')) die("");
	?>
    
<nav aria-label="breadcrumb">
	<ol class="breadcrumb mt-3">
    	<li class="breadcrumb-item active" aria-current="page">Unit</li>
    </ol>
</nav>

<div class="mt-3 m-3">
<h4 class="mt-2">Data Unit</h4>
	<br>
<div class="table table-responsive mt-3"> 
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
		</tr>
		<?php 
		//include "koneksi.php";
		$halaman = 10;
  		$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  		$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
 	 	$result = mysql_query("SELECT * FROM unit");
	  	$total = mysql_num_rows($result);
  		$pages = ceil($total/$halaman);            
 		$query_mysql = mysql_query("SELECT * FROM unit LIMIT $mulai, $halaman")or die(mysql_error());
		$num = $mulai+1;
		while($data = mysql_fetch_array($query_mysql)){
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
			<td><?php echo $data['stok']; ?></td>
  			
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
<?php 
mysql_free_result($query_mysql);
?>
</html>
