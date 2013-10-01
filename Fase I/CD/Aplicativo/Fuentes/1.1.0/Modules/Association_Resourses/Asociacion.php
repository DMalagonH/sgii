<?
include ('SGII_Class/MasterClass/PhpUtilities.php');

?>
<html>
<head></head>
<body>
<div id ="Div_Asociar_coinvestigador">
	<form name ="frmAscocInvestigadores" method ="POST" action="Asociacion.php">
		<h1>Equipo de investigadores</h1>
		<hr/>
		<table border ="1">
			<tr>
				<td colspan ="3">
					
					<?//echo "Out_POST:".(empty($_POST['cboCoinvestigadoresIn'])? "": $_POST['cboCoinvestigadoresIn'][0]);?><br/>
					<?//echo "In_POST:".(empty($_POST['cboCoinvestigadoresOut'])? "": $_POST['cboCoinvestigadoresOut'][0]);?><br/>
				</td>
			</tr>
			<tr>
				<td >
					Co-Investigadores en el proyecto
				</td>
				<td rowspan="2" >
					<input type="Submit" name="btnOut" value =">>"><br/>
					<input type="Submit" name="btnOut" Value ="<<">
				</td>
				<td >
					Co-Investigadores disponibles
				</td>
				
			</tr>
			<tr>
				<td>
					<select name ="cboCoinvestigadoresIn[]" multiple="multiple" style="width: 250px;">
						<option value="1">Pera</option>
						<option value="2">Manzana</option>
						<option value="3">Patilla</option>
						<option value="4">Papaya</option>
					</select>
				</td>
				<td>
					<select name ="cboCoinvestigadoresOut[]" multiple="multiple" style="width: 250px;">
						<option value="1">Limon</option>
						<option value="2">Maracuya</option>
						<option value="3">Lulo</option>
						<option value="4">Naranja</option>
					</select>
				</td>
			</tr>
		</table>
	</form>
<div>
</body>
</html>
<?
?>