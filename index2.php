
<html>
<head>

<!--cara biar terefresh setip 9 detik-->
<meta http-equiv="refresh" content="9"/>

<!--agar terhubung ke css-->
<link href="style.css" rel="stylesheet" type="text/css">

<title>LOGIN</title>
</head>
<body class="bg_gradient">
<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
<div class="kotak_login">
  <p class="tulisan_login">login</p>
 
		<form action="cek_login.php" method="post">
			<center><br><label></label>
			<input type="text" name="kls" class="form_login" placeholder="user" required="required">
 			
			<label></label>
			<input type="password" name="pw" class="form_login" placeholder="password" required="required">
 			
			<input type="submit" class="tombol_login" value="LOGIN"></center>
 
			<br/>
			
		</form>
		
	</div>

</form>
