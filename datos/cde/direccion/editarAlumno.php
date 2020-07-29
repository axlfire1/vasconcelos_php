<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
  </head>
  <?php 
include_once("conexion.php");
?>
  <body background="back/back4.jpg">

<CENTER><STRONG><H1>Modifica Alumno</H1><BR><A href="administradorCalificaciones.php"><INPUT type="button" value="Salir o Cancelar"></A></STRONG></CENTER><BR>
<TABLE   align="center">
<TR>
<TD align="center"><STRONG>Matricula</STRONG></TD>
<TD align="center"><STRONG>Nombre</STRONG></TD>
<TD align="center"><STRONG>Nivel Academico</STRONG></TD>
<TD align="center"><STRONG>Grado </STRONG></TD>
<TD align="center"><STRONG>Grupo</STRONG></TD>
</TR>


<?php $sqlContenidoTablaInfo = 'SELECT * FROM `alumnos` ORDER BY `nombre` ASC ';
$result = mysql_query($sqlContenidoTablaInfo);
while ($datosTabla = mysql_fetch_array($result)){?>
<FORM action="editarAlumno.php" method="GET">

<TD align="center"><INPUT name="idAlumno" type="text" value="<?php echo $datosTabla["idAlumno"];?>"></TD>

<TD align="center"><INPUT name="nombre" type="text" value="<?php echo $datosTabla["nombre"]; ?>"></TD>

<TD align="center"><INPUT name="nivelAcademico" type="text" value="<?php echo $datosTabla["nivelAcademico"]; ?>">  </TD>

<TD align="center"><INPUT name="grado" type="text" value="<?php echo $datosTabla["grado"]; ?>">  </TD>

<TD align="center"><INPUT name="grupo" type="text" value="<?php echo $datosTabla["grupo"]; ?>">  </TD>

<TD><INPUT type="submit" value="Actualizar" name="Actualizar"></TD>
</TR>
</FORM>
<?php }?>

</TABLE>

  </body>

<?php
if($_GET['Actualizar']){

$idAlumno = $_GET['idAlumno'];
$nombre = $_GET['nombre'];
$nivelAcademico = $_GET['nivelAcademico'];
$grado = $_GET['grado'];
$grupo = $_GET['grupo'];
$sqlUpdate = mysql_query("UPDATE alumnos SET idAlumno = '$idAlumno', nombre = '$nombre', nivelAcademico = '$nivelAcademico', grupo = '$grupo' WHERE idAlumno = '$idAlumno'")or die(mysql_error());
echo "Actualizacion Exitosa!!";
}
else{
//echo "no se a podido actualizar!!";
}
?>


</html>