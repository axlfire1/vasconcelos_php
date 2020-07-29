<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
  </head>

<?php 
include_once("conexion.php");
$sqlDatos = mysql_query("SELECT * FROM nivelAcademico");
$sqlDatos2 = mysql_query("SELECT * FROM grado");
$sqlDatos3 = mysql_query("SELECT * FROM grupo");
?>

  <body background="back/back4.jpg">

<BR><BR><BR>

<BR><BR><BR>

<BR><BR><BR>

<BR><BR><BR>

<FORM action="nuevoAlumno.php" method="POST">
<TABLE width="1" cellspacing="2" cellpadding="2" align="Center">
<TR>
<TD>Matricula:</TD>
<TD> <INPUT type="text" name="matricula" size="25" maxlength="30" align="middle" size="30"></TD>
</TR>
	
<TR>
<TD>Nombre:</TD>
<TD><INPUT type="text" name="nombre" size="25" maxlength="30" align="middle" size="30"></TD>
</TR>

<TR>
<TD>Nivel Academico:</TD>
<TD><SELECT name="nivelAcademico" >
<OPTGROUP>
<?php while ($datos = mysql_fetch_array($sqlDatos)){ ?>
<OPTION> <?php echo $datos["nivelAcademico"]; ?> </OPTION>
<?php } ?>
</OPTGROUP>
</SELECT></TD>
</TR>

<TR>
<TD>Grado:</TD>
<TD><SELECT name="grado" >
<OPTGROUP>
<?php while ($datos2 = mysql_fetch_array($sqlDatos2)){ ?>
<OPTION> <?php echo $datos2["grado"]; ?> </OPTION>
<?php } ?>
</OPTGROUP>
</SELECT></TD>
</TR>

<TR>
<TD>Grupo:</TD>
<TD><SELECT name="grupo" >
<OPTGROUP>
<?php while ($datos3 = mysql_fetch_array($sqlDatos3)){ ?>
<OPTION> <?php echo $datos3["grupo"]; ?> </OPTION>
<?php } ?>
</OPTGROUP>
</SELECT></TD>
</TR>

<TR>
<TD><A href="administradorCalificaciones.php"><INPUT type="button" name="salir" value="Cancelar o Salir" size="30" maxlength="30" align="middle"></A>
</TD>
<TD><CENTER><INPUT type="reset" name="reiniciar" value="Borrar" size="30" maxlength="30" align="middle"><INPUT type="submit" name="guardar" value="guardar" size="30" maxlength="30" align="middle"></CENTER></TD></TR>
</TABLE>

<?php
include_once("conexion.php");
if(isset($_POST['guardar'])){

$sql = "insert into alumnos values ('".$_POST["matricula"]."', '".$_POST["nombre"]."','".$_POST["nivelAcademico"]."','" .$_POST["grado"]."','" .$_POST["grupo"]."');";

$result = mysql_query($sql);
if($result){

?>
<CENTER>
<BR>
<BR>
<?php echo "Se instertaron correctamente los datos!";?>
</CENTER>
<?php
}else{
die(mysql_error);
}
//echo $sql;
}else{

}
?>

</FORM>
  </body>
</html>