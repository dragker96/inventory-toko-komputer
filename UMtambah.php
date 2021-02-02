<?php include ('koneksi.php'); ?>
<?php include('index.php');?>
<html>
<head>
<title>Input_UM</title>
</head>
<body onLoad="fdata.tnm.focus()" topmargin="0" leftmargin="0">
 <?php 
        function rupiah($angka){
            $format_rupiah = "Rp " . number_format($angka,2,',','.');
            return $format_rupiah;
        }
      ?>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb mt-3">
    	<li class="breadcrumb-item"><a href="homeUM.php">Unit Masuk</a></li>
    	<li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
    </ol>
</nav>

<div class="mt-3 m-3">
<h4 class="mt-2">Tambah Unit Masuk</h4>
<!--<div <class="jumbotron col-sm-5 m5"> -->
 		<form  action="cek_UMtambah.php" method="post">
  
<div class="table table-responsive mt-3  m-5 col-9"> 
	<table align="center" class="table table-bordered table-striped table-hover">
        
        <tr>
			<td width="90"><label class="teks_inputUnit">Kode Masuk</label></td>
			<td width="167" align="center"><input type="text" name="kd_masuk" class="form-control col-sm-6" placeholder="K_000" required><br>
 			</td>
        </tr>
        <tr>
			<td><label class="teks_inputUnit">Harga Beli</label></td>
			<td align="center"><input type="text" name="hrg_beli" class="form-control col-sm-6" placeholder="<?php  echo rupiah(99999) ?>" required><br></td>
        </tr>
        <tr>
			<td>
			<label class="teks_inputUnit">Tanggal Masuk</label></td>
			<td align="center"><input type="text" name="tgl_masuk" class="form-control col-sm-6 tanggal" placeholder="YYYY-MM-DD" required><br>
 		</td>
        </tr>
		</table>
        
        	<center>
 			
          <!--  
		  <input type="submit" name="inputA" class="btn btn-sm btn-info" value="INPUT">
          <input type="reset" value="Batal" name="brst" tabindex="10">
          -->
          <button type="submit" class="btn btn-sm btn-info"><i class="oi oi-task"></i> Simpan</button>
          <button type="reset" class="btn btn-sm btn-warning"><i class="oi oi-circle-x"></i> Batal</button>
          </center>
 </div>
			<br/>
			
		</form>
		
	</div>
    </div>

</form>


<?php /*?>

if(isset($_POST['inputA']))
{
$num=1;
$kdM=$_POST['kd_masuk'];
$hrgB=$_POST['hrg_beli'];
$tglM=$_POST['tgl_masuk'];
$con=new mysqli('127.0.0.1','root','','pk_pks');
if($kdM!="")
{
	
	$con->query("INSERT INTO dt_unit_masuk VALUES('$kdM','$hrgB','$tglM')");
}}
$sql="SELECT * FROM dt_unit_masuk";

if (mysqli_query($con, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

$result=$con->query($sql);
?>
<table border="1" width="57%">
	<tr>
		<td width="27" align="center"><b>NO.</b></td>
		<td width="27" align="center"><b>kode masuk</b></td>
		<td width="154" align="center"><b>harga beli</b></td>
		<td width="97" align="center"><b>tanggal masuk</b></td>
		</tr>
	<?php while ($row=$result->fetch_assoc()) { ?>
	<tr>
		<td width="27">&nbsp;<?php echo($num);?></td>
		<td width="154">&nbsp;<?php echo($row['kd_masuk']);?></td>
		<td width="97">&nbsp;<?php echo($row['harga_beli']);?></td>
		<td width="117">&nbsp;<?php if( $row['tgl_masuk'])?></td>
		</tr>
	<?php
	$num++;
	}?>
</table>
<?php
$con->close();
<?php 


<?php
*/?>
<?php include('footer.php');?>
</body>
</html>