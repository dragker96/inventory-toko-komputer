<?php include ('koneksi.php'); ?>
<?php include('index.php');?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb mt-3">
    	<li class="breadcrumb-item"><a href="unitKeluar.php">Unit Keluar</a></li>
    	<li class="breadcrumb-item active" aria-current="page">Edit Data</li>
    </ol>
</nav>

<div class="mt-3 m-3">
<h4 class="mt-2">Edit Unit Keluar</h4>
 	    
<?php
       

include "koneksi.php";
$no_nota = $_GET['no_nota'];
$query = mysql_query("SELECT *FROM unit_keluar WHERE no_nota='$no_nota'")or die(mysql_error());
					
$nomor = 1;

while($fdata = mysql_fetch_array($query)){
?>

<div class="table table-responsive mt-3  m-5 col-9"> 
	
	<form action="cek_UKedit.php" method="post">
 	<table align="center" class="table table-bordered table-striped table-hover">
     	<tr>
			<td width="90">
            	<label>No Nota</label>
            </td>
			<td width="167" align="center">
           		<input type="hidden" name="no_nota" value="<?php echo $fdata['no_nota'] ?>">
				<?php echo $fdata['no_nota'] ?> 
 			</td>
        </tr>
        <tr>
			<td>
            	<label>Nama Unit</label>
            </td>
			<td align="center">
           	<select id="nm_u" name="nm_u" class="custom-select col-sm-6" required>
    	        	<option value="">- Nama Unit -</option>
                	<?php 
					$query2= mysql_query("SELECT * FROM unit")or die(mysql_error());
					while($data = mysql_fetch_array($query2))
					{
						echo "<option value='$data[nm_unit]'";
							if($data['id_unit'] == $fdata['id_unit']) echo "selected";
						echo ">$data[nm_unit] - $data[id_unit]</option>";
					}
					?>
               </select>
            </td>
        </tr>
        <tr>
			<td>Nama Pelanggan
		  		<label></label>
            </td>
		  	<td align="center"> 
            	<input type="text" name="nm_p" class="form-control col-sm-6" placeholder="<?php echo $fdata['nm_p'] ?>" required>
 			</td>
        </tr>
        <tr>
			<td>Tanggal Keluar
				<label></label>
            </td>
			<td align="center">
            	<input type="text" name="tgl_keluar" class="form-control col-sm-6 tanggal" placeholder="<?php echo $fdata['tgl_keluar'] ?>" required>
 			</td>
        </tr>
        <tr>
			<td>Alamat Pembeli
				<label></label>
            </td>
			<td align="center">
            	<textarea name="alamat_p" class="form-control col-sm-6" placeholder="isi alamat lengkap" required><?php echo $fdata['alamat_p'] ?></textarea>
            	
 			</td>
        </tr>
        <tr>
			<td>
				<label>Nomor HP Pembeli</label>
            </td>
			<td align="center">
            	<input type="text" name="hp_p" class="form-control col-sm-6" placeholder="<?php echo $fdata['hp_p'] ?>" required>
            </td>
        </tr>
        <tr>
			<td>ID Unit
				<label></label>
            </td>
			<td align="center">
            	<select id="id_unit" name="id_unit" class="custom-select col-sm-6" required>
    	        	<option value="">- ID unit -</option>
                	<?php
					$query3= mysql_query("SELECT * FROM unit")or die(mysql_error());
					while($data3 = mysql_fetch_array($query3))
					{
						echo "<option value='$data3[id_unit]'";
							if($data3['id_unit'] == $fdata['id_unit']) echo "selected";
						echo ">$data3[id_unit]</option>";
					}
					/*
					{
					
					echo "<option value='$fdata[id_unit]'>$fdata[id_unit]</option>";
					}*/
					
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
			<br/>	
  </form>	
</div>
</div>
<?php  }  ?>

<?php include('footer.php');?>
</body>
</html>





