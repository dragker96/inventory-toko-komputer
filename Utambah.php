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
    	<li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
    </ol>
</nav>

<div class="mt-3 m-3">
<h4 class="mt-2">Tambah Unit</h4>
<?php
include "koneksi.php";
$query_mysql = mysql_query("SELECT * FROM dt_unit_masuk")or die(mysql_error());
$nomor = 1;


?>
 
<div class="table table-responsive mt-3  m-5 col-9">
	    <form action="cek_unit(2).php" method="post">
 	<table align="center" class="table table-bordered table-striped table-hover">
    	<tr>
			<td width="90">
            	<label class="teks_inputUnit">ID Unit</label>
            </td>
			<td width="167" align="center">
            	<input type="text" name="id_unit" class="form-control col-sm-6" placeholder="abc123" required><br>
 			</td>
        </tr>
        <tr>
			<td>
            	<label class="teks_inputUnit">Kategori</label>
            </td>
			<td align="center">
            	<input type="text" name="kategori" class="form-control col-sm-6" placeholder="kategori" required><br>
            </td>
        </tr>
        <tr>
			<td>Kondisi
		  		<label class=""></label>
            </td>
		  	<td align="center"> : <br>
   	        	<select name="kondisi" class="custom-select col-sm-6" placeholder="pilih kondisi" required>
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
            	<input type="text" name="nm_unit" class="form-control col-sm-6" placeholder="Nama Unit" required><br>
 			</td>
        </tr>
        <tr>
			<td>Harga
				<label class="teks_inputUnit"></label>
            </td>
			<td align="center">
            	<input type="text" name="harga" class="form-control col-sm-6" placeholder="Rp. 10.000,-" required><br>
 			</td>
        </tr>
        <tr>
			<td>
				<label class="teks_inputUnit">Informasi</label>
            </td>
			<td align="center">
            	<textarea name="informasi" cols="45" rows="5" class="form-control col-sm-6"></textarea>
            <br>
 			</td>
        </tr>
         <tr>
			<td>STOK
				<label class="teks_inputUnit"></label>
            </td>
			<td align="center">
            
            <select name="stok" class="custom-select col-sm-6" placeholder="pilih kondisi" required>
			  <option value="ada">ada</option>
			  <option value="habis">habis</option>
			  </select>			  <br>
		   </td>
        </tr>
       
        
    	
        <tr>
			<td>Kode Masuk</td>
        	<td align="center">
            <select id="kd_msk" name="kd_msk" class="custom-select col-sm-6" placeholder="pilih kondisi" required>
    	        	<option value="">- pilih kode masuk -</option>
                 <?php while($data = mysql_fetch_array($query_mysql)){
					 echo "<option value='$data[kd_masuk]'>$data[kd_masuk]</option>";
				 }
				 ?>
                	<!-- <option value="<?php //echo $data['kd_masuk'] ?>"><?php //echo $data['kd_masuk'] ?></option> 
                    -->
    	        <?php // }  ?>	
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
