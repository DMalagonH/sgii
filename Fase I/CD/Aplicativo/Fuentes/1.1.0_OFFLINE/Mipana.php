<?
	session_start();
	//$_SESSION['UsuID']= 1;
	if(empty($_SESSION['UsuID']))
	{
		$_POST['Moduele']=0;
	}
	include('Modules/clsMasterModulesMain.php');
	include('Modules/clsMasterModules.php');
	$objModuloMain = new clsMasterModulesMain();
	$objModulo = new clsMasterModules();
	$objModuloMain->IdModule = $_POST['Moduele'];
	$objModulo->IdModule = $_POST['Moduele'];
	$objModuloMain->mtdCallHeder();
?>
<html xml:lang="es" lang="es" xmlns="http://www.w3.org/1999/xhtml"><head>
<!--
        Creado por Nivel Siete www.nivel7.net

        This website is powered by TYPO3 - inspiring people to share!
        TYPO3 is a free open source Content Management Framework initially created by Kasper Skaarhoj and licensed under GNU/GPL.
        TYPO3 is copyright 1998-2011 of Kasper Skaarhoj. Extensions are copyright of their respective owners.
        Information and contribution at http://typo3.com/ and http://typo3.org/
-->


  <title>Mipana: Campus Virtual</title>
  <meta name="generator" content="TYPO3 4.5 CMS">
  <link rel="stylesheet" type="text/css" href="http://mipana.unipanamericana.edu.co/A.typo3temp,,_stylesheet_05dc9a1d71.css,,q1319226492+fileadmin,,_templates,,_estilos,,_tooltip.css,,q1296590177,Mcc.jp51KjTJzv.css.pagespeed.cf.x01n6EzhqN.css" media="all">
  
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
  <link href="http://mipana.unipanamericana.edu.co/fileadmin/templates/estilos/A.reset.css+estilos.css+n7.css,Mcc.fXffvkC1MM.css.pagespeed.cf.TMeqm4Km7F.css" rel="stylesheet" type="text/css">
  
  
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
  <link type="text/css" media="all" rel="stylesheet" href="http://mipana.unipanamericana.edu.co/typo3temp/pmkshadowbox/jquery-es-flv-html-iframe-img-qt-swf-wmp-sizzle-closeOnTop/A.shadowbox.css.pagespeed.cf.ZuCSl5LAdh.css">
  <script type="text/javascript">//<![CDATA[
function shadowBoxInit(){Shadowbox.init({animate:1,animateFade:1,animSequence:'sync',autoplayMovies:1,continuous:0,counterLimit:10,counterType:'default',displayCounter:1,displayNav:1,enableKeys:1,fadeDuration:0.35,flashParams:{bgcolor:"#000000",allowfullscreen:"true"},flashVars:{},flashVersion:'9.0.0',handleOversize:'resize',handleUnsupported:'link',initialHeight:160,initialWidth:320,modal:0,onChange:function(){},onClose:function(){},onFinish:function(){},onOpen:function(){},overlayColor:'#000000',overlayOpacity:0.6,resizeDuration:0.35,showOverlay:1,showMovieControls:1,skipSetup:0,slideshowDelay:0,viewportPadding:50,preserveAspectWhileResizing:0});}
Shadowbox.path='typo3temp/pmkshadowbox/jquery-es-flv-html-iframe-img-qt-swf-wmp-sizzle-closeOnTop/';shadowBoxInit();;
//]]></script>
<?
$objModuloMain->mtdCallJScript();
?>
<link href="http://widgets.twimg.com/j/2/widget.css" rel="stylesheet" type="text/css"><style type="text/css">#twtr-widget-1 .twtr-avatar { display: block; } #twtr-widget-1 .twtr-user { display: inline; } #twtr-widget-1 .twtr-tweet-text { margin-left: 40px; }</style><style type="text/css">#twtr-widget-1 .twtr-doc,                      #twtr-widget-1 .twtr-hd a,                      #twtr-widget-1 h3,                      #twtr-widget-1 h4 {            background-color: #d8d8d8 !important;            color: #e85e0f !important;          }          #twtr-widget-1 .twtr-tweet a {            color: #e85e0f !important;          }          #twtr-widget-1 .twtr-bd, #twtr-widget-1 .twtr-timeline i a,           #twtr-widget-1 .twtr-bd p {            color: #444444 !important;          }          #twtr-widget-1 .twtr-new-results,           #twtr-widget-1 .twtr-results-inner,           #twtr-widget-1 .twtr-timeline {            background: #ffffff !important;          }</style></head>

