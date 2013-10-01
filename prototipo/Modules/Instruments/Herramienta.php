<html>
<head>
	<script language="JavaScript" type="text/JavaScript" src="Resourses/Js/RegExpresion.js"></script>
	<script language="JavaScript" type="text/JavaScript" >
		function Click_Check(ObjCheck, ObjValuesCheck, ObjValidator)
		{
			if(ObjCheck.type=="checkbox")
			{
				var Count =0;
				ObjValuesCheck.value="";
				for (i = 0; lcheck = ObjCheck[i]; i++) {
					if (lcheck.checked) {
						if (Count ==0)
						{
							ObjValuesCheck.value =  lcheck.value
						}
						else
						{
							ObjValuesCheck.value = ObjValuesCheck.value + "|" + lcheck.value
						}
						Count++;
					}
				}
				if(Count==0)
				{
					ObjValidator.style.display="";
				}
				else
				{
					ObjValidator.style.display="none";
				}
			}
			else if(ObjCheck.type=="radio")
			{
				alert(ObjCheck.name);
			}
				
		}
		
		</script>
</head>
<body>
<?


	Function CrearObjetoRespuestaMultiple ($intNumRespuesta,$strPregunta,$intIdPregunta)
	{
		?>
		<table>
		<tr>
		<td>
			<h2><?echo $strPregunta;?></h2>
		</td>
		</tr>
		
		<?
		for ($i=0; $i < $intNumRespuesta ; $i++)
		{
			?>
			<tr><td><input type="Checkbox" id ="chk_<? echo $intIdPregunta;?>" value ="<? echo $i;?>" onclick ="Click_Check(chk_<? echo $intIdPregunta;?>,Respuesta_<? echo $intIdPregunta;?>,Validator_<? echo $intIdPregunta;?> );">Respuesta <? echo $i;?></td></tr>
			<?
		}
		?>
		<tr>
		<td>
			<input type="TextBox" id ="Respuesta_<? echo $intIdPregunta;?>" value ="">
		</td>
		</tr>
		<tr>
		<td>
			<div id="Validator_<? echo $intIdPregunta;?>" style="display:none;">
				<span style="color:red;">Debe seleccionar al menos una opción<span>
			</div>
		</td>
		</tr>
		</table>
		<?
	}
	Function CrearObjetoRespuestaUnica ($intNumRespuesta,$strPregunta,$intIdPregunta)
	{
		?>
		<table>
		<tr>
		<td>
			<h2><?echo $strPregunta;?></h2>
		</td>
		</tr>
		
		<?
		for ($i=0; $i < $intNumRespuesta ; $i++)
		{
			?>
			<tr><td><input type="Radio" name ="rdn_<? echo $intIdPregunta;?>" value ="<? echo $i;?>" onclick ="Click_Check(rdn_<? echo $intIdPregunta;?>[<?echo $i;?>],Respuesta_<? echo $intIdPregunta;?>,Validator_<? echo $intIdPregunta;?> );">Respuesta <? echo $i;?></td></tr>
			<?
		}
		?>
		<tr>
		<td>
			<input type="TextBox" id ="Respuesta_<? echo $intIdPregunta;?>" value ="">
		</td>
		</tr>
		<tr>
		<td>
			<div id="Validator_<? echo $intIdPregunta;?>" style="display:none;">
				<span style="color:red;">Debe seleccionar al menos una opción<span>
			</div>
		</td>
		</tr>
		</table>
		<?
	}
	Function CrearObjetoRespuestaAbierta ($strPregunta,$intIdPregunta)
	{
		?>
		<table>
		<tr>
		<td>
			<h2><?echo $strPregunta;?></h2>
		</td>
		</tr>
			<tr><td><input type="text" name ="txt_<? echo $intIdPregunta;?>" value ="" onkeypress="ValidateAlphaNumeric(this.name,Validator_<? echo $intIdPregunta;?> );" onchange="ValidateAlphaNumeric(this.name,Validator_<? echo $intIdPregunta;?>);"></td></tr>
		<tr>
		<td>
			
			<p id="Validator_<? echo $intIdPregunta;?>" style="color:red;">
			</p>
		</td>
		</tr>
		</table>
		<?
	}
	CrearObjetoRespuestaMultiple(6,"Pregunta 5",5);
	CrearObjetoRespuestaUnica(6,"Pregunta 7",7);
	CrearObjetoRespuestaAbierta("Pregunta 8",8);
?>
</body>
</html>