
<? 
#prueba 
include ('Header.php');
?> 
<html>
<head>
<? 
$ObjDaUtilities->mtdCallStyleSheet(); 
$ObjDaUtilities->mtdCallJavaScript ();
?>
<link rel='stylesheet' id='Sgii' href='Resourses/Css/StyleSgii.css' type='text/css'/>
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
			<h1>Iniciar Sesi�n</h1>
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
		<!-- Contrase�a -->
		<td>
			<label>Contrase�a:</label>
		</td>
		<td>
			<input type="password" name="txtpassword" placeholder="Contrase�a">
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
			<p class="perder"><a href="#">Olvide mi contrase�a</a> | <a href="#">Registrarme</a></p>
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