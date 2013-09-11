<?
include ('SGII_Class/MasterClass/PhpUtilities.php');

?>
<html>
<head><link rel='stylesheet' id='Sgii1' href='../../Library_off_line/Css1.css' type='text/css'/>
<link rel='stylesheet' id='Sgii2' href='../../Library_off_line/Css2.css' type='text/css'/>
<link rel='stylesheet' id='Sgii3' href='../../Library_off_line/Css3.css' type='text/css'/>
<link rel='stylesheet' id='Sgii4' href='../../Library_off_line/Css4.css' type='text/css'/>

<script language = "JavaScript" src="../../Library_off_line/Js1.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js2.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js3.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js4.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js5.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js6.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js7.js"></script></head>
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