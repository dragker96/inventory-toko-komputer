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
	
	?>
    
<nav aria-label="breadcrumb">
	<ol class="breadcrumb mt-3">
    	<li class="breadcrumb-item active" aria-current="page">Unit Keluar</li>
    </ol>
</nav>

<div class="mt-3 m-3">
<h4 class="mt-2">Data Unit Keluar</h4>
  <br>
  <div class="table table-responsive mt-3"> 
	<table class="table table-bordered table-striped table-hover">
		<tr class="table-info">
        	<th>No</th>
			<th>No Nota</th>
			<th>Nama Unit</th>
            <th>Nama Pembeli</th>
			<th>Tanggal Keluar</th>
            <th>Alamat Pembeli </th>
            <th>No HP Pembeli</th>
            <th>ID Unit </th>
           
		</tr>
		<?php 
		$halaman = 10;
  		$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  		$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
 	 	$result = mysql_query("SELECT * FROM unit_keluar");
	  	$total = mysql_num_rows($result);
  		$pages = ceil($total/$halaman);            
 		$query_mysql = mysql_query("SELECT * FROM unit_keluar LIMIT $mulai, $halaman")or die(mysql_error());
		$num = $mulai+1;
		
		while($data = mysql_fetch_array($query_mysql)){
		?>
		<tr>
        	<td><?php echo $num++; ?></td>
        	<td><?php echo $data['no_nota']; ?></td>
			<td><?php echo $data['nm_u']; ?></td>
			<td><?php echo $data['nm_p']; ?></td>
			<td><?php echo $data['tgl_keluar']; ?></td>
			<td><?php echo $data['alamat_p']; ?></td>
			<td><?php echo $data['hp_p']; ?></td>
			<td><?php echo $data['id_unit']; ?>
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

<?php 
mysql_free_result($query_mysql);
?>

</html>
