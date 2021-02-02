<?php 
session_start();
if($_SESSION['status'] == ""){
	header("location:../input_UnitMasuk.php");
}
?>