<HTML>
<BODY>
<table align="center">
  <body background="back/back4.jpg">
   <tr>
      <td><a href="principal.html" target="_self"><INPUT type="button" name="principal" value="Principal" align="middle"></a></td>
      <td><a href="contactenos.html" target="_self"><INPUT type="button" name="contactenos" value="Contactenos" align="middle"></a></td>
      <TD><a href="mision.html" target="_self"><INPUT type="button" name="mision" value="mision" align="middle"></a></td>
	<td><a href="vision.html" target="_self"><INPUT type="button" name="vision" value="Vision" align="middle"></a></td>      
	<td><a href="ofertaAcademica.html" target="_self"><INPUT type="button" name="ofertaAcademica" value="Que Ofrecemos" align="middle"></a></td>
      <td><a href="galeria.html" target="_self"><INPUT type="button" name="galeria" value="Galeria" align="middle"></a></td>
      <TD><a href="consultaAlumno.php" target="_self"><INPUT type="button" name="Consultas" value="Consultas" align="middle"></a></td>
    </tr>
  </tbody>
</table>


<?php include_once("conexion.php"); ?>
<CENTER> <H3><STRONG><FONT face="">Ingrese La Matricula del Alumno a Consultar</FONT></STRONG></H3>
<BR>
<BR>
<FORM action="consultaAlumno.php" name="forma" method="POST">
<table>
  <tbody>
    <tr>
      <td>Matricula:</td>
      <td><INPUT type="text" name="entradaMatricula" value=""/></td>
    </tr>
    <tr>
      <td></td>
      <td><A href="consultaAlumno.php"><BUTTON>Salir</BUTTON></A>
	  <INPUT type="submit" name="consultar" value="Consultar"/></td>
    </tr>
  </tbody>
</table>
</FORM>
</CENTER>

