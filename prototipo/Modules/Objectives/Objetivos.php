<html>
<head>
	<script language="JavaScript">
	<!--
		function ViewHistory()
		{
			if(document.getElementById('Div_Historial_Objetivo').style.display == 'none')
			{
				document.getElementById('Div_Historial_Objetivo').style.display='';
			}
			else if(document.getElementById('Div_Historial_Objetivo').style.display == '')
			{
				document.getElementById('Div_Historial_Objetivo').style.display='none';
			}
			
		}
	-->
	</script>
</head>
<body>
<h1>Objetivos</h1>
<hr/>
<div id = "Div_Proyectos">

</div>
<h2>[NOMBRE PROYECTO]</h2>
<div id="Div_ObjetivoGeneral">
	<div id="Div_IU_ObjetivoGeneral">
		<form name="frmObjetivoGeneral" method="POST" action="ObjetivosPhp.php">
		<table border ="1">
			<tr>
				<td></td>
				<td>Objetivo general</td>
				<td>Estado</td>
				<td>Activo</td>
			</tr>
			<?// proceso dimnamico traer objetivos?>
			<tr>
				<td><input type="button" name ="btnAddObjetivoGeneral" value ="Agregar"></td>
				<td><Textarea cols ="23" rows = "5" name ="txtObjetivoGeneral"></textarea></td>
				<td>
					<select name ="cboEstadoObjetivoGeneral">
						<?// Proceso dinamico traer estados?>
					</select>
				</td>
				<td><input type="checkbox" name ="chkObjetivoGenActivo" ></td>
			</tr>
		</table>
		</form>
	</div>
	
</div>	
</div id ="Div_ObjetivoEspecifico">
	<h2>Específicos</h2>
	<hr/>
	<?//Dinamico?>
	<div id="DIV_IU_ObjetivoEspec">
		<form name="frmObjetivoEspec" method="POST" action="ObjetivosPhp.php">
		<table border ="1">
			<tr>
				<td>Editar</td>
				<td>Objetivo específico<??></td>
				<td>Estado</td>
				<td>Activo</td>
			</tr>
			<?//traer objetivos especificos?>
			<tr>
				<td><input type="button" name ="btnAgregarObjetivo" value ="Agregar" ></td>
				<td><input type="text" name ="txtobjetivoEspecifico" style="width:212px;"></td>
				<td>
					<select name ="cboEstadoObjetivoEspecifico">
						<?// Proceso dinamico traer estados?>
					</select>
				</td>
				<td><input type="checkbox" name ="chkobjetivoEspActivo" ></td>
			</tr>
		</table>
		</form>
	</div>
	
<div>
<div id="SeguimientoObjetivo">
	<form name="frmSeguimientoObj" method="POST" action="ObjetivosPhp.php">
	<table border = "1">
		<tr>
			<td colspan ="2">
				Objetivo
			</td>
			
		</tr>
		<tr>
			<td>
			Estado
			</td>
			<td>
				<select name ="cboEstadoObjetivoEspecifico">
					<?// Proceso dinamico traer estados?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Seguimiento a objetivos:
			</td>
			<td>
				<Textarea cols ="23" rows = "5" name ="txtSeguimientoObj"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				Historial:
			</td>
			<td>
				<img src="Resourses/Images/Button/Reloj.jpg" style="Cursor:pointer;" onclick="JavaScript:ViewHistory();"></img>
				<div id="Div_Historial_Objetivo" style="display:none;">
					<?//Proceso get Historial?>
					HOLA
				</div>
			</td>
		</tr>
	</table>
	</form>
</div>
<a href="Hipotesis.php">Hipotesis</a>
</body>
</html>