<body class="mipana"><noscript>&lt;meta HTTP-EQUIV="refresh" content="0;url='http://mipana.unipanamericana.edu.co/campus-virtual?ModPagespeed=noscript'" /&gt;&lt;style&gt;&lt;!--table,div,span,font,p{display:none} --&gt;&lt;/style&gt;&lt;div style="display:block"&gt;Please click &lt;a href="http://mipana.unipanamericana.edu.co/campus-virtual?ModPagespeed=noscript"&gt;here&lt;/a&gt; if you are not redirected within a few seconds.&lt;/div&gt;</noscript>
  

  <div id="contenedor">
    <div id="cabecera">
      <h1><a href="/" title="Mi Pana - Portal de estudiantes y docentes"><img src="http://mipana.unipanamericana.edu.co/fileadmin/templates/imagenes/cabecera/238x92xLogoMiPana-01.png.pagespeed.ic.1V4t-4JfM2.png" width="238" height="92" alt="Mi Pana - Portal de estudiantes y docentes"></a></h1>

      <div class="portales">
        <ul class="menu">
          <li><a href="http://mipana.unipanamericana.edu.co/" onfocus="blurLink(this);"><span>Inicio</span></a></li>

          <li class="activo"><a href="campus-virtual/" onfocus="blurLink(this);"><span>Campus Virtual</span></a></li>

          <li><a href="comunidad-universitaria/" onfocus="blurLink(this);"><span>Comunidad Universitaria</span></a></li>
        </ul>

        <div class="herramientasUsuario">
          Usuario no autenticado
        </div>
      </div>
    </div>

    <div id="contenido">
      <div class="contenidoPortal">
        <div id="columnaIzquierda">
          <div class="cuadroLogin">
            <p>&nbsp;</p>
          </div><!--TYPO3SEARCH_begin-->
          <!--  CONTENT ELEMENT, uid:667/text [begin] -->

          <div id="c667" class="csc-default"></div><!--  CONTENT ELEMENT, uid:667/text [end] -->
          <!--TYPO3SEARCH_end-->

          <div class="menuPrincipal">
            <?
				$objModuloMain->mtdCallMainModule();
			?>
          </div>
		  
        </div>

        <div class="recuadroBlanco">
          <div class="contenidoRecuadroBlanco contenidoRecuadroBlancoDosColumnas">
            <div class="columnaIzquierdaContenido" width="100%">
              <!--TYPO3SEARCH_begin-->
              <!--  CONTENT ELEMENT, uid:653/login [begin] -->
				<iframe name="if_SGIIAction" src="Proyecto.php" width="100%" height="100%">
				</iframe>
              <!--  CONTENT ELEMENT, uid:653/login [end] -->
              <!--TYPO3SEARCH_end-->
            </div>

        
          </div>

          <div class="inferiorRecuadroBlanco"></div>
        </div>
      </div>
    </div>

    <div class="contenedorPie">
      <div id="pie">
        <p><a href="portal-unipanamericana/" onfocus="blurLink(this);">Portal Unipanamericana</a>&nbsp;|&nbsp;<a href="campus-virtual/" onfocus="blurLink(this);">Moodle Pana · Aulas virtuales</a>&nbsp;|&nbsp;<a href="comunidad-universitaria/" onfocus="blurLink(this);">Comunidad Virtual · Conéctate con la Unipanamericana</a><br>
        &nbsp;|&nbsp;<a href="mapa-del-sitio/" onfocus="blurLink(this);">mapa del sitio</a><br></p>

        <p class="art-page-footer">Mi.Universidad <a href="http://www.nivel7.net/">nivel7</a></p>
      </div>

      <div id="mondragon">
        <a class="mondragon" href="http://www.mondragon.edu" title="Universidad Mondragón" target="_blank"><img src="http://mipana.unipanamericana.edu.co/fileadmin/templates/imagenes/76x104xpie.png.pagespeed.ic.2LSZevf7KE.png" height="104" width="76" alt=""></a>
      </div>
    </div>
  </div><script type="text/javascript">//<![CDATA[