<?php 
if($_POST['consultar']){
$entradaMatricula = $_POST['entradaMatricula'];
$sqlDatosAlumno = mysql_query("SELECT * FROM alumnos WHERE idAlumno = '$entradaMatricula'");

while ($datos = mysql_fetch_array($sqlDatosAlumno)) { ?>
<table border="1" align="center">
  <tbody>
    <tr>
      <td><STRONG>Nombre:</STRONG></td>
      <td><?php echo $datos['nombre']; ?></td>
    </tr>
    <tr>
      <td><STRONG>Nivel Academico:</STRONG></td>
      <td><?echo $datos['nivelAcademico'];?></td>
    </tr>
    <tr>
      <td><STRONG>Grado:</STRONG></td>
      <td><?echo $datos['grado'];?></td>
    </tr>
  </tbody>
</table>
<?php
$idAlumno = $datos['idAlumno'];
$nombre = $datos['nombre'];
$nivel = $datos['nivelAcademico'];
$grado = $datos['grado'];
}
?>
<?php 

		if($nivel == "secundaria"){
	?>
	<FORM action="nuevaCalificacion.php" method="POST">
	<TABLE border="1" align="left" bgcolor="Lime" >
	<TR>
	<TD><STRONG>Materia</STRONG></TD>
	<TD><STRONG>Primer Bimestre</STRONG></TD>
	<TD><STRONG>Segundo Bimestre</STRONG></TD>
	<TD><STRONG>Tercer Bimestre</STRONG></TD>
	<TD><STRONG>Cuarto Bimestre<br>  </STRONG><STRONG></STRONG></TD>
	<TD><STRONG>Quinto Bimestre</STRONG></TD>
	</TR>
	<?php 
	//selecciona alumno materia segun su IdAlumno
	$sqlDatos = mysql_query("SELECT * FROM materias WHERE materias.nivelAcademico = '$nivel' AND materias.grado = '$grado' ORDER BY materias.nombreMateria ASC");

	while ($datos = mysql_fetch_array($sqlDatos)) { 
	$idMateria = $datos['idMateria'];
	$sqlDatos2 = mysql_query("SELECT * FROM calificacionesSecundaria WHERE idMateria = '$idMateria' and idAlumno = '$idAlumno'");
	$datos2 = mysql_fetch_array($sqlDatos2);
	?>

	<TR>
	<TD bgcolor="silver"><INPUT  type="hidden" name="idAlumno" value="<?php echo $_POST['idAlumno'];?>"><INPUT  type="hidden" name="idMateria[]" value="<?php echo $datos['idMateria'];?>"> <?php echo $datos['nombreMateria'];?></TD>
	<TD bgcolor="silver"><INPUT type="text" size="4" name="PrimerBimestre[]" value="<?php echo $datos2['primerBimestre'];?>"></TD>	
	<TD bgcolor="silver"><INPUT type="text" size="4" name="SegundoBimestre[]" value="<?php echo $datos2['segundoBimestre'];?>"></TD>
	<TD bgcolor="silver"><INPUT type="text" size="4" name="TercerBimestre[]" value="<?php echo $datos2['tercerBimestre'];?>"></TD>
	<TD bgcolor="silver"><INPUT type="text" size="4" name="CuartoBimestre[]" value="<?php echo $datos2['cuartoBimestre'];?>"></TD>
	<TD bgcolor="Silver"><INPUT type="text" size="4" name="QuintoBimestre[]" value="<?php echo $datos2['quintoBimestre'];?>"></TD>
	</TR>
	<?php }?>
	</TABLE>
	</FORM>
	<?php }	else{
	if($nivel == 'preparatoria' & ($grado == 'segundo' | $grado == 'cuarto' | $grado == 'sexto')){
	?>
	<!-- Si no Muestra Prepa!!;)///////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////// -->

	<FORM action="nuevaCalificacion.php" method="POST">
	<TABLE border="1" align="left" bgcolor="Lime" >
	<TR>
	<TD bgcolor="silver"><STRONG>Nombre</STRONG></TD>
	<TD><STRONG>Primer Mes</STRONG></TD>
	<TD><STRONG>Segundo Mes</STRONG></TD>
	<TD><STRONG>Tercer Mes</STRONG></TD>
	<TD><STRONG>Cuarto Mes</STRONG></TD>
	<TD><STRONG>Quinto Mes</STRONG></TD>
	</TR>
	<?php 
	//selecciona alumno materia segun su IdAlumno
	$sqlDatos = mysql_query("SELECT * FROM materias WHERE materias.nivelAcademico = '$nivel' AND materias.grado = '$grado' ORDER BY materias.nombreMateria ASC");

	while($datos = mysql_fetch_array($sqlDatos)){ 
	$idMateria = $datos['idMateria'];
	$sqlDatos2 = mysql_query("SELECT * FROM calificacionesPreparatoria WHERE idMateria = '$idMateria' and idAlumno = '$idAlumno'");
	$datos2 = mysql_fetch_array($sqlDatos2)
	?>

	<TR>
	<TD bgcolor="silver"><INPUT  type="hidden" name="idAlumno" value="<?php echo $_POST['idAlumno'];?>"><INPUT  type="hidden" name="idMateria[]" value="<?php echo $datos['idMateria'];?>"> <?php echo $datos['nombreMateria'];?></TD>
	<TD bgcolor="silver"><INPUT type="text" size="4" name="PrimerMes[]" value="<?php echo $datos2['primerMes'];?>"></TD>	
	<TD bgcolor="silver"><INPUT type="text" size="4" name="SegundoMes[]" value="<?php echo $datos2['segundoMes'];?>"></TD>
	<TD bgcolor="silver"><INPUT type="text" size="4" name="TercerMes[]" value="<?php echo $datos2['tercerMes'];?>"></TD>
	<TD bgcolor="silver"><INPUT type="text" size="4" name="CuartoMes[]" value="<?php echo $datos2['cuartoMes'];?>"></TD>
	<TD bgcolor="Silver"><INPUT type="text" size="4" name="QuintoMes[]" value="<?php echo $datos2['quintoMes'];?>"></TD>
	</TR>
	<?php }?>
	</TABLE>
	</FORM>
	<?php }
	}if($nivel == 'preparatoria' & ($grado == 'primero' | $grado == 'tercero' | $grado == 'quinto')){
?>
<FORM action="nuevaCalificacion.php" method="POST">
	<TABLE border="1" align="left" bgcolor="Lime" >
	<TR>
	<TD bgcolor="silver"><STRONG>Nombre</STRONG></TD>
	<TD><STRONG>Primer Mes</STRONG></TD>
	<TD><STRONG>Segundo Mes</STRONG></TD>
	<TD><STRONG>Tercer Mes</STRONG></TD>
	<TD><STRONG>Cuarto Mes</STRONG></TD>
	</TR>
	<?php 
	//selecciona alumno materia segun su IdAlumno
	$sqlDatos = mysql_query("SELECT * FROM materias WHERE materias.nivelAcademico = '$nivel' AND materias.grado = '$grado' ORDER BY materias.nombreMateria ASC");

	while($datos = mysql_fetch_array($sqlDatos)){ 
	$idMateria = $datos['idMateria'];
	$sqlDatos2 = mysql_query("SELECT * FROM calificacionesPreparatoria WHERE idMateria = '$idMateria' and idAlumno = '$idAlumno'");
	$datos2 = mysql_fetch_array($sqlDatos2)
	?>

	<TR>
	<TD bgcolor="silver"><INPUT  type="hidden" name="idAlumno" value="<?php echo $_POST['idAlumno'];?>"><INPUT  type="hidden" name="idMateria[]" value="<?php echo $datos['idMateria'];?>"> <?php echo $datos['nombreMateria'];?></TD>
	<TD bgcolor="silver"><INPUT type="text" size="4" name="PrimerMes[]" value="<?php echo $datos2['primerMes'];?>"></TD>	
	<TD bgcolor="silver"><INPUT type="text" size="4" name="SegundoMes[]" value="<?php echo $datos2['segundoMes'];?>"></TD>
	<TD bgcolor="silver"><INPUT type="text" size="4" name="TercerMes[]" value="<?php echo $datos2['tercerMes'];?>"></TD>
	<TD bgcolor="silver"><INPUT type="text" size="4" name="CuartoMes[]" value="<?php echo $datos2['cuartoMes'];?>"></TD>
	</TR>
	<?php }?>
	</TABLE>
	</FORM>
<?php
}
}
?>
</BODY>

</HTML>