<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_inventory_kp = "localhost";
$database_inventory_kp = "kp_pks";
$username_inventory_kp = "root";
$password_inventory_kp = "";
$inventory_kp = mysql_pconnect($hostname_inventory_kp, $username_inventory_kp, $password_inventory_kp) or trigger_error(mysql_error(),E_USER_ERROR); 
?>