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
    	<li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
    </ol>
</nav>

<div class="mt-3 m-3">
<h4 class="mt-2">Tambah Unit Keluar</h4>

<?php
include "koneksi.php";
$query_mysql = mysql_query("SELECT * FROM unit")or die(mysql_error());
$nomor = 1;
?>
<div class="table table-responsive mt-3  m-5 col-9"> 

	<form action="cek_UKtambah.php" method="post">
 	<table align="center" class="table table-bordered table-striped table-hover">
    	<tr>
			<td width="90">
            	<label class="teks_inputUnit">No Nota</label>
            </td>
			<td width="167" align="center">
            	<input type="text" name="no_nota" class="form-control col-sm-6" placeholder="plg0001" required><br>
 			</td>
        </tr>
        <tr>
			<td>
            	<label class="teks_inputUnit">Nama Unit</label>
            </td>
			<td align="center">
           	<select id="nm_u" name="nm_u" class="custom-select col-sm-6" required>
    	        	<option value="">- Nama Unit -</option>
                	<?php 
					while($data = mysql_fetch_array($query_mysql))
					{
						echo "<option value='$data[nm_unit]'>$data[nm_unit] - $data[id_unit]</option>";
				 	}
					?>
               </select>
            </td>
        </tr>
        <tr>
			<td>Nama Pelanggan
		  		<label class="teks_inputUnit"></label>
            </td>
		  	<td align="center"> 
            	<input type="text" name="nm_p" class="form-control col-sm-6" placeholder="nama lengkap" required><br>
 			</td>
        </tr>
        <tr>
			<td>Tanggal Keluar
				<label class="teks_inputUnit"></label>
            </td>
			<td align="center">
            	<input type="text" name="tgl_keluar" class="form-control col-sm-6 tanggal" placeholder="yyyy-mm-dd" required><br>
 			</td>
        </tr>
        <tr>
			<td>Alamat Pembeli
				<label class="teks_inputUnit"></label>
            </td>
			<td align="center">
            	<textarea name="alamat_p" class="form-control col-sm-6" placeholder="isi alamat lengkap" required></textarea>
            	
 			</td>
        </tr>
        <tr>
			<td>
				<label class="teks_inputUnit">Nomor HP Pembeli</label>
            </td>
			<td align="center">
            	<input type="text" name="hp_p" class="form-control col-sm-6" placeholder="+6281234567xxxx" required>
            <br>
 			</td>
        </tr>
        <tr>
			<td>ID Unit
				<label class="teks_inputUnit"></label>
            </td>
			<td align="center">
            	<select id="id_unit" name="id_unit" class="custom-select col-sm-6" placeholder="pilih kondisi" required>
    	        	<option value="">- ID unit -</option>
                	<?php
					$query= mysql_query("SELECT * FROM unit")or die(mysql_error());
					while($fdata = mysql_fetch_array($query))
					/*
					{
						echo "<option value='$fdata[id_unit]'";
							if($fdata['id_unit'] == $data['id_unit']) echo "selected";
						echo ">$fdata[id_unit]</option>";
					}
					*/
					{
					
					echo "<option value='$fdata[id_unit]'>$fdata[id_unit]</option>";
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
			<br/>	
  </form>	
</div>
</div>
<?php include('footer.php');?>
</body>

<?php 
mysql_free_result($query_mysql);
?>
</html>