function goNotinet(){document.getElementById('login_nt').value=document.getElementById('email_hidden').value;document.getElementById('consecu_nt').value=Number(new Date());document.getElementById('fecha_nt').value=Number(new Date());document.notinet.submit();}
//]]></script>

  <form>
    <input type="hidden" value="" name="email" id="email_hidden">
  </form>

  <div style="display:none">
    <form name="notinet" action="http://www.notinet.com.co/index_notinet.php" method="post" id="notinet">
      <input type="hidden" name="login" id="login_nt" value=""> <input type="hidden" name="nit" value="860506140"> <input type="hidden" name="consecu" id="consecu_nt" value=""> <input type="hidden" name="fecha" id="fecha_nt" value="">
    </form>'
  </div><script src="https://www.google-analytics.com/ga.js" type="text/javascript"></script><script type="text/javascript">//<![CDATA[
try{var pageTracker=_gat._getTracker("UA-24429890-1");_gat._anonymizeIp();pageTracker._trackPageview("'/Inicio/Unipanamericana/Ingreso y Usuarios/Campus Virtual'");}catch(err){}
//]]></script><script type="text/javascript">//<![CDATA[
function setActiveStyleSheet(title){var i,a,main;for(i=0;(a=document.getElementsByTagName("link")[i]);i++){if(a.getAttribute("rel").indexOf("style")!=-1&&a.getAttribute("title")){a.disabled=true;if(a.getAttribute("title")==title)a.disabled=false;}}}
function getActiveStyleSheet(){var i,a;for(i=0;(a=document.getElementsByTagName("link")[i]);i++){if(a.getAttribute("rel").indexOf("style")!=-1&&a.getAttribute("title")&&!a.disabled)return a.getAttribute("title");}
return null;}
function getPreferredStyleSheet(){var i,a;for(i=0;(a=document.getElementsByTagName("link")[i]);i++){if(a.getAttribute("rel").indexOf("style")!=-1&&a.getAttribute("rel").indexOf("alt")==-1&&a.getAttribute("title"))return a.getAttribute("title");}
return null;}
function createCookie(name,value,days){if(days){var date=new Date();date.setTime(date.getTime()+(days*24*60*60*1000));var expires="; expires="+date.toGMTString();}
else expires="";document.cookie=name+"="+value+expires+"; path=/";}
function readCookie(name){var nameEQ=name+"=";var ca=document.cookie.split(';');for(var i=0;i<ca.length;i++){var c=ca[i];while(c.charAt(0)==' ')c=c.substring(1,c.length);if(c.indexOf(nameEQ)==0)return c.substring(nameEQ.length,c.length);}
return null;}
window.onload=function(e){var cookie=readCookie("style");var title=cookie?cookie:getPreferredStyleSheet();setActiveStyleSheet(title);}
window.onunload=function(e){var title=getActiveStyleSheet();createCookie("style",title,365);}
var cookie=readCookie("style");var title=cookie?cookie:getPreferredStyleSheet();setActiveStyleSheet(title);
//]]></script><script type="text/javascript">//<![CDATA[
get_activity();get_courses();
//]]></script>

<div id="sb-container"><div id="sb-overlay"></div><div id="sb-wrapper"><div id="sb-title"><div id="sb-nav-top"><a id="sb-nav-close" title="Cerrar" onclick="Shadowbox.close()"></a></div><div id="sb-title-inner"></div></div><div id="sb-wrapper-inner"><div id="sb-body"><div id="sb-body-inner"></div><div id="sb-loading"><div id="sb-loading-inner"><span>cargando</span></div></div></div></div><div id="sb-info"><div id="sb-info-inner"><div id="sb-counter"></div><div id="sb-nav"><a id="sb-nav-next" title="Siguiente" onclick="Shadowbox.next()"></a><a id="sb-nav-play" title="Reproducir" onclick="Shadowbox.play()"></a><a id="sb-nav-pause" title="Pausa" onclick="Shadowbox.pause()"></a><a id="sb-nav-previous" title="Anterior" onclick="Shadowbox.previous()"></a></div></div></div></div></div></body></html>