
<?php 
// untuk menghubungkan ke database
// dipake hanya di index !
// require_once('Connections/inventory_kp.php'); ?>
<?php //include('index.php');?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_inventory_kp, $inventory_kp);
$query_Utambah = "SELECT kd_masuk FROM dt_unit_masuk";

$Utambah = mysql_query($query_Utambah, $inventory_kp) or die(mysql_error());
$row_Utambah = mysql_fetch_assoc($Utambah);
$totalRows_Utambah = mysql_num_rows($Utambah);
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
<title>tambah unit</title>
</head>
<body onLoad="fdata.tnm.focus()" topmargin="0" leftmargin="0">
	
    
    <?php 
if(isset($_GET['pesan'])){
	$pesan = $_GET['pesan'];
	if($pesan == "sukses"){
		echo "Data berhasil di input.";
	}else if($pesan == "gagal"){
		echo 'GAGAL MENGUPLOAD GAMBAR';
	//}else if($pesan == "gagal2"){
	//	echo 'UKURAN FILE TERLALU BESAR';
	//}else if($pesan == "ekstensisalah"){
	//	echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
	}
}
?>
<div class="kotak_input_unit_masuk">
<p class="teks_U_masuk">UNIT</p>
	<form action="cek_unit(2).php" method="post">
 	<table align="center" class="tbl_UM">
    	<tr>
			<td width="90">
            	<label class="teks_inputUnit">ID Unit</label>
            </td>
			<td width="167" align="center">
            	<input type="text" name="id_unit" class="form_inputUnit" placeholder="abc123" required><br>
 			</td>
        </tr>
        <tr>
			<td>
            	<label class="teks_inputUnit">Kategori</label>
            </td>
			<td align="center">
            	<input type="text" name="kategori" class="form_inputUnit" placeholder="laptop" required><br>
            </td>
        </tr>
        <tr>
			<td>Kondisi
		  		<label class="teks_inputUnit"></label>
            </td>
		  	<td align="center"> : <br>
   	        	<select name="kondisi" class="form_inputUnit" placeholder="pilih kondisi" required>
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
            	<input type="text" name="nm_unit" class="form_inputUnit" placeholder="Nama Unit" required><br>
 			</td>
        </tr>
        <tr>
			<td>Harga
				<label class="teks_inputUnit"></label>
            </td>
			<td align="center">
            	<input type="text" name="harga" class="form_inputUnit" placeholder="Rp. 10.000,-" required><br>
 			</td>
        </tr>
        <tr>
			<td>
				<label class="teks_inputUnit">Informasi</label>
            </td>
			<td align="center">
            	<textarea name="informasi" cols="45" rows="5" class="form_inputUnit" required></textarea>
            <br>
 			</td>
        </tr>
         <tr>
			<td>STOK
				<label class="teks_inputUnit"></label>
            </td>
			<td align="center">
            
            <select name="stok" class="form_inputUnit" placeholder="pilih kondisi" required>
			  <option value="ada">ada</option>
			  <option value="habis">habis</option>
			  </select>			  <br>
		   </td>
        </tr>
       
         <?php 
			do { 
		  ?>
        <tr>
			<td>Kode Masuk</td>
        	<td align="center">
            <input type="text" name="kd_msk" class="form_inputUnit" placeholder="kode masuk">
           <!--dibawah ini jangan dihapus, karena sangat pengaruh!!! -->
            <!--
              <select name="kd_msk">
                <option value="">- pilih kode masuk -</option>
                <option value="">  
                <?php 
					while ($row_Utambah = mysql_fetch_assoc($Utambah)){
					echo "<option value='$Utambah[kd_masuk]'>$row_Utambah[kd_masuk]</option>";
					} 
					?>
                 </option>-->
          </td>	
        </tr>
       
		
    </MM:DECORATION></MM_REPEATEDREGION>
    <MM_REPEATEDREGION SOURCE="@@rs@@">
    <MM:DECORATION OUTLINE="Repeat" OUTLINEID=1>
     <?php } while ($row_Utambah = mysql_fetch_assoc($Utambah)); ?> 
	</table>
        	<center>
 			<br>
          <input type="submit" name="upload" class="tambah_dt" value="Upload">
          <input name="brst" type="reset" class="tambah_dt" tabindex="10" value="Batal">
          </center>
			<br/>	
  </form>	
</div>
</form>
</body>
</html>
<?php

mysql_free_result($Utambah);
?>
