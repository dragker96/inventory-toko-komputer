<?php
	session_start();
	session_destroy();
	
	echo "<meta http-equiv='refresh' content='2";
	header("location:login.php");
	echo "<p align='center'>ANDA TELAH LOGOUT!</p>";
	

?>
	

