<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
  </head>
  <body background="back/back4.jpg">

<BR><BR><BR>

<BR><BR><BR>

<BR><BR><BR>



<CENTER><H2>Eliminar Alumno</H2></CENTER>


<?php 
include_once("conexion.php");
$sqlDatos = mysql_query("SELECT nombre FROM alumnos");
?>

<FORM action="borrarAlumno.php" method="POST">
<TABLE width="1" cellspacing="2" cellpadding="2" align="Center">
<TR><TD>Alumno:</TD><TD><SELECT name="nombre" >
<OPTGROUP>
<?php while ($datos=mysql_fetch_array($sqlDatos)){ ?>
<OPTION> <?php echo $datos["nombre"]; ?> </OPTION>
</OPTGROUP>
<?php } ?>
</SELECT></TD></TR>

<TR><TD><A href="administradorCalificaciones.php"><INPUT type="button" name="salir" value="Cancelar o Salir" size="30" maxlength="30" align="middle"></A></TD>

<TD><CENTER><INPUT type="submit" name="eliminar" value="Eliminar" size="30" maxlength="30" align="middle"></CENTER></TD></TR>
</TABLE>

<?php
if(isset($_POST['eliminar'])){
$result = mysql_query("DELETE FROM alumnos WHERE nombre like '".$_POST["nombre"]."' ");;
?>
<CENTER>
<BR>
<BR>
<?php echo "Se elimino correctamente la el usuario!";?>
</CENTER>
<?php
}
?>

  </body>
</html>