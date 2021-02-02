<html>
<head>
<title>LOGIN</title>
</head>

<body>

<form method="post" name="f">
<div align="center">
<table width="397" border="0">
      <tr>
        <th colspan="2" scope="col">LOGIN</th>
      </tr>
      <tr>
        <td width="100">Kelas</td>
        <td width="287"><input type="text" name="kls" size="45" id="kls"  required/></td>
      </tr>
      <tr>
        <td width="100">Password </td>
        <td><label for="fkl"></label>
          <label for="tpw"></label>
        <input type="password" name="tpw" id="tpw" size="45" required></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input onClick="tes" name="abc" tabindex="3" type="submit" value="lOGIN"/></td>
      </tr>
    </table>
  </div>
</form>

<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$kls=$_POST['kls'];
$pw=$_POST['tpw'];

$con=new mysqli('127.0.0.1', 'root','', 'kp_pks');
if($kls!="") {


//$query = mysql_query("select * from admin where username='$username' and password='$password'");
//$cek = mysql_num_rows($query);
//echo $cek;

//fix input//  $con->query("INSERT INTO login(kelas,password) VALUE ('$kls', '$pw')");
$con->query("select * from login where kelas='$kls' and password='$pw') ");
$cek = mysql_num_rows($query);


if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = 'login';
	header("location:KP_PKS/input_UnitMasuk.php");
}else{
	echo
	header("location:KP_login.php");
}

//echo("data telah dientri");

}

//$sql="SELECT * FROM login";
//$result=$con->query($sql);
//while ($row=$result->fetch_assoc()) {

//echo("Kelas ".$row['kelas']."<br>");
//echo("Password ".$row['password']."<br>");

// }

$num=1;

if(isset($_POST['<a href="home.php">abc'])){
?>

<table border="1" width="41%">
	<tr>
		
		<td width="215" align="center">kelas</td>
		<td align="center">Password</td>
  </tr>
	<?php while ($row=$result->fetch_assoc()) { ?>
	<tr>
		
		<td width="215">&nbsp;<?php echo($row['kelas']);?></td>
		<td>&nbsp;<?php echo($row['password']);?></td>
	</tr>
	<?php
	$num++;
	} ?>
   
</table>

<?php

}
$con->close();

?>

</body>
</html>