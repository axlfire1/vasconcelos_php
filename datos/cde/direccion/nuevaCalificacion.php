<HTML>
<body background="back/back4.jpg">
		
<?php
		include_once("conexion.php"); 
		
		if($_POST['guardar']){
			$idAlumno = $_POST['idAlumno'];
			$idMateria = $_POST['idMateria'];
			$PrimerBimestre = $_POST['PrimerBimestre'];
			$SegundoBimestre = $_POST['SegundoBimestre'];
			$TercerBimestre = $_POST['TercerBimestre'];
			$CuartoBimestre = $_POST['CuartoBimestre'];
			$QuintoBimestre = $_POST['QuintoBimestre'];
		
		$n = count($PrimerBimestre);
		$i = 0;
		$borraTabla = mysql_query("Delete from calificacionesSecundaria where idAlumno = '$idAlumno'");
		
		while ($i < $n){
		
		$InsertaTabla = mysql_query("INSERT INTO calificacionesSecundaria(
		idMateria,
		idAlumno,
		primerBimestre,
		segundoBimestre,
		tercerBimestre,
		cuartoBimestre,
		quintoBimestre
		)
		VALUES(
		'$idMateria[$i]',
		'$idAlumno',
		'$PrimerBimestre[$i]',
		'$SegundoBimestre[$i]',
		'$TercerBimestre[$i]',
		'$CuartoBimestre[$i]',
		'$QuintoBimestre[$i]'
		)");
			$i++;
		}
		$selectTabla = mysql_query("select * from alumnos where idAlumno='$idAlumno'");
		$datosObt = mysql_fetch_array($selectTabla);
		$nivel = $datosObt['nivelAcademico'];
		$grado = $datosObt['grado'];
		$url2 = 'subirCalificaciones.php?nivel='.$nivel.'&grado='.$grado.'&buscar=buscar';
		echo '<script>';
		echo 'window.location.href="'.$url2.'";';
		echo '</script>';
		}
		?>
		
		<?php
		if($_POST['guardarPreparatoria']){
			$idAlumno = $_POST['idAlumno'];
			$idMateria = $_POST['idMateria'];
			$PrimerMes = $_POST['PrimerMes'];
			$SegundoMes = $_POST['SegundoMes'];
			$TercerMes = $_POST['TercerMes'];
			$CuartoMes = $_POST['CuartoMes'];
			$QuintoMes = $_POST['QuintoMes'];
		
		$n2 = count($PrimerMes);
		$i = 0;
		$borraTabla = mysql_query("Delete from calificacionesPreparatoria where idAlumno = '$idAlumno'");
		
		while ($i < $n2){
		
		$InsertaTabla = mysql_query("INSERT INTO calificacionesPreparatoria(
		idMateria,
		idAlumno,
		primerMes,
		segundoMes,
		tercerMes,
		cuartoMes,
		quintoMes
		)
		VALUES(
		'$idMateria[$i]',
		'$idAlumno',
		'$PrimerMes[$i]',
		'$SegundoMes[$i]',
		'$TercerMes[$i]',
		'$CuartoMes[$i]',
		'$QuintoMes[$i]'
		)");
			$i++;
		}
		$selectTabla = mysql_query("select * from alumnos where idAlumno='$idAlumno'");
		$datosObt = mysql_fetch_array($selectTabla);
		$nivel = $datosObt['nivelAcademico'];
		$grado = $datosObt['grado'];
		$url2 = 'subirCalificaciones.php?nivel='.$nivel.'&grado='.$grado.'&buscar=buscar';
		echo '<script>';
		echo 'window.location.href="'.$url2.'";';
		echo '</script>';
		}
		?>
		
		<HTML>
		<?php include_once("conexion.php"); ?>
		<BODY>
		<table border="1" align="center">
		<tbody>
		<tr>
		<td><STRONG>Nombre:</STRONG></td>
		<td><?php echo $_POST['nombre']; ?></td>
		</tr>
		<tr>
		<td><STRONG>Nivel Academico:</STRONG></td>
		<td><?echo $_POST['nivel'];?></td>
		</tr>
		<tr>
		<td><STRONG>Grado:</STRONG></td>
		<td><?echo $_POST['grado'];?></td>
		</tr>
		</tbody>
		</table>
		
		<?php
		$idAlumno = $_POST['idAlumno'];
		?>
		
		<BR>
		
		<?php 
		if($_POST['calificar']){
if($_POST['nivel'] == "secundaria"){
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
			$nivel = $_POST['nivel'];
			$grado = $_POST['grado'];
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
			<TD bgcolor="silver"><INPUT type="text" size="4" name="CuartoBimestre[]" value="
			<?php echo $datos2['cuartoBimestre'];?>"></TD>
			<TD bgcolor="Silver"><INPUT type="text" size="4" name="QuintoBimestre[]" value="<?php echo $datos2['quintoBimestre'];?>"></TD>
			</TR>
			<?php }?>
			<TR><TD><INPUT type="submit" value="Guardar Calificaciones" name="guardar"></TD></TR>
			</TABLE>
			</FORM>
			<?php }
			if($nivel == 'preparatoria' & ($grado == 'segundo' | $grado == 'cuarto' | $grado == 'sexto')){
			?>
					
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
			$nivel = $_POST['nivel'];
			$grado = $_POST['grado'];
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
			<TD bgcolor="silver"><INPUT type="text" size="4" name="CuartoMes[]" value="
			<?php echo $datos2['cuartoMes'];?>"></TD>
			<TD bgcolor="Silver"><INPUT type="text" size="4" name="QuintoMes[]" value="<?php echo $datos2['quintoMes'];?>"></TD>
			</TR>
			<?php }?>
			<TR><TD><INPUT type="submit" value="Guardar Calificaciones" name="guardarPreparatoria"></TD></TR>
			</TABLE>
			</FORM>
			<?php }
			if($nivel == 'preparatoria' & ($grado == 'primero' | $grado == 'tercero' | $grado == 'quinto')){?>
	
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
			$nivel = $_POST['nivel'];
			$grado = $_POST['grado'];
			//selecciona alumno materia segun su IdAlumno
			$sqlDatos = mysql_query("SELECT * FROM materias WHERE materias.nivelAcademico = '$nivel' AND materias.grado = '$grado' ORDER BY materias.nombreMateria ASC");
		
			while($datos = mysql_fetch_array($sqlDatos)){ 
			$idMateria = $datos['idMateria'];
			$sqlDatos2 = mysql_query("SELECT * FROM calificacionesPreparatoria WHERE idMateria = '$idMateria' and idAlumno = '$idAlumno'");
			$datos2 = mysql_fetch_array($sqlDatos2);
			?>
		
			<TR>
			<TD bgcolor="silver"><INPUT  type="hidden" name="idAlumno" value="<?php echo $_POST['idAlumno'];?>"><INPUT  type="hidden" name="idMateria[]" value="<?php echo $datos['idMateria'];?>"> <?php echo $datos['nombreMateria'];?></TD>
			<TD bgcolor="silver"><INPUT type="text" size="4" name="PrimerMes[]" value="<?php echo $datos2['primerMes'];?>"></TD>	
			<TD bgcolor="silver"><INPUT type="text" size="4" name="SegundoMes[]" value="<?php echo $datos2['segundoMes'];?>"></TD>
			<TD bgcolor="silver"><INPUT type="text" size="4" name="TercerMes[]" value="<?php echo $datos2['tercerMes'];?>"></TD>
			<TD bgcolor="silver"><INPUT type="text" size="4" name="CuartoMes[]" value="
			<?php echo $datos2['cuartoMes'];?>"></TD>
			</TR>
			<?php }?>
			<TR><TD><INPUT type="submit" value="Guardar Calificaciones" name="guardarPreparatoria"></TD></TR>
			</TABLE>
			</FORM>
		<?php
		}
		}
		?>
		
			<BR>
		<?php $url = 'subirCalificaciones.php?nivel='.$nivel.'&grado='.$grado.'&buscar=buscar';?>
		<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
		<CENTER>
		<a href="<?=$url;?>">Regresar</a>
		</CENTER>
		</BODY>
		</HTML>