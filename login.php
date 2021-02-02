
<html>
<head>

<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
	<title>LOGIN</title>
        <link href="file:///C|/xampp/htdocs/open-iconic-master/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="h-100 bg-info d-flex align-items-center">
<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			//echo "<div class='alert alert-danger fixed-top text-uppercase text-center'>Username dan Password tidak sesuai !</div>";
			echo "<div class='alert alert-danger alert-dismissible fade show fixed-top text-uppercase text-center' role='alert'>Username dan Password tidak sesuai !
			<button type='button' class='close' data-dismiss='alert' aria-label='close'>
			<span aria-hidden='true'>&times;</span>
			</button>
		</div>";
		}
	}
	?>
<div class="container">
  <div class="row">
  	<div class="col-sm-6 col-md-4 mx-auto bg-light p-4">
  
  <p class="text-center text-info pb-3 mb-3 border-bottom">
  <img src="gambar/pks.png" class="text-center m-2 col-sm-7"> 	</p>
		<form action="cek_login.php" method="post">
			<center></br>
            <i class="oi oi-account-login"></i>
            
			<input type="text" name="kls" class="form-control mb-3" placeholder="user" required="required">
 			
			<label></label>
			<input type="password" name="pw" class="form-control mb-3" placeholder="password" required="required">
 			
			<input type="submit" class="btn-info mb-0" value="LOGIN"></center>
 
			
		</form>
		
    </div>
	</div>
</div>
</form>
   <script src="bootstrap-4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="jquery-3.4.1.min.js"></script>
<script src="bootstrap-4.4.1/js/bootstrap.min.js"></script>   

</body>
</html>
