<html>
<head>
</head>
<body background="back/back4.jpg">

<form name="formOculto" method="POST">
<TABLE align="center">
<TR><TD align="center"><H3>Eliminar Semestre Escolar?</H3></TD></TR>
<BR>
<BR>
<BR>
<BR><BR>
<BR><BR>
<BR><BR>
<BR><BR>
<BR>
<TR>
<TD>

<input type="submit" name="borrar" value="Borrar Datos" >
<A href="administradorCalificaciones.php">
<INPUT type="button" value="Cancelar y Salir" name="x"></A>
</TD>
</TR>
</TABLE>
</form>
<?php 
include_once("conexion.php");
if($_POST['borrar']){
	$borraCalificaciones = mysql_query("DELETE FROM calificacionesPreparatoria");
	$borraCalificaciones = mysql_query("DELETE FROM alumnos where nivelAcademico like 'preparatoria'");
} 
 ?>

</body>
</html>