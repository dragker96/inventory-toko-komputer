<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post" action="" enctype="multipart/form-data">
<input type="file" name="foto" />
<input type="submit" value="upload" />
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$namafile = $_FILES['foto']['name'];
	$lokasifile = $_FILES['foto']['temp name'];
	
	if($namafile != ""){
		move_uploaded_file($lokasifile, "images/".$namafile);
		echo "<br><img src='images/$namafile' width='200'>";
		}
	}
?>
</body>
</html>