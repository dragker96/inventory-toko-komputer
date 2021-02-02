
<?php include ('koneksi.php'); ?>	
<?php include('index.php');?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb mt-3">
    	<li class="breadcrumb-item"><a href="homeUM.php">Unit Masuk</a></li>
    	<li class="breadcrumb-item active" aria-current="page">Edit Data</li>
    </ol>
</nav>

<div class="mt-3 m-3">
<h4 class="mt-2">Edit Unit Masuk</h4>
<?php 
        function rupiah($angka){
            $format_rupiah = "Rp " . number_format($angka,2,',','.');
            return $format_rupiah;
        }
      
include "koneksi.php";
$kd_msk = $_GET['kd_msk'];
$query_mysql = mysql_query("SELECT * FROM dt_unit_masuk WHERE kd_masuk='$kd_msk'")or die(mysql_error());
$nomor = 1;

while($data = mysql_fetch_array($query_mysql)){
?>

<form action="cek_UMedit.php" method="post">
<div class="table table-responsive mt-3  m-5 col-9"> 
	<table align="center" class="table table-bordered table-striped table-hover">
        
	<tr>
		<td>
        	Nama
        </td>
		<td>
       
        	<input type="hidden" name="kd_masuk" class="form-control col-sm-6" value="<?php echo $data['kd_masuk'] ?>"><?php echo $data['kd_masuk'] ?>
		</td>
	</tr>
	<tr>
		<td>
        	Harga Beli
        </td>
		<td>
        	<input type="text" name="hrg_beli" class="form-control col-sm-6" placeholder="<?php echo rupiah($data['harga_beli']) ?>">
        </td>
	</tr>
	<tr>
		<td>
        	Tanggal Masuk
        </td>
		<td>
        	<input type="text" name="tgl_masuk" class="form-control col-sm-6 tanggal" placeholder="<?php echo $data['tgl_masuk'] ?>">
        </td>
	</tr>
	<tr>
		<td>
        </td>
		<td>
         <button type="submit" class="btn btn-sm btn-info"><i class="oi oi-task"></i> Simpan</button>
          <button type="reset" class="btn btn-sm btn-warning"><i class="oi oi-circle-x"></i> Batal</button>
        	<!--<input type="submit" value="Simpan">-->
         </td>
	</tr>
</table>
</div>
</form>
</div>
<?php  }  ?>
<?php include('footer.php');?>
</body>
</html>
