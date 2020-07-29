<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php include_once("conexion.php");  ?>

<html>
  <head>
  </head>
  <body background="back/back4.jpg">
<FORM action="subirCalificaciones.php" method="POST">
<table align="center">
  <tbody>
    <tr>
      <td><SELECT name="nivel">
<OPTGROUP>
<OPTION>secundaria</OPTION>
<OPTION>preparatoria</OPTION>
</OPTGROUP>
</SELECT></td>
<td>
<SELECT name="grado">
<OPTGROUP>
<OPTION>primero</OPTION>
<OPTION>segundo</OPTION>
<OPTION>tercero</OPTION>
<OPTION>cuarto</OPTION>
<OPTION>quinto</OPTION>
<OPTION>sexto</OPTION>
</OPTGROUP>
</SELECT>
</td>
<TD>
<INPUT type="submit" name="buscar">
</TD>
    </tr>
  </tbody>
</table>
</FORM>



<?php 
if($_POST['buscar'] || $_GET['buscar'] == 'buscar'){
?>

<TABLE border="1" align="center" bgcolor="Lime" >
<TR>
<TD bgcolor="silver"><STRONG>Matricula</STRONG></TD>
<TD bgcolor="silver"><STRONG>Nombre</STRONG></TD>
</TR>
<?php 	$nivel = $_POST['nivel'].$_GET['nivel'];
	$grado = $_POST['grado'].$_GET['grado'];
	
$sqlDatos = mysql_query("SELECT *
FROM alumnos
WHERE nivelAcademico LIKE '$nivel'
AND grado LIKE '$grado'
ORDER BY nombre ASC");

	while ($datos = mysql_fetch_array($sqlDatos)) { ?>
<FORM  action="calificar.php" method="POST">
<TR>
<TD bgcolor="Silver"><INPUT type="text" size="4" name="idAlumno" value="<?php echo $datos['idAlumno']; ?>"></TD>
<TD bgcolor="Silver"><INPUT type="text" name="nombre"  value="<?php echo $datos['nombre']; ?>"></TD>
<TD><INPUT type="hidden" name="nivel" value="<?php echo $datos['nivelAcademico']?>"></TD>
<TD><INPUT type="hidden" name="grado" value="<?php echo $datos['grado']?>"></TD>
<TD><INPUT type="submit" value="Subir Calificaciones" name="calificar"></TD>
</TR>
</FORM>
<?php }?>
</TABLE>
<?php }?>

<BR><BR>
<BR><BR>
<BR>


<CENTER><A href="administradorCalificaciones.php">Regresar</A></CENTER>



  </body>
</html>
