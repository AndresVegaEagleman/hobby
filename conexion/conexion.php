<?php
$conexion=  mysql_connect("localhost","root","") or die("No hay conexion con la BBDD");
$sel_db=  mysql_select_db("hobby",$conexion) or die("No hay conexion con la tabla");
?>