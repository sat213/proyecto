<?php
$conexion=mysql_connect("localhost","root","") or die ("Error hosting"); 
$base=mysql_select_db("exmn",$conexion) or die ("Error de base");
?>