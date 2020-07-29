<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
        <table border="1" align="center">
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
        </table>
        
        <?php
        $idAlumno = $_POST['idAlumno'];
        ?>
        
        <BR>




  <?php 
include_once("conexion.php");   
        	if($_POST['nivel'] == "secundaria"){
        ?>
        <FORM action="nuevaCalificacion.php" method="POST">
            <TABLE width="100%" border="1" align="left" bgcolor="Lime" >
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
                    <TD bgcolor="silver"><INPUT type="text" size="4" name="CuartoBimestre[]" value="<?php echo $datos2['cuartoBimestre'];?>"></TD>
                  <TD bgcolor="Silver"><INPUT type="text" size="4" name="QuintoBimestre[]" value="<?php echo $datos2['quintoBimestre'];?>"></TD>
                </TR>
                <?php }?>
                <TR><TD><INPUT type="submit" value="Guardar Calificaciones" name="guardar"></TD></TR>
          </TABLE>
        </FORM>
        <?php } ?>
		
		
<?php
        if($_POST['nivel'] == 'preparatoria' && ($_POST['grado'] == 'segundo' || $_POST['grado'] == 'cuarto' || $_POST['grado'] == 'sexto')){
        ?>
                
        <FORM action="nuevaCalificacion.php" method="POST">
            <TABLE width="100%" border="1" align="left" bgcolor="Lime" >
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
                $datos2 = mysql_fetch_array($sqlDatos2);
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
                <TR><TD><INPUT type="submit" value="Guardar Calificaciones" name="guardarPreparatoria"></TD></TR>
          </TABLE>
        </FORM>
        <?php }	?>	
		





  <?php 
        if($_POST['nivel'] == 'preparatoria' && ($_POST['grado'] == 'primero' || $_POST['grado'] == 'tercero' || $_POST['grado'] == 'quinto')){
        ?>
        <FORM action="nuevaCalificacion.php" method="POST">
            <TABLE width="100%" border="1" align="left" bgcolor="Lime" >
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
                    <TD bgcolor="silver"><INPUT type="text" size="4" name="CuartoMes[]" value="<?php echo $datos2['cuartoMes'];?>"></TD>
                </TR>
                <?php }?>
                <TR><TD><INPUT type="submit" value="Guardar Calificaciones" name="guardarPreparatoria"></TD></TR>
          </TABLE>
        </FORM>
        <?php
        } ?>

		
        <BR />
        <?php $url = 'subirCalificaciones.php?nivel='.$nivel.'&grado='.$grado.'&buscar=buscar';?>
        <BR />
        <CENTER>
            <a href="<?=$url;?>">Regresar</a>
        </CENTER>		
</body>
</html>