<? 
include ('Header.php');
?> 
<html>
<head>
<? 

?>
<link rel='stylesheet' id='Sgii' href='Resourses/Css/StyleSgii.css' type='text/css'/>

<link rel='stylesheet' id='Sgii1' href='Library_off_line/Css1.css' type='text/css'/>
<link rel='stylesheet' id='Sgii2' href='Library_off_line/Css2.css' type='text/css'/>
<link rel='stylesheet' id='Sgii3' href='Library_off_line/Css3.css' type='text/css'/>
<link rel='stylesheet' id='Sgii4' href='Library_off_line/Css4.css' type='text/css'/>

<script language = "JavaScript" src="Library_off_line/Js1.js"></script>
<script language = "JavaScript" src="Library_off_line/Js2.js"></script>
<script language = "JavaScript" src="Library_off_line/Js3.js"></script>
<script language = "JavaScript" src="Library_off_line/Js4.js"></script>
<script language = "JavaScript" src="Library_off_line/Js5.js"></script>
<script language = "JavaScript" src="Library_off_line/Js6.js"></script>
<script language = "JavaScript" src="Library_off_line/Js7.js"></script>

</head>
<body style="padding:15%;">
<!-- Titulo Y Descripcion-->
<div id="DivLoginTop" class="DivTopTable">
<br/>
</div>
<div id="DivLoginBody" class="DivBodyTable">
  <div class="titles" align="left"><br/><br/><br/><br/><br/>
  <table border="1" class ="TableSGII" align="center">
	<tr>
		<td colspan="2">
			<h1>Iniciar Sesión</h1>
			</div>
		</td>
	</tr>
	<!-- Formulario -->
	<form action="LoginPhp.php" method="post" id="log">
	<tr>	
		<!-- Usuario -->
		<td>
			<label>Nombre de usuario:</label>
		</td>
		<td>
			<input type="text" name="txtusuario" placeholder="Nombre de Usuario"><br/>
		</td>
	</tr>
	<tr>
		<!-- Contraseña -->
		<td>
			<label>Contraseña:</label>
		</td>
		<td>
			<input type="password" name="txtpassword" placeholder="Contraseña">
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<!-- Enviar -->
			<br/>
			<input type="submit" value="Ingresar">
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<br/>
		<br/>
			<p class="perder"><a href="#">Olvide mi contraseña</a> | <a href="#">Registrarme</a></p>
		</td>
	</tr>
	</form>
	</table>
</div>
</div>	
<div id="DivLoginBottom" class="DivBotttomTable">
<br/>
</div>	
</body>
</html>