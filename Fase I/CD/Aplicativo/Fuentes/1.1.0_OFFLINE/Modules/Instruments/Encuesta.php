<?
	include ('HeaderEncuesta.php');
?>
<html>
<head>
<link rel='stylesheet' id='Sgii1' href='../../Library_off_line/Css1.css' type='text/css'/>
<link rel='stylesheet' id='Sgii2' href='../../Library_off_line/Css2.css' type='text/css'/>
<link rel='stylesheet' id='Sgii3' href='../../Library_off_line/Css3.css' type='text/css'/>
<link rel='stylesheet' id='Sgii4' href='../../Library_off_line/Css4.css' type='text/css'/>

<script language = "JavaScript" src="../../Library_off_line/Js1.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js2.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js3.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js4.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js5.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js6.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js7.js"></script>
<link rel='stylesheet' id='Sgii' href='../../Resourses/Css/StyleSgii.css' type='text/css'/>
	<link href="../../Componentes/calendar/calendar.css" rel="stylesheet" type="text/css" />
	<script language="javascript" src="../../Componentes/calendar/calendar.js"></script>

	<style type="text/css">
	body { font-size: 11px; font-family: "verdana"; }

	pre { font-family: "verdana"; font-size: 10px; background-color: #FFFFCC; padding: 5px 5px 5px 5px; }
	pre .comment { color: #008000; }
	pre .builtin { color:#FF0000;  }
	</style>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<div id ="Div_Encuesta" class ="divContent">
	
	<h1>Encuesta</h1>
	<hr/>
	<table border ="1">
		<tr>
			<td >
				<div id ="Div_EncuestaMenu">
					
				</div>
			</td>
			<td >
				<div id="EncuestaTop" class="DivTopTable">
				<br/>
				</div>
				<div id="Encuestabody" class="DivBodyTable">
				
					<div id ="Div_ModificarEncuesta">
						<div id="Div_PanelEncuestas">
							<form name ="frmEncuesta" method ="POST" action="EncuestaPhp.php">
							<input type ="hidden" name ="hidHerramienta" value="<? echo (empty($_POST['hidHerramienta'])? null:$_POST['hidHerramienta']) ;?>">
							<input type ="hidden" name ="hidObjeto" value="<? echo (empty($_POST['hidHerramienta'])? null:$_POST['hidHerramienta']) ;?>">
							
							<table border = "1"  width="100%" >
								<tr>
									<th class="thSGII">
										<table>
											<tr>
												<td>
													Preg.
												</td>
												<td>
													Editar
												</td>
											</tr>
										</table>
									</th>
									<th class="thSGII">
										Nombre encuesta
									</th>
									<th class="thSGII">
										Fecha Inicio
									</th>
									<th class="thSGII">
										Fecha Final
									</th>
									<th class="thSGII">
										Activa
									</th>
								</tr>
								<?// Proceso dinamico?>
								<tr>
									<td>
										<input type="button" value="Agregar" name="btnaddEncuesta"/>
									</td>
									<td>
										<input type="text" name ="txtNombreEncuesta" value="" />
									</td>
									<td>
										<div style="float: left;">
										<?php
											$thisweek = date('W');
											$thisyear = date('Y');

											$dayTimes = getDaysInWeek($thisweek, $thisyear);
											//----------------------------------------

											$date1 = date('Y-m-d', $dayTimes[0]);
											$date2 = date('Y-m-d', $dayTimes[(sizeof($dayTimes)-1)]);

											function getDaysInWeek ($weekNumber, $year, $dayStart = 1) {
											  // Count from '0104' because January 4th is always in week 1
											  // (according to ISO 8601).
											  $time = strtotime($year . '0104 +' . ($weekNumber - 1).' weeks');
											  // Get the time of the first day of the week
											  $dayTime = strtotime('-' . (date('w', $time) - $dayStart) . ' days', $time);
											  // Get the times of days 0 -> 6
											  $dayTimes = array ();
											  for ($i = 0; $i < 7; ++$i) {
												$dayTimes[] = strtotime('+' . $i . ' days', $dayTime);
											  }
											  // Return timestamps for mon-sun.
											  return $dayTimes;
											}


											$myCalendar = new tc_calendar("dteFechaIni", true, false);
											$myCalendar->setIcon("../../Componentes/calendar/images/iconCalendar.gif");
											$myCalendar->setDate(date('d', strtotime($date1)), date('m', strtotime($date1)), date('Y', strtotime($date1)));
											$myCalendar->setPath("../../Componentes/calendar/");
											$myCalendar->setYearInterval(1970, 2020);
											//$myCalendar->dateAllow('2009-02-20', "", false);
											$myCalendar->setAlignment('left', 'bottom');
											$myCalendar->setDatePair('dteFechaIni', 'dteFechaFin', $date2);
											//$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
											$myCalendar->writeScript();
										?>
										</div>
									</td>
									<td>
										<div style="float: left;">
										<?php
											  $myCalendar = new tc_calendar("dteFechaFin", true, false);
											  $myCalendar->setIcon("../../Componentes/calendar/images/iconCalendar.gif");
											  $myCalendar->setDate(date('d', strtotime($date2)), date('m', strtotime($date2)), date('Y', strtotime($date2)));
											  $myCalendar->setPath("../../Componentes/calendar/");
											  $myCalendar->setYearInterval(1970, 2020);
											  //$myCalendar->dateAllow("", '2009-11-03', false);
											  $myCalendar->setAlignment('left', 'bottom');
											  $myCalendar->setDatePair('dteFechaIni', 'dteFechaFin', $date1);
											  //$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
											  $myCalendar->writeScript();
										?>
										</div>
										<!--<input type="button" name="btnTest" id="button2" value="Check the value" onClick="javascript:alert('Date select from '+this.form.dteFechaIni.value+' to '+this.form.dteFechaFin.value);">-->
									</td>
									
									<td>
										
										<input type="hidden" name="hidTipoHerramienta"  value="1" >
									</td>
									<td>
										<input type="checkbox" name ="chkEncuestaActiva" value="" />
									</td>
								</tr>
							</table>
							</form>
						</div>
						<div id="Div_Preguntas">
							<form name ="frmPregunta" method ="POST" action="EncuestaPhp.php">
							<input type ="hidden" name ="hidHerramienta" value="<? echo (empty($_POST['hidHerramienta'])? null:$_POST['hidHerramienta']) ;?>">
							<input type ="hidden" name ="hidPregunta" value="<? echo (empty($_POST['hidPregunta'])? null:$_POST['hidPregunta']) ;?>">
							<table border = "1"  width="100%" >
								<tr>
									<th class="thSGII">
										<table>
											<tr>
												<td>
													Resp.
												</td>
												<td>
													Editar
												</td>
											</tr>
										</table>
									</th>
									<th class="thSGII">
										Pregunta
									</th>
									<th class="thSGII">
										Tipo
									</th>
									<th class="thSGII">
										Activa
									</th>
								</tr>
								<?// Proceso dinamico?>
								<tr>
									<td>
										<input type="button" value="Agregar" name="btnaddPregunta" />
									</td>
									<td>
										<input type="text" name ="txtNombrePregunta" value="" />
									</td>
									<td>
										<Select name="cboTipoPregunta">
											<? // Proceso dinamico?>
										</select>
									</td>
									<td>
										<input type="checkbox" name ="chkPreguntaActiva" value="" />
									</td>
								</tr>
							</table>
							</form>
						</div>
						<div id="Div_Respuestas">
							<form name ="frmRespuesta" method ="POST" action="EncuestaPhp.php">
							<table border = "1"  width="100%" >
								<tr>
									<th class="thSGII">
										<table>
											<tr>
												<td>
													
												</td>
												<td>
													Editar
												</td>
											</tr>
										</table>
									</th>
									<th class="thSGII">
										Respuesta
									</th>
									<th class="thSGII">
										Activa
									</th>
								</tr>
									<td>
										<input type="button" value="Agregar"  name="btnaddRespuesta" />
									</td>
									<td>
										<input type="text" name ="txtNombreRepuesta" value="" />
									</td>
									<td>
										<input type="checkbox" name ="chkRespuestaActiva" value="" />
									</td>
							</table>
							</form>
						</div>
					</div>
				</div>
				<div id="EncuestaBottom" class="DivBotttomTable">
				<br/>
				</div>
			</td>
		</tr>
	</table>
<div>
<? $ObjDaUtilities->mtdFooterPage();?>
</body>
</html>
<?
?>