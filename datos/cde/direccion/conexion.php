<?php
$host="localhost";
$login="root";
$password="";

$db=mysql_connect($host,$login,$password)
or die ("No pude conectarme a la base de datos");
mysql_select_db("vasconcelos")
or die ("No puedo acceder a la base de datos personal");
?>
