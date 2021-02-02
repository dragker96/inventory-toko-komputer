<?php include ('koneksi.php'); ?>
<?php include('index.php');?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
	
<nav aria-label="breadcrumb">
	<ol class="breadcrumb mt-3">
    	<li class="breadcrumb-item"><a href="unit(2).php">Unit</a></li>
    	<li class="breadcrumb-item active" aria-current="page">Edit Data</li>
    </ol>
</nav>

<div class="mt-3 m-3">
<h4 class="mt-2">Edit Unit</h4>
 	
<?php
        function rupiah($angka){
            $format_rupiah = "Rp " . number_format($angka,2,',','.');
            return $format_rupiah;
        }

include "koneksi.php";
$id_unit = $_GET['id_unit'];
$query = mysql_query("SELECT * FROM unit WHERE id_unit='$id_unit'")or die(mysql_error());
					
$nomor = 1;

while($fdata = mysql_fetch_array($query)){
?>

	<form action="cek_Uedit.php" method="post">
 
<div class="table table-responsive mt-3  m-5 col-9"> 
	<table align="center" class="table table-bordered table-striped table-hover">
    	<tr>
			<td width="90">
            	<label class="teks_inputUnit">ID Unit</label>
            </td>
			<td width="167" align="center">
            	<input type="hidden" name="id_unit" class="form-control col-sm-6" value="<?php echo $fdata['id_unit'] ?>"><?php echo $fdata['id_unit'] ?>
 			</td>
        </tr>
        <tr>
			<td>
            	<label class="teks_inputUnit">Kategori</label>
            </td>
			<td align="center">
            	<input type="text" name="kategori" class="form-control col-sm-6" placeholder="<?php echo $fdata['kategori'] ?>" required><br>
            </td>
        </tr>
        <tr>
			<td>Kondisi
		  		<label class="teks_inputUnit"></label>
            </td>
		  	<td align="center"> : <br>
   	        	<select name="kondisi" class="custom-select col-sm-6" placeholder="<?php echo $fdata['kondisi'] ?>" required>
    	        	<option value="mulus">mulus</option>
    	        	<option value="sedang">sedang</option>
    	        	<option value="rusak">rusak</option>
          		</select>
            </td>
        </tr>
        <tr>
			<td>Nama Unit
				<label class="teks_inputUnit"></label>
            </td>
			<td align="center">
            	<input type="text" name="nm_unit" class="form-control col-sm-6" placeholder="<?php echo $fdata['nm_unit'] ?>" required><br>
 			</td>
        </tr>
        <tr>
			<td>Harga
				<label class="teks_inputUnit"></label>
            </td>
			<td align="center">
            	<input type="text" name="harga" class="form-control col-sm-6" placeholder="<?php echo rupiah($fdata['harga']) ?>" required><br>
 			</td>
        </tr>
        <tr>
			<td>
				<label class="teks_inputUnit">Informasi</label>
            </td>
			<td align="center">
            	<textarea name="informasi" cols="45" rows="5" class="form-control col-sm-6" placeholder="<?php echo $fdata['informasi'] ?>"><?php echo $fdata['informasi'] ?></textarea>
            <br>
 			</td>
        </tr>
        <tr>
			<td>STOK
				<label class="teks_inputUnit"></label>
            </td>
			<td align="center">
            	<select name="stok" class="custom-select col-sm-6" placeholder="<?php echo $fdata['stok'] ?>" required>
			  		<option value="ada">ada</option>
					<option value="habis">habis</option>
			  	</select><br>
		   </td>
        </tr>
        <tr>
			<td>Kode Masuk</td>
        	<td align="center">
            	<select name="kd_msk" class="custom-select col-sm-6" placeholder="<?php echo $fdata['kd_masuk'] ?>" required>
    	        	<option value="">- pilih kode masuk -</option>
                 		<?php 
							$query_mysql = mysql_query("SELECT * FROM dt_unit_masuk")or die(mysql_error());
				 			while($data = mysql_fetch_array($query_mysql))
							{
								echo "<option value='$data[kd_masuk]'";
									if($data['kd_masuk'] == $fdata['kd_masuk']) echo "selected";
								echo ">$data[kd_masuk]</option>";
							}
						?>
          		</select>
           	</td>	
        </tr>
	</table>
        	<center>
 			<br>
          <button type="submit" class="btn btn-sm btn-info"><i class="oi oi-task"></i> Simpan</button>
          <button type="reset" class="btn btn-sm btn-warning"><i class="oi oi-circle-x"></i> Batal</button>
          </center>
          </div>	
  </form>	
  </div>
<?php  }  ?>
<?php include('footer.php');?>
</body>
</html>





