<?
/*---------------------------------------------------------------------------------------------          
  Autor : Cristian Camilo Moreno         
  Fecha Creación : 09/01/2013          
  Propósito : Generar una libreria multiproposito de utilidades         
  Entradas : Ninguna 
  
  Fecha modificación     
  Cambio realizado :  
 -----------------------------------------------------------------------------------------------*/       
Class DaPhpUtilities{
	
	var $conexion;
	var $datos;
	var $resultado;
	var $MotorType;
	var $DbName;
	var $ServerName;
	var $UserBD;
	var $PwdBD;
	var $NameCIA;
	var $WebCIA;
	var $NameApp;
	var $LogoCIA;
/*** Constructor ***/
	function DaPhpUtilities()
	{
		include ('AppConfiguration.conf.php');
		$this->MotorType = $strMotorType; 
		$this->DbName = $strDbName;
		$this->ServerName = $strServerName;
		$this->UserBD = $strUserBD;
		$this->PwdBD = $strPwdBD;
		$this->NameCIA = $strNombreCIA;
		$this->WebCIA = $strWebCIA;
		$this->NameApp = $strNombreApp;
		$this->LogoCIA = $strLogo;
	}
/*** Funciones Genericas ***/
	
	function mtdOpenConectionBd()
	{
		if($this->MotorType == "MSSQL")
		{
			$this->mtdAbrirConexionMSSQL();
		}
		else if ($this->MotorType == "MySQL")
		{
			$this->mtdAbrirConexionMySQL();
		}
	}
	function mtdCloseConectionBd()
	{
		if($this->MotorType == "MSSQL")
		{
			$this->mtdCerrarConexionMSSQL();
		}
		else if ($this->MotorType == "MySQL")
		{
			$this->mtdCerrarConexionMySQL();
		}
	}
	function mtdEjecutarSQL($SQL)
	{
		if($this->MotorType == "MSSQL")
		{
			$result = $this->mtdEjecutarMSSQL($SQL);
			return $result;
			
		}
		else if ($this->MotorType == "MySQL")
		{
			$result = $this->mtdEjecutarMySQL($SQL);
			return $result;
		}
	}

/*** Funciones especificas **/
	function mtdEjecutarMSSQL($SQL)
	{
		$result = mssql_query($SQL); 
		return $result;
	}
	function mtdEjecutarMySQL($SQL)
	{
		$result = mysql_query($SQL); 
		return $result;
	}
	function mtdAbrirConexionMSSQL()
	{
		$this->conexion = mssql_connect($this->ServerName,$this->UserBD,$this->PwdBD) or die("No se puede conectar a SQL SERVER.");
		mssql_select_db($this->DbName,$this->conexion); 
	}
	function mtdCerrarConexionMSSQL()
	{
		mssql_close($this->conexion);
	}
	function mtdAbrirConexionMySQL()
	{
		$this->conexion = mysql_connect($this->ServerName,$this->UserBD,$this->PwdBD) or die("No se puede conectar a Mysql.");
		mysql_select_db($this->DbName,$this->conexion);
	}
	function mtdCerrarConexionMySQL()
	{
		mysql_close($this->conexion);
	}
	function mtdNextRow($ArrayName)
	{
		if($this->MotorType == "MSSQL")
		{
			$row=mssql_fetch_array($ArrayName);
			return $row;
		}
		else if ($this->MotorType == "MySQL")
		{
			$row=mysql_fetch_array($ArrayName);
			return $row;
		}
	}
	
	function mtdCreateOptionsComboBox($DataSourse,$NameColumnsText, $NameColumnsValue, $SelectedValue)
	{
		$counter=0;
		if($DataSourse == null)
		{
			echo "<option value='-1'>Sin datos</option>";
		}
		else
		{
			while ($row = $this->mtdNextRow($DataSourse)) { 
				$counter++; 
				echo "<option ";
				if($SelectedValue == $row [$NameColumnsValue])
				{
					echo " selected ";
				}
				echo " value='".$row [$NameColumnsValue]."'>".$row [$NameColumnsText]."</option>";
			} 
		}
	}

	/* Functiones de modulos*/
	function mtdCallJavaScript ()
	{	
		echo "<script language='JavaScript' type='text/JavaScript' src='Resourses/Js/RegExpresion.js'></script>\n";
		//Galeria de imagenes deslizantes --> mtdModuleImagesSildes() ***********
		echo "<script language='JavaScript' type='text/JavaScript' src='Resourses/Js/jquery-1.8.3.min.js'></script>\n";
		echo "<script language='JavaScript' type='text/JavaScript' src='Resourses/Js/jquery.kwicks.js'></script>\n";
		//***********************************************************************
		//Galeria de Examinador de archivos --> () ***********
		echo "<script language='JavaScript' type='text/JavaScript' src='Resourses/Js/jqueryFileTree/jqueryFileTree.js'></script>\n";
		//****************************************************
		//****************************************************
		//Scripts de mipana
		?>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
			<script src="http://mipana.unipanamericana.edu.co/typo3conf/ext/jwplayer/Resources/Public/Player/jwplayer.js,q1322079835.pagespeed.jm.5_4_DKyiUc.js" type="text/javascript"></script>
			<script type="text/javascript">//<![CDATA[
			var tx_jwplayer={init:function(){if(typeof(tx_jwplayer_list)!="undefined"){for(var playerId in tx_jwplayer_list){var config=tx_jwplayer_list[playerId];if(html5File=tx_jwplayer.chooseHtml5Format(config.html5)){config.modes[1]['config']={'file':html5File,'provider':'video'};}
			jwplayer(playerId).setup(config);}}},clickTracking:function(player){if(typeof wt_sendinfo=='function'){var filename=player.config.file;filename=filename.substring(filename.lastIndexOf('/')+1);var clickname=window.webtrekk.contentId+'.movie.'+filename;wt_sendinfo(clickname,'click');}},checkSupportedFormats:function(){var v=document.createElement('video');var vtype=new Array();if(!!(v.canPlayType&&v.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/no/,'')))
			vtype.push('webm');if(!!(v.canPlayType&&v.canPlayType('video/ogg; codecs="theora, vorbis"').replace(/no/,'')))
			vtype.push('ogv');if(!!(v.canPlayType&&v.canPlayType('video/mp4; codecs="avc1.42E01E, mp4a.40.2"').replace(/no/,'')))
			vtype.push('mp4');if(vtype.length==0)return false;return vtype;},chooseHtml5Format:function(fileList){var supported=tx_jwplayer.checkSupportedFormats();var i=0;while(i<supported.length){if(typeof(fileList[supported[i]])!='undefined'&&fileList[supported[i]]!=''){return fileList[supported[i]];}
			i++;}
			return false;}}
			if(typeof jQuery!='function'){$(function(){tx_jwplayer.init();});}else{tx_jwplayer.init();}
			//]]></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js" type="text/javascript"></script>
			<script type="text/javascript" language="javascript">//<![CDATA[
			?
			(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY;};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev]);}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob);},cfg.interval);}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev]);};var handleHover=function(e){var p=(e.type=="mouseover"?e.fromElement:e.toElement)||e.relatedTarget;while(p&&p!=this){try{p=p.parentNode;}catch(e){p=this;}}if(p==this){return false;}var ev=jQuery.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);}if(e.type=="mouseover"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob);},cfg.interval);}}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob);},cfg.timeout);}}};return this.mouseover(handleHover).mouseout(handleHover);};})(jQuery);
			//]]></script>
			  <script type="text/javascript" language="">//<![CDATA[
			$(document).ready(function(){function addMega(){$("li.miMenu").removeClass("hovering");$(this).addClass("hovering");}
			function removeMega(){$(this).removeClass("hovering");}
			var megaConfig={interval:150,sensitivity:4,over:addMega,timeout:500,out:removeMega};$("li.miMenu").hoverIntent(megaConfig);$("li.miMenu").bind("click",function(){$(this).addClass("hovering");});});
			//]]></script>
			<script type="text/javascript" src="typo3temp/pmkshadowbox/jquery-es-flv-html-iframe-img-qt-swf-wmp-sizzle-closeOnTop/shadowbox.js"></script>
			<script type="text/javascript">//<![CDATA[
			function shadowBoxInit(){Shadowbox.init({animate:1,animateFade:1,animSequence:'sync',autoplayMovies:1,continuous:0,counterLimit:10,counterType:'default',displayCounter:1,displayNav:1,enableKeys:1,fadeDuration:0.35,flashParams:{bgcolor:"#000000",allowfullscreen:"true"},flashVars:{},flashVersion:'9.0.0',handleOversize:'resize',handleUnsupported:'link',initialHeight:160,initialWidth:320,modal:0,onChange:function(){},onClose:function(){},onFinish:function(){},onOpen:function(){},overlayColor:'#000000',overlayOpacity:0.6,resizeDuration:0.35,showOverlay:1,showMovieControls:1,skipSetup:0,slideshowDelay:0,viewportPadding:50,preserveAspectWhileResizing:0});}
			Shadowbox.path='typo3temp/pmkshadowbox/jquery-es-flv-html-iframe-img-qt-swf-wmp-sizzle-closeOnTop/';shadowBoxInit();;
			//]]></script>
		<?
	}
	function mtdCallStyleSheet()
	{

		//****************************************************
		//Stilos de mipana
		?>
		<link href="http://mipana.unipanamericana.edu.co/fileadmin/templates/estilos/A.reset.css+estilos.css+n7.css,Mcc.fXffvkC1MM.css.pagespeed.cf.TMeqm4Km7F.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="http://mipana.unipanamericana.edu.co/A.typo3temp,,_stylesheet_05dc9a1d71.css,,q1319226492+fileadmin,,_templates,,_estilos,,_tooltip.css,,q1296590177,Mcc.jp51KjTJzv.css.pagespeed.cf.x01n6EzhqN.css" media="all">
		<link type="text/css" media="all" rel="stylesheet" href="http://mipana.unipanamericana.edu.co/typo3temp/pmkshadowbox/jquery-es-flv-html-iframe-img-qt-swf-wmp-sizzle-closeOnTop/A.shadowbox.css.pagespeed.cf.ZuCSl5LAdh.css">
		<link href="http://widgets.twimg.com/j/2/widget.css" rel="stylesheet" type="text/css">
		<style type="text/css">#twtr-widget-1 .twtr-avatar { display: block; } #twtr-widget-1 .twtr-user { display: inline; } #twtr-widget-1 .twtr-tweet-text { margin-left: 40px; }</style>
		<style type="text/css">#twtr-widget-1 .twtr-doc,                      #twtr-widget-1 .twtr-hd a,                      #twtr-widget-1 h3,                      #twtr-widget-1 h4 {            background-color: #d8d8d8 !important;            color: #e85e0f !important;          }          #twtr-widget-1 .twtr-tweet a {            color: #e85e0f !important;          }          #twtr-widget-1 .twtr-bd, #twtr-widget-1 .twtr-timeline i a,           #twtr-widget-1 .twtr-bd p {            color: #444444 !important;          }          #twtr-widget-1 .twtr-new-results,           #twtr-widget-1 .twtr-results-inner,           #twtr-widget-1 .twtr-timeline {            background: #ffffff !important;          }</style>
		<?
		
	}
	
	function mtdFooterPage ()
	{
		$Date =  getdate();
		echo " <div id='DivFooterSGII' class='FooterSGII'><hr/>";
        echo " Copyright © 2013 - " . $Date['year'] . " <a href='" . $this->WebCIA . "'>" . $this->NameCIA . "</a><br/>Designed by Grupo de investigación de ingeniería de sistemas GIIS";
		echo " </div> ";
	}
	
}
?>