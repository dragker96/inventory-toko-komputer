
 
<?php require_once('Connections/inventory_kp.php'); ?>
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

$maxRows_unit = 100;
$pageNum_unit = 0;
if (isset($_GET['pageNum_unit'])) {
  $pageNum_unit = $_GET['pageNum_unit'];
}
$startRow_unit = $pageNum_unit * $maxRows_unit;


mysql_select_db($database_inventory_kp, $inventory_kp);
$query_unit = "SELECT * FROM unit";
$unit = mysql_query($query_unit, $inventory_kp) or die(mysql_error());
$row_unit = mysql_fetch_assoc($unit);
$totalRows_unit = mysql_num_rows($unit);


if (isset($_GET['totalRows_unit'])) {
  $totalRows_UM = $_GET['totalRows_unit'];
} else {
  $all_unit = mysql_query($query_unit);
  $totalRows_unit = mysql_num_rows($all_unit);
}
$totalPages_unit = ceil($totalRows_unit/$maxRows_unit)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link href="style.css" rel="stylesheet" type="text/css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Unit</title>
</head>

<body>

<p>
  <?php 
  	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['kelas']==""){
		header("location:index.php?pesan=gagal");
	}
 
	
  
include 'koneksi.php';
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="sukses"){
			echo "<div class='alert'>DATA BERHASIL DI INPUT</div>";
		}
	}
	$num=1;
	/*
	if(!defined('INDEX')) die("")*/
	?>
</p>


<link href= rel="stylesheet" type="text/css">
<table border="1" width="57%">
	<tr>
		<td width="27" align="center"></b> </td>
		<td width="27" align="center"></b> </td>
		<td width="27" align="center"></b> </td>
		<td width="27" align="center"></b> </td>
		<td width="27" align="center"> </b></td>
		<td width="27" align="center"></b> </td>
		<td width="27" align="center"></b> </td>
		<td width="27" align="center"></b> </td>
    	<td width="27" align="center"><a href="Utambah.php">tambah data</a></b></td>
       
    <tr>
        <td width="27" align="center"><b>NO.</b></td>
		<td width="27" align="center"><b>ID Unit</b></td>
		<td width="154" align="center"><b>Kategori</b></td>
		<td width="97" align="center"><b>Kondisi</b></td>
		<td width="97" align="center"><b>Nama Unit</b></td>
		<td width="97" align="center"><b>Harga</b></td>
		<td width="97" align="center"><b>Informasi</b></td>
		<td width="97" align="center"><b>Gambar</b></td>
		<td width="97" align="center"><b>Kode Masuk</b></td>
		</tr>
	 <?php do { ?>
	<tr>
		<td width="27">&nbsp;</td>
   
        <td width="154"><?php echo $row_unit['id_unit']; ?></td>
		<td width="154"><?php echo $row_unit['kategori']; ?></td>
		<td width="97"><?php echo $row_unit['kondisi']; ?></td>
		<td width="117"><?php echo $row_unit['nm_unit']; ?></td>
		<td width="117"><?php echo $row_unit['harga']; ?></td>
		<td width="117"><?php echo $row_unit['informasi']; ?></td>
		<td width="117"><img src="images/<?php echo $row_unit['gambar_unit']; ?>"/></td>
		<td width="117"><?php echo $row_unit['kd_masuk']; ?></td>
  </tr>
	<?php
	$num++;
	?>
    
     </MM:DECORATION></MM_REPEATEDREGION>
    <MM_REPEATEDREGION SOURCE="@@rs@@">
    <MM:DECORATION OUTLINE="Repeat" OUTLINEID=1>
	<?php 
	
		} while ($row_unit = mysql_fetch_assoc($unit)); ?>
</table>


<a href="logout.php" class="tombol_login">
logut
</a>

</body>
</html>
<?php

mysql_free_result($unit);
?>

