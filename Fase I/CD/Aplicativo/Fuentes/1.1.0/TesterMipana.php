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
            <ul>
              <li class="miMenu">
                <a href="mis-cursos/" onfocus="blurLink(this);"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAAM1BMVEX////+9vP96+f94t392NH8z8X7xbn6vK75sqP5qJj5n434lYH3jHb2gWr2eGD1blT0ZElLhhXOAAAAAXRSTlMAQObYZgAAAJ9JREFUKM/NkUEOwyAMBEmxYxOMs/9/bQlEPVRYldpL5wQaYECk9AVbUQ5lbQWRlW7kXLsMQNXXQcdFXgeHkyB4UcMg4NunYJbDzj45rQirNUyOsXGeYY43RhLO88qZHYVoLi6wIe1VM1BSe1gP0lKys/QXruUDaHsKZJJxg0BO/ldm1oudDEwyxrTfMuCWVpSIpPSf89oPINbacKRfeALQjg3pDT6X/QAAAABJRU5ErkJggg==" alt="">Mis cursos</a>

                <div class="subMenu">
                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAABI1BMVEUAAACZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmampqbm5ucnJydnZ2enp6fn5+goKChoaGioqKjo6Opqam5ubm7u7u9vb2+vr6/v7/BwcHCwsLDw8PFxcXGxsbHx8fKysrMzMzU1NTZ2dnd3d3f39/m5ubn5+fu7u7v7+/z8/P09PT19fX4+Pj6+vr7+/v8/Pz9/f3////+894eAAAAN3RSTlMACQoNDxETFRcdIm5wdnl6fIKDhIWMjY6hqauxur3Ey87P1t3i4+np6uzt7/T19vj5+vv8/f7+FH3S1AAAARhJREFUGNNF0NlOg0AAQNE7G2vpRlRSY2P8/0/qg2lqrFVS2gIDHQZ8Mp5POAKAaL7IJK6+tC2AAMi3WgoAf/mqPQhI8kKaVRJP9tJ3w2fZoZBPhco3qUGYLJp8Ol5RrLamyCXYQQmdqTZpehW/hus1nPZVVdoF4djPSzmPgiVcS8KcZo940DrSmUwNVPAGZQMy8blekAFbB2OFAua3VGsSAIPbwQYICCV4ANjBywwQjNKKDgALzzOAHqfrqE0BwoIZADWtvIytB+iPxx6ga4dvaXt7nvhXudopNy06HYOZLWPw1dm9t4qe1A5aYwwMx7P7uI6K6Tald2thbE6l9YefAQEE6WMmJYC3h+pvnjhYJoHq6tLdAX4B/HJ+y+wMqjAAAAAASUVORK5CYII=" alt="">

                  <p>Tus trabajos pendientes, entregas, materiales, notas y actividades de tus cursos.</p>

                  <ul>
                    <li><a href="ingreso-ssl/" onfocus="blurLink(this);">Debes estar autenticado para poder ver tus cursos</a></li>
                  </ul>
                </div>
              </li>

              <li class="miMenu dobleLinea">
                <a href="mi-vida-en-la-unipanamericana/" onfocus="blurLink(this);"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAAM1BMVEX////+9vP96+f94t392NH8z8X7xbn6vK75sqP5qJj5n434lYH3jHb2gWr2eGD1blT0ZElLhhXOAAAAAXRSTlMAQObYZgAAAItJREFUKM/VkMsWwyAIRIkxqVER//9rA4ipfdhNN+0swHOuzggAfyUfpvIQ6lThGVI2YYOl20SGmZP2sHJcg8mbtgb5Dm0dPoghatz4Mt9hHSFKXrmgk5ZmtvIv1+Ehu0gXvBG36AzqaGSwoB3iG9uPG3qBpK5cxXaoClEHjwA8zwEL1x2W+l3mr+kEOMAXNwRHBt0AAAAASUVORK5CYII=" alt="">Mi vida en la Unipanamericana</a>

                <div class="subMenu">
                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAABI1BMVEUAAACZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmampqbm5ucnJydnZ2enp6fn5+goKChoaGioqKjo6Opqam5ubm7u7u9vb2+vr6/v7/BwcHCwsLDw8PFxcXGxsbHx8fKysrMzMzU1NTZ2dnd3d3f39/m5ubn5+fu7u7v7+/z8/P09PT19fX4+Pj6+vr7+/v8/Pz9/f3////+894eAAAAN3RSTlMACQoNDxETFRcdIm5wdnl6fIKDhIWMjY6hqauxur3Ey87P1t3i4+np6uzt7/T19vj5+vv8/f7+FH3S1AAAARhJREFUGNNF0NlOg0AAQNE7G2vpRlRSY2P8/0/qg2lqrFVS2gIDHQZ8Mp5POAKAaL7IJK6+tC2AAMi3WgoAf/mqPQhI8kKaVRJP9tJ3w2fZoZBPhco3qUGYLJp8Ol5RrLamyCXYQQmdqTZpehW/hus1nPZVVdoF4djPSzmPgiVcS8KcZo940DrSmUwNVPAGZQMy8blekAFbB2OFAua3VGsSAIPbwQYICCV4ANjBywwQjNKKDgALzzOAHqfrqE0BwoIZADWtvIytB+iPxx6ga4dvaXt7nvhXudopNy06HYOZLWPw1dm9t4qe1A5aYwwMx7P7uI6K6Tald2thbE6l9YefAQEE6WMmJYC3h+pvnjhYJoHq6tLdAX4B/HJ+y+wMqjAAAAAASUVORK5CYII=" alt="">

                  <p>Conéctate con tus compañeros, publica tus trabajos, tus opiniones, entérate de los eventos de la universidad. ¡Comparte tu experiencia Unipanamericana!</p>

                  <ul>
                    <li><a href="mi-vida-en-la-unipanamericana/" onfocus="blurLink(this);">Mi vida en la Unipanamericana</a></li>

                    <li>
                      <a href="mi-vida-en-la-unipanamericana/mi-portafolio/" onfocus="blurLink(this);">Mi Portafolio</a>

                      <ul>
                        <li><a href="mi-vida-en-la-unipanamericana/mi-portafolio/mi-perfil/" onfocus="blurLink(this);">Mi perfil</a></li>

                        <li><a href="mi-vida-en-la-unipanamericana/mi-portafolio/mi-blog/" onfocus="blurLink(this);">Mi Blog</a></li>

                        <li><a href="mi-vida-en-la-unipanamericana/mi-portafolio/mis-contactos/" onfocus="blurLink(this);">Mis contactos</a></li>

                        <li><a href="mi-vida-en-la-unipanamericana/mi-portafolio/mis-grupos/" onfocus="blurLink(this);">Mis grupos</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="miMenu">
                <a href="bienestar-universitario/" onfocus="blurLink(this);"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAAM1BMVEX////+9vP96+f94t392NH8z8X7xbn6vK75sqP5qJj5n434lYH3jHb2gWr2eGD1blT0ZElLhhXOAAAAAXRSTlMAQObYZgAAAJ9JREFUKM/VksEOxCAIRLVSoYo4//+1e1GMZnvdZOemLzAjGML/6Crb6RZRfSRTCJQrdKHcsMnMEdmOyt3Zy3ZUiTrSdPPrplr5ogpgFpbRKhIRcTEAK04HoPRsvs9gCUCR3RY0owL1eMjqSrCT9Zk1MOyVJZwyZ7Efjl2iT66hxSDeWHmhUIZByiJy07Y1Bvh1pYC977v6nL4pxl//vw89vg+RfyNwywAAAABJRU5ErkJggg==" alt="">Bienestar Universitario</a>

                <div class="subMenu">
                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAABI1BMVEUAAACZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmampqbm5ucnJydnZ2enp6fn5+goKChoaGioqKjo6Opqam5ubm7u7u9vb2+vr6/v7/BwcHCwsLDw8PFxcXGxsbHx8fKysrMzMzU1NTZ2dnd3d3f39/m5ubn5+fu7u7v7+/z8/P09PT19fX4+Pj6+vr7+/v8/Pz9/f3////+894eAAAAN3RSTlMACQoNDxETFRcdIm5wdnl6fIKDhIWMjY6hqauxur3Ey87P1t3i4+np6uzt7/T19vj5+vv8/f7+FH3S1AAAARhJREFUGNNF0NlOg0AAQNE7G2vpRlRSY2P8/0/qg2lqrFVS2gIDHQZ8Mp5POAKAaL7IJK6+tC2AAMi3WgoAf/mqPQhI8kKaVRJP9tJ3w2fZoZBPhco3qUGYLJp8Ol5RrLamyCXYQQmdqTZpehW/hus1nPZVVdoF4djPSzmPgiVcS8KcZo940DrSmUwNVPAGZQMy8blekAFbB2OFAua3VGsSAIPbwQYICCV4ANjBywwQjNKKDgALzzOAHqfrqE0BwoIZADWtvIytB+iPxx6ga4dvaXt7nvhXudopNy06HYOZLWPw1dm9t4qe1A5aYwwMx7P7uI6K6Tald2thbE6l9YefAQEE6WMmJYC3h+pvnjhYJoHq6tLdAX4B/HJ+y+wMqjAAAAAASUVORK5CYII=" alt="">

                  <p>Aquí encontrarás las opciones que te da la Universidad para apoyarte en tu vida personal, cuidar tu salud y brindarte sana diversión.</p>

                  <ul>
                    <li><a href="bienestar-universitario/noticias-de-redaccion-bienestar/" onfocus="blurLink(this);">Noticias de RedAcción Bienestar</a></li>

                    <li><a href="bienestar-universitario/preguntas-frecuentes/" onfocus="blurLink(this);">Preguntas Frecuentes</a></li>

                    <li><a href="bienestar-universitario/eventos-bienestar-universitario/" onfocus="blurLink(this);">Eventos Bienestar Universitario</a></li>

                    <li><a href="bienestar-universitario/espacio-de-vida-academica/" onfocus="blurLink(this);">Espacio de Vida Académica</a></li>

                    <li><a href="bienestar-universitario/espacio-de-desarrollo-humano/" onfocus="blurLink(this);">Espacio de Desarrollo Humano</a></li>

                    <li><a href="bienestar-universitario/espacio-social-y-cultural/" onfocus="blurLink(this);">Espacio Social y Cultural</a></li>

                    <li><a href="bienestar-universitario/espacio-recreativo-y-deportivo/" onfocus="blurLink(this);">Espacio Recreativo y Deportivo</a></li>

                    <li><a href="bienestar-universitario/espacio-de-salud-y-prevencion/" onfocus="blurLink(this);">Espacio de Salud y Prevención</a></li>

                    <li><a href="bienestar-universitario/agenda-bienestar/" onfocus="blurLink(this);">Agenda Bienestar</a></li>
                  </ul>
                </div>
              </li>

              <li class="miMenu">
                <a href="internacionalizacion/" onfocus="blurLink(this);"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAAM1BMVEX////+9vP96+f94t392NH8z8X7xbn6vK75sqP5qJj5n434lYH3jHb2gWr2eGD1blT0ZElLhhXOAAAAAXRSTlMAQObYZgAAARVJREFUKM+NkluSxCAIRVtFfKHc/a92iCYTJz1d1XykgKMIN7xe3xiJfkKuQPOLsll0T9ZRQlVgdAAtPBizQugIQlHkDVZwtRtXyjXUuxcUNoawnS6XK+rtOchWq4GW41GyMR17F9qWkxAG0IONwEMzkZ+F10QFHk1UlQemHZfiWVeEQC4x1xPKfCvdcHk3dOdgTQN4enHBPMdb5zO8nkP7ZPKpW43MTDj0udQOWOqMfibGILRrQqif1fiMGan8BkNm5para+iX7CTeWL9/alClhsEX3tmk0fRRKVn02Ik/ZmWFYhGzGv3bomTFKEzEuSO/7xg3Xeol9/8W9v4BeCLq3T5PUDt2U9lPxNys0QmGOSVN2X8AOWUPUIiDaC4AAAAASUVORK5CYII=" alt="">Internacionalización</a>

                <div class="subMenu">
                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAABI1BMVEUAAACZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmampqbm5ucnJydnZ2enp6fn5+goKChoaGioqKjo6Opqam5ubm7u7u9vb2+vr6/v7/BwcHCwsLDw8PFxcXGxsbHx8fKysrMzMzU1NTZ2dnd3d3f39/m5ubn5+fu7u7v7+/z8/P09PT19fX4+Pj6+vr7+/v8/Pz9/f3////+894eAAAAN3RSTlMACQoNDxETFRcdIm5wdnl6fIKDhIWMjY6hqauxur3Ey87P1t3i4+np6uzt7/T19vj5+vv8/f7+FH3S1AAAARhJREFUGNNF0NlOg0AAQNE7G2vpRlRSY2P8/0/qg2lqrFVS2gIDHQZ8Mp5POAKAaL7IJK6+tC2AAMi3WgoAf/mqPQhI8kKaVRJP9tJ3w2fZoZBPhco3qUGYLJp8Ol5RrLamyCXYQQmdqTZpehW/hus1nPZVVdoF4djPSzmPgiVcS8KcZo940DrSmUwNVPAGZQMy8blekAFbB2OFAua3VGsSAIPbwQYICCV4ANjBywwQjNKKDgALzzOAHqfrqE0BwoIZADWtvIytB+iPxx6ga4dvaXt7nvhXudopNy06HYOZLWPw1dm9t4qe1A5aYwwMx7P7uI6K6Tald2thbE6l9YefAQEE6WMmJYC3h+pvnjhYJoHq6tLdAX4B/HJ+y+wMqjAAAAAASUVORK5CYII=" alt="">

                  <p>Aquí encontrarás toda la información que la Universidad tiene para ti, con respecto a las ofertas de intercambio.</p>

                  <ul>
                    <li><a href="internacionalizacion/noticias-de-redaccion-internacionalizacion/" onfocus="blurLink(this);">Noticias de RedAcción Internacionalización</a></li>

                    <li><a href="internacionalizacion/nuestra-estructura-y-servicios/" onfocus="blurLink(this);">Nuestra estructura y servicios</a></li>

                    <li><a href="internacionalizacion/convenios-internacionales/" onfocus="blurLink(this);">Convenios Internacionales</a></li>

                    <li><a href="internacionalizacion/misiones-academicas/" onfocus="blurLink(this);">Misiones Académicas</a></li>

                    <li><a href="internacionalizacion/oportunidades-de-postgrado/" onfocus="blurLink(this);">Oportunidades de Postgrado</a></li>

                    <li><a href="internacionalizacion/convocatorias-de-movilidad/" onfocus="blurLink(this);">Convocatorias de Movilidad</a></li>

                    <li><a href="internacionalizacion/convocatoria-de-movilidad-a-unipanamericana-2013/" onfocus="blurLink(this);">Convocatoria de movilidad a Unipanamericana 2013</a></li>

                    <li><a href="internacionalizacion/convocatorias-movilidad-erasmus-mundus/" onfocus="blurLink(this);">Convocatorias Movilidad-Erasmus Mundus</a></li>

                    <li><a href="internacionalizacion/testimonios-de-internacionalizacion/" onfocus="blurLink(this);">Testimonios de internacionalización</a></li>

                    <li>
                      <a href="internacionalizacion/becas/" onfocus="blurLink(this);">Becas</a>

                      <ul>
                        <li><a href="internacionalizacion/becas/lamenitec/" onfocus="blurLink(this);">Lamenitec</a></li>
                      </ul>
                    </li>

                    <li><a href="internacionalizacion/convocatoria-unaoc-ef-escuela-de-verano/" onfocus="blurLink(this);">Convocatoria UNAOC-EF Escuela de verano</a></li>

                    <li><a href="internacionalizacion/internacionalizate/" onfocus="blurLink(this);">Internacionalizate</a></li>
                  </ul>
                </div>
              </li>

              <li class="miMenu">
                <a href="registro-y-control/" onfocus="blurLink(this);"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAAM1BMVEX////+9vP96+f94t392NH8z8X7xbn6vK75sqP5qJj5n434lYH3jHb2gWr2eGD1blT0ZElLhhXOAAAAAXRSTlMAQObYZgAAAL9JREFUKM/FkkEWwyAIRGNUVDQ69z9taQrW5LXLvrIifEQnw7b9Mxxxk2D6gPKAxsg35g8plhgCsTQd/sIGRlpmjIW6rp+BtLW7CVmZB5LSYmzX2rYPxDNJgB1N6DZ/12TAnlBtiG+N7KKqsEFLAVCNGW3CcIdxgfn7yXnBG1awQrKHTyjiogkY2jdhneJOzbRCAhbj6usfqU7p5dVNcaypntgkdxdDi7jca8716Xm5r4Jn2wTePy1RyBLB/XxbHzsaCfIIjoJfAAAAAElFTkSuQmCC" alt="">Registro y Control</a>

                <div class="subMenu">
                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAABI1BMVEUAAACZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmampqbm5ucnJydnZ2enp6fn5+goKChoaGioqKjo6Opqam5ubm7u7u9vb2+vr6/v7/BwcHCwsLDw8PFxcXGxsbHx8fKysrMzMzU1NTZ2dnd3d3f39/m5ubn5+fu7u7v7+/z8/P09PT19fX4+Pj6+vr7+/v8/Pz9/f3////+894eAAAAN3RSTlMACQoNDxETFRcdIm5wdnl6fIKDhIWMjY6hqauxur3Ey87P1t3i4+np6uzt7/T19vj5+vv8/f7+FH3S1AAAARhJREFUGNNF0NlOg0AAQNE7G2vpRlRSY2P8/0/qg2lqrFVS2gIDHQZ8Mp5POAKAaL7IJK6+tC2AAMi3WgoAf/mqPQhI8kKaVRJP9tJ3w2fZoZBPhco3qUGYLJp8Ol5RrLamyCXYQQmdqTZpehW/hus1nPZVVdoF4djPSzmPgiVcS8KcZo940DrSmUwNVPAGZQMy8blekAFbB2OFAua3VGsSAIPbwQYICCV4ANjBywwQjNKKDgALzzOAHqfrqE0BwoIZADWtvIytB+iPxx6ga4dvaXt7nvhXudopNy06HYOZLWPw1dm9t4qe1A5aYwwMx7P7uI6K6Tald2thbE6l9YefAQEE6WMmJYC3h+pvnjhYJoHq6tLdAX4B/HJ+y+wMqjAAAAAASUVORK5CYII=" alt="">

                  <p>Registro de asignaturas, revisión de notas, horario y calendario académico ¡todo lo que necesitas para fortalecer tu rendimiento!</p>

                  <ul>
                    <li><a href="registro-y-control/noticias-redaccion-admisiones-registro-y-control/" onfocus="blurLink(this);">Noticias RedAcción Admisiones, registro y control</a></li>

                    <li><a href="registro-y-control/preguntas-frecuentes/" onfocus="blurLink(this);">Preguntas Frecuentes</a></li>

                    <li><a href="registro-y-control/matricula-academica/" onfocus="blurLink(this);">Matricula Académica</a></li>

                    <li><a href="registro-y-control/horarios-i2013/" onfocus="blurLink(this);">Horarios I2013</a></li>

                    <li><a href="registro-y-control/consulta-de-notas/" onfocus="blurLink(this);">Consulta de Notas</a></li>

                    <li><a href="registro-y-control/tramites-y-solicitudes/" onfocus="blurLink(this);">Trámites y Solicitudes</a></li>
                  </ul>
                </div>
              </li>

              <li class="miMenu">
                <a href="contacto-laboral/" onfocus="blurLink(this);"><img src="data:image/gif;base64,R0lGODlhHAAcAMQAAP////728/3r5/3i3f3Y0fzPxfvFufq8rvmyo/momPmfjfiVgfeMdvaBavZ4YPVuVPRkSQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEHAAAALAAAAAAcABwAAAXOICCOZEkKZqqSQwOhiHOsNDBAeO7UaSG4OdxjwDsFj5CHw1AEGIKNAmEBbQIQOZTIgXMUrFgciYFjWBPBmU1HSBFyoyeUHFSMBgGR/CUiIA5IOAsOWgYPDwlcUGgNA2hHdneBgQ9UDghhaiMKk0dMBl8ACQZ5JGGdOG08ijgKeT91NQx0giQBrA8MCStIoSOPOWYqSJoiVEHCbm86pQDLOA0ERDS0SQgFwDgIRQWoOc0rAUDekTTi3q1F4q4I4wukDeVWznDzKQKY2/b7KyEAOw==" alt="">Contacto Laboral</a>

                <div class="subMenu">
                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAABI1BMVEUAAACZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmampqbm5ucnJydnZ2enp6fn5+goKChoaGioqKjo6Opqam5ubm7u7u9vb2+vr6/v7/BwcHCwsLDw8PFxcXGxsbHx8fKysrMzMzU1NTZ2dnd3d3f39/m5ubn5+fu7u7v7+/z8/P09PT19fX4+Pj6+vr7+/v8/Pz9/f3////+894eAAAAN3RSTlMACQoNDxETFRcdIm5wdnl6fIKDhIWMjY6hqauxur3Ey87P1t3i4+np6uzt7/T19vj5+vv8/f7+FH3S1AAAARhJREFUGNNF0NlOg0AAQNE7G2vpRlRSY2P8/0/qg2lqrFVS2gIDHQZ8Mp5POAKAaL7IJK6+tC2AAMi3WgoAf/mqPQhI8kKaVRJP9tJ3w2fZoZBPhco3qUGYLJp8Ol5RrLamyCXYQQmdqTZpehW/hus1nPZVVdoF4djPSzmPgiVcS8KcZo940DrSmUwNVPAGZQMy8blekAFbB2OFAua3VGsSAIPbwQYICCV4ANjBywwQjNKKDgALzzOAHqfrqE0BwoIZADWtvIytB+iPxx6ga4dvaXt7nvhXudopNy06HYOZLWPw1dm9t4qe1A5aYwwMx7P7uI6K6Tald2thbE6l9YefAQEE6WMmJYC3h+pvnjhYJoHq6tLdAX4B/HJ+y+wMqjAAAAAASUVORK5CYII=" alt="">

                  <p>Este es un servicio de doble vía: una parte apoya a estudiantes de pregrado y educación continuada, y la otra se apoya en el sector empresarial, dando respuesta a la demanda de recurso humano en diversos sectores de la economía.</p>

                  <ul>
                    <li><a href="contacto-laboral/noticias-redaccion-contacto-laboral/" onfocus="blurLink(this);">Noticias RedAcción Contacto Laboral</a></li>

                    <li><a href="contacto-laboral/apoyo-laboral/" onfocus="blurLink(this);">Apoyo Laboral</a></li>

                    <li><a href="contacto-laboral/objetivos/" onfocus="blurLink(this);">Objetivos</a></li>

                    <li><a href="contacto-laboral/interaccion/" onfocus="blurLink(this);">Interacción</a></li>

                    <li>
                      <a href="contacto-laboral/practica-empresarial/" onfocus="blurLink(this);">Práctica Empresarial</a>

                      <ul>
                        <li><a href="contacto-laboral/practica-empresarial/practicas-desde-5-semestre/" onfocus="blurLink(this);">Prácticas desde 5 Semestre</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="miMenu">
                <a href="facultades/" onfocus="blurLink(this);"><img src="data:image/gif;base64,R0lGODlhHAAcALMAAP////728/3r5/3i3f3Y0fzPxfvFufq8rvmyo/momPiVgfeMdvaBavZ4YPVuVPRkSSH5BAEHAAAALAAAAAAcABwAAASTEMhJq7046827/2AoCOEVJI+DBKUUIM4jpyv4xnOushyc/zOHQWNoABfIBbAxrBRlDgWCEAgQrlQBAbHAMSUEoyxh5eJ0iykAJWsMEIytwoAA2h8Ig5RA4lLqdz8IFn4TgIEzgxWFEoeIeIQOBYZBCwkICAldiRYHMhMGCQU8FgIFCU0UAQoHLa6vsLGys7S1th4RADs=" alt="">Facultades</a>

                <div class="subMenu">
                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAABI1BMVEUAAACZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmampqbm5ucnJydnZ2enp6fn5+goKChoaGioqKjo6Opqam5ubm7u7u9vb2+vr6/v7/BwcHCwsLDw8PFxcXGxsbHx8fKysrMzMzU1NTZ2dnd3d3f39/m5ubn5+fu7u7v7+/z8/P09PT19fX4+Pj6+vr7+/v8/Pz9/f3////+894eAAAAN3RSTlMACQoNDxETFRcdIm5wdnl6fIKDhIWMjY6hqauxur3Ey87P1t3i4+np6uzt7/T19vj5+vv8/f7+FH3S1AAAARhJREFUGNNF0NlOg0AAQNE7G2vpRlRSY2P8/0/qg2lqrFVS2gIDHQZ8Mp5POAKAaL7IJK6+tC2AAMi3WgoAf/mqPQhI8kKaVRJP9tJ3w2fZoZBPhco3qUGYLJp8Ol5RrLamyCXYQQmdqTZpehW/hus1nPZVVdoF4djPSzmPgiVcS8KcZo940DrSmUwNVPAGZQMy8blekAFbB2OFAua3VGsSAIPbwQYICCV4ANjBywwQjNKKDgALzzOAHqfrqE0BwoIZADWtvIytB+iPxx6ga4dvaXt7nvhXudopNy06HYOZLWPw1dm9t4qe1A5aYwwMx7P7uI6K6Tald2thbE6l9YefAQEE6WMmJYC3h+pvnjhYJoHq6tLdAX4B/HJ+y+wMqjAAAAAASUVORK5CYII=" alt="">

                  <p>Toda la información de lo que quieres saber, conocer y promover de tu facultad. Aquí encontrarás eventos, seminarios, conferencias y todo lo relacionado con tu beneficio académico.</p>

                  <ul>
                    <li>
                      <a href="facultades/enlaces/" onfocus="blurLink(this);">Enlaces</a>

                      <ul>
                        <li><a href="facultades/enlaces/facultad-de-ciencias-empresariales/" onfocus="blurLink(this);">Facultad de Ciencias Empresariales</a></li>

                        <li><a href="facultades/enlaces/facultad-de-comunicacion/" onfocus="blurLink(this);">Facultad de Comunicación</a></li>

                        <li><a href="facultades/enlaces/facultad-de-ingenieria/" onfocus="blurLink(this);">Facultad de Ingeniería</a></li>

                        <li><a href="facultades/enlaces/facultad-de-educacion/" onfocus="blurLink(this);">Facultad de Educación</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="miMenu">
                <a href="apoyo-financiero/" onfocus="blurLink(this);"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAAM1BMVEX////+9vP96+f94t392NH8z8X7xbn6vK75sqP5qJj5n434lYH3jHb2gWr2eGD1blT0ZElLhhXOAAAAAXRSTlMAQObYZgAAAKhJREFUKM/N0ctuwzAQQ9GrR2RFI8/w/7+2i7h2kypddRGuhjggIEDwnykmycraYmSyxVL9DuRt+GqoBCUsaTGtkeIWA1TJ9SVNuWtCVqbrVyY9kebkB1rv9ri81eaeLoxCrpQ4qg9xYaVMv1OP2pH0jTtMI8F+Iica3MIbjAXuAF3rpSo2fVC0wii0fr32GaWxbeMsr/iUB4LWX37gmxyrt1v+2n5avgCXdROA92tacwAAAABJRU5ErkJggg==" alt="">Apoyo Financiero</a>

                <div class="subMenu">
                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAABI1BMVEUAAACZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmampqbm5ucnJydnZ2enp6fn5+goKChoaGioqKjo6Opqam5ubm7u7u9vb2+vr6/v7/BwcHCwsLDw8PFxcXGxsbHx8fKysrMzMzU1NTZ2dnd3d3f39/m5ubn5+fu7u7v7+/z8/P09PT19fX4+Pj6+vr7+/v8/Pz9/f3////+894eAAAAN3RSTlMACQoNDxETFRcdIm5wdnl6fIKDhIWMjY6hqauxur3Ey87P1t3i4+np6uzt7/T19vj5+vv8/f7+FH3S1AAAARhJREFUGNNF0NlOg0AAQNE7G2vpRlRSY2P8/0/qg2lqrFVS2gIDHQZ8Mp5POAKAaL7IJK6+tC2AAMi3WgoAf/mqPQhI8kKaVRJP9tJ3w2fZoZBPhco3qUGYLJp8Ol5RrLamyCXYQQmdqTZpehW/hus1nPZVVdoF4djPSzmPgiVcS8KcZo940DrSmUwNVPAGZQMy8blekAFbB2OFAua3VGsSAIPbwQYICCV4ANjBywwQjNKKDgALzzOAHqfrqE0BwoIZADWtvIytB+iPxx6ga4dvaXt7nvhXudopNy06HYOZLWPw1dm9t4qe1A5aYwwMx7P7uI6K6Tald2thbE6l9YefAQEE6WMmJYC3h+pvnjhYJoHq6tLdAX4B/HJ+y+wMqjAAAAAASUVORK5CYII=" alt="">

                  <p>Conoce descuentos especiales, becas, convenios y diferentes opciones de financiación.</p>

                  <ul>
                    <li><a href="apoyo-financiero/preguntas-frecuentes/" onfocus="blurLink(this);">Preguntas Frecuentes</a></li>

                    <li><a href="apoyo-financiero/solicitudes-financieras/" onfocus="blurLink(this);">Solicitudes Financieras</a></li>

                    <li><a href="apoyo-financiero/formas-de-pago/" onfocus="blurLink(this);">Formas de Pago</a></li>

                    <li><a href="apoyo-financiero/becas-y-descuentos/" onfocus="blurLink(this);">Becas y Descuentos</a></li>

                    <li><a href="apoyo-financiero/creditos-icetex/" onfocus="blurLink(this);">Créditos Icetex</a></li>

                    <li><a href="apoyo-financiero/creditos-compensar/" onfocus="blurLink(this);">Créditos Compensar</a></li>

                    <li><a href="apoyo-financiero/creditos-entidades-financieras/" onfocus="blurLink(this);">Créditos entidades financieras</a></li>

                    <li><a href="apoyo-financiero/convenios-de-financiacion-para-alianza-sed/" onfocus="blurLink(this);">Convenios de Financiación para Alianza SED</a></li>

                    <li><a href="apoyo-financiero/otras-alternativas-de-financiacion/" onfocus="blurLink(this);">Otras Alternativas de Financiación</a></li>

                    <li><a href="apoyo-financiero/matricula-estudiantes-antiguos/" onfocus="blurLink(this);">Matrícula Estudiantes Antiguos</a></li>
                  </ul>
                </div>
              </li>

              <li class="miMenu">
                <a href="biblioteca/" onfocus="blurLink(this);"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAAM1BMVEX////+9vP96+f94t392NH8z8X7xbn6vK75sqP5qJj5n434lYH3jHb2gWr2eGD1blT0ZElLhhXOAAAAAXRSTlMAQObYZgAAAM9JREFUKM990ksSxCAIBNAWSYYYIn3/087CaL4zvaJ8RaElwDnqrJMIXqIeJivpQJqflKSQ9GTBKeUXIiNcjeQxq3QiXTHXsIbZWeRK9ZNAAFKeNAMAAZBL7lTnQTvO2xvtCDTbpFOWO/rKRuoskqVhbmhw3R+sQdp+oXqgelhS54EtBW6D7sgIeqeBS+28jmrg0azwH+jbHzT4dMZ0w/PQLfyGp2yK32i4occfVPTfo+cn+tgHXJBr3XEQEHUhWUSsRqlkuSz8VMLaQV7qhb54chtKnGhILwAAAABJRU5ErkJggg==" alt="">Biblioteca</a>

                <div class="subMenu">
                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAABI1BMVEUAAACZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmampqbm5ucnJydnZ2enp6fn5+goKChoaGioqKjo6Opqam5ubm7u7u9vb2+vr6/v7/BwcHCwsLDw8PFxcXGxsbHx8fKysrMzMzU1NTZ2dnd3d3f39/m5ubn5+fu7u7v7+/z8/P09PT19fX4+Pj6+vr7+/v8/Pz9/f3////+894eAAAAN3RSTlMACQoNDxETFRcdIm5wdnl6fIKDhIWMjY6hqauxur3Ey87P1t3i4+np6uzt7/T19vj5+vv8/f7+FH3S1AAAARhJREFUGNNF0NlOg0AAQNE7G2vpRlRSY2P8/0/qg2lqrFVS2gIDHQZ8Mp5POAKAaL7IJK6+tC2AAMi3WgoAf/mqPQhI8kKaVRJP9tJ3w2fZoZBPhco3qUGYLJp8Ol5RrLamyCXYQQmdqTZpehW/hus1nPZVVdoF4djPSzmPgiVcS8KcZo940DrSmUwNVPAGZQMy8blekAFbB2OFAua3VGsSAIPbwQYICCV4ANjBywwQjNKKDgALzzOAHqfrqE0BwoIZADWtvIytB+iPxx6ga4dvaXt7nvhXudopNy06HYOZLWPw1dm9t4qe1A5aYwwMx7P7uI6K6Tald2thbE6l9YefAQEE6WMmJYC3h+pvnjhYJoHq6tLdAX4B/HJ+y+wMqjAAAAAASUVORK5CYII=" alt="">

                  <p>Consulta los recursos bibliográficos físicos y virtuales que necesitas para apoyar tus actividades académicas.</p>

                  <ul>
                    <li><a href="biblioteca/solicitud-de-servicios-de-biblioteca/" onfocus="blurLink(this);">Solicitud de Servicios de Biblioteca</a></li>

                    <li><a href="biblioteca/noticias-de-redaccion/" onfocus="blurLink(this);">Noticias de RedAcción</a></li>

                    <li><a href="biblioteca/preguntas-frecuentes/" onfocus="blurLink(this);">PREGUNTAS FRECUENTES</a></li>

                    <li><a href="biblioteca/catalogo-bibliografico/" onfocus="blurLink(this);">Catálogo Bibliográfico</a></li>

                    <li>
                      <a href="biblioteca/noticias-de-interes/" onfocus="blurLink(this);">Noticias de Interés</a>

                      <ul>
                        <li><a href="biblioteca/noticias-de-interes/sitios-web/" onfocus="blurLink(this);">Sitios Web</a></li>

                        <li><a href="biblioteca/noticias-de-interes/revistas-virtuales/" onfocus="blurLink(this);">Revistas Virtuales</a></li>

                        <li><a href="biblioteca/noticias-de-interes/periodicos-virtuales/" onfocus="blurLink(this);">Periódicos Virtuales</a></li>

                        <li><a href="biblioteca/noticias-de-interes/enciclopedias-y-diccionarios/" onfocus="blurLink(this);">Enciclopedias y Diccionarios</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="miMenu">
                <a href="docentes/" onfocus="blurLink(this);"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAAM1BMVEX////+9vP96+f94t392NH8z8X7xbn6vK75sqP5qJj5n434lYH3jHb2gWr2eGD1blT0ZElLhhXOAAAAAXRSTlMAQObYZgAAAJ9JREFUKM/FkkkSxCAIRcEpaEzL/U/bwSmamG33X1jI009BAfA/mYUaO3ihvULm+BDHDuVU3VFLrkDcCkyXpWpQSTKcge+WARs0+a25N1AgNVhq4gT3DB1AzAFNsOcsifQEnbCE65oo0Df/zwS30l5QQNKFH6C+xhoetsSvihCG2zFPnmofvB7SCN0dDrbJPhek/k2Eq/1R7hya/d2+fgF3NxBwG+5EuwAAAABJRU5ErkJggg==" alt="">Docentes</a>

                <div class="subMenu">
                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAABI1BMVEUAAACZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmampqbm5ucnJydnZ2enp6fn5+goKChoaGioqKjo6Opqam5ubm7u7u9vb2+vr6/v7/BwcHCwsLDw8PFxcXGxsbHx8fKysrMzMzU1NTZ2dnd3d3f39/m5ubn5+fu7u7v7+/z8/P09PT19fX4+Pj6+vr7+/v8/Pz9/f3////+894eAAAAN3RSTlMACQoNDxETFRcdIm5wdnl6fIKDhIWMjY6hqauxur3Ey87P1t3i4+np6uzt7/T19vj5+vv8/f7+FH3S1AAAARhJREFUGNNF0NlOg0AAQNE7G2vpRlRSY2P8/0/qg2lqrFVS2gIDHQZ8Mp5POAKAaL7IJK6+tC2AAMi3WgoAf/mqPQhI8kKaVRJP9tJ3w2fZoZBPhco3qUGYLJp8Ol5RrLamyCXYQQmdqTZpehW/hus1nPZVVdoF4djPSzmPgiVcS8KcZo940DrSmUwNVPAGZQMy8blekAFbB2OFAua3VGsSAIPbwQYICCV4ANjBywwQjNKKDgALzzOAHqfrqE0BwoIZADWtvIytB+iPxx6ga4dvaXt7nvhXudopNy06HYOZLWPw1dm9t4qe1A5aYwwMx7P7uI6K6Tald2thbE6l9YefAQEE6WMmJYC3h+pvnjhYJoHq6tLdAX4B/HJ+y+wMqjAAAAAASUVORK5CYII=" alt="">

                  <p>La lista de servicios específicos para los profesores.</p>

                  <ul>
                    <li><a href="docentes/diplomados-centro-de-formacion-docente/" onfocus="blurLink(this);">Diplomados Centro de Formación Docente</a></li>

                    <li>
                      <a href="docentes/politicas/" onfocus="blurLink(this);">Políticas</a>

                      <ul>
                        <li><a href="docentes/politicas/estatuto-del-profesor/" onfocus="blurLink(this);">Estatuto del profesor</a></li>
                      </ul>
                    </li>

                    <li><a href="docentes/distinciones-y-reconocimientos/" onfocus="blurLink(this);">Distinciones y reconocimientos</a></li>
                  </ul>
                </div>
              </li>

              <li class="miMenu">
                <a href="emprendimiento/" onfocus="blurLink(this);"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAAM1BMVEUAAADnXwznXwznXwznXwznXwznXwznXwznXwznXwznXwznXwznXwznXwznXwznXwznXwy6E5+xAAAAEHRSTlMAECAwQFBgcICPn6+/z9/vIxqCigAAALdJREFUKM+l0EmyhCAQRdGHgCSayt3/amtgU18LRj9HBCcimyf1KqZJo1oAG1gGIPbRAEh9jABtNHVu7LlPxczd3dc4msh74eyeJe9jA8IIAaYRzo06aJvcd6B+8c8156d/MY1xv9INJd5YOV55vg9vF64h5WfTwhb9XjE9sABtBaDGNxqwhXB9/aIfCenGY9ctFmB+4xEaVQbqomG/uJ0okgx/otPO3CbNi0laa8mSFHyZLOo/9QEhsRKbkArxRAAAAABJRU5ErkJggg==" alt="">Emprendimiento</a>

                <div class="subMenu">
                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAABI1BMVEUAAACZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmampqbm5ucnJydnZ2enp6fn5+goKChoaGioqKjo6Opqam5ubm7u7u9vb2+vr6/v7/BwcHCwsLDw8PFxcXGxsbHx8fKysrMzMzU1NTZ2dnd3d3f39/m5ubn5+fu7u7v7+/z8/P09PT19fX4+Pj6+vr7+/v8/Pz9/f3////+894eAAAAN3RSTlMACQoNDxETFRcdIm5wdnl6fIKDhIWMjY6hqauxur3Ey87P1t3i4+np6uzt7/T19vj5+vv8/f7+FH3S1AAAARhJREFUGNNF0NlOg0AAQNE7G2vpRlRSY2P8/0/qg2lqrFVS2gIDHQZ8Mp5POAKAaL7IJK6+tC2AAMi3WgoAf/mqPQhI8kKaVRJP9tJ3w2fZoZBPhco3qUGYLJp8Ol5RrLamyCXYQQmdqTZpehW/hus1nPZVVdoF4djPSzmPgiVcS8KcZo940DrSmUwNVPAGZQMy8blekAFbB2OFAua3VGsSAIPbwQYICCV4ANjBywwQjNKKDgALzzOAHqfrqE0BwoIZADWtvIytB+iPxx6ga4dvaXt7nvhXudopNy06HYOZLWPw1dm9t4qe1A5aYwwMx7P7uI6K6Tald2thbE6l9YefAQEE6WMmJYC3h+pvnjhYJoHq6tLdAX4B/HJ+y+wMqjAAAAAASUVORK5CYII=" alt="">

                  <ul>
                    <li><a href="emprendimiento/noticias-de-redaccion-emprendimiento/" onfocus="blurLink(this);">Noticias de RedAcción Emprendimiento</a></li>

                    <li><a href="emprendimiento/tu-equipo-de-apoyo/" onfocus="blurLink(this);">Tu Equipo de apoyo</a></li>
                  </ul>
                </div>
              </li>

              <li class="miMenu">
                <a href="investigacion/" onfocus="blurLink(this);"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAAY1BMVEUAAADnXwznXwznXwznXwznXwznXwz75NfnXwznXwznXwzsfz3nXwz518LnXwznXwzxpHTnXwznXwzpaRvqcyrsfTrth0nvkVjwm2fypXbzr4b1uZX2w6T4zbP86+H+9fD///9p4yrXAAAAEnRSTlMAECAwQFBgYICPn5+/v8/f3+8+I7ZIAAAAuklEQVQoz32R0RKCIBBFQZHUDONKimjh/39lapkTupzXM3d35y5jO2KGnZNrzOiCHxVXaPpxdAZ1epAVrJ8WBtRhVsJOXwYUgVSN3+RkdLAR3c9NDv83C7hdPiFjMqPH9sFYpvDanA8PYhnaTVrkYQkl2jXrLdSxvxLonLMN1Em5LFNYIR7DhUikuSeMQnSoSMlqcvDyc0SiXMeiRSyaIBYtY9EUj/FC2pt3hlPyOm+V5Ekamu4wFR/3BooZFEX+wwNYAAAAAElFTkSuQmCC" alt="">Investigación</a>

                <div class="subMenu"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAABI1BMVEUAAACZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmampqZmZmampqbm5ucnJydnZ2enp6fn5+goKChoaGioqKjo6Opqam5ubm7u7u9vb2+vr6/v7/BwcHCwsLDw8PFxcXGxsbHx8fKysrMzMzU1NTZ2dnd3d3f39/m5ubn5+fu7u7v7+/z8/P09PT19fX4+Pj6+vr7+/v8/Pz9/f3////+894eAAAAN3RSTlMACQoNDxETFRcdIm5wdnl6fIKDhIWMjY6hqauxur3Ey87P1t3i4+np6uzt7/T19vj5+vv8/f7+FH3S1AAAARhJREFUGNNF0NlOg0AAQNE7G2vpRlRSY2P8/0/qg2lqrFVS2gIDHQZ8Mp5POAKAaL7IJK6+tC2AAMi3WgoAf/mqPQhI8kKaVRJP9tJ3w2fZoZBPhco3qUGYLJp8Ol5RrLamyCXYQQmdqTZpehW/hus1nPZVVdoF4djPSzmPgiVcS8KcZo940DrSmUwNVPAGZQMy8blekAFbB2OFAua3VGsSAIPbwQYICCV4ANjBywwQjNKKDgALzzOAHqfrqE0BwoIZADWtvIytB+iPxx6ga4dvaXt7nvhXudopNy06HYOZLWPw1dm9t4qe1A5aYwwMx7P7uI6K6Tald2thbE6l9YefAQEE6WMmJYC3h+pvnjhYJoHq6tLdAX4B/HJ+y+wMqjAAAAAASUVORK5CYII=" alt=""></div>
              </li>
            </ul>
          </div><a href="enlaces/reglamentos/" onfocus="blurLink(this);" class="punteado">Reglamentos</a><a href="enlaces/cual-es-mi-usuario-de-acceso/" onfocus="blurLink(this);" class="punteado">¿Cuál es mi usuario de acceso?</a> <!--TYPO3SEARCH_begin--><!--TYPO3SEARCH_end-->
        </div>

        <div class="recuadroBlanco">
          <div class="contenidoRecuadroBlanco contenidoRecuadroBlancoDosColumnas">
            <div class="columnaIzquierdaContenido">
              <!--TYPO3SEARCH_begin-->
              <!--  CONTENT ELEMENT, uid:653/login [begin] -->
				<iframe name="if_SGIIAction" src="Proyecto.php" width="100%" height="100%">
				</iframe>
              <!--  CONTENT ELEMENT, uid:653/login [end] -->
              <!--TYPO3SEARCH_end-->
            </div>

            <div class="columnaDerechaContenido">
              <div class="cuadro sinPadding"></div>

              <div class="contDer">
                <!--  CONTENT ELEMENT, uid:865/image [begin] -->

                <div id="c865" class="csc-default">
                  <!--  Image block: [begin] -->

                  <div class="csc-textpic csc-textpic-center csc-textpic-above">
                    <div class="csc-textpic-imagewrap csc-textpic-single-image" style="width:220px;">
                      <a href="fileadmin/Documentos/Imagenes/PLANO-INSTITUCIONAL-50X70.jpg" target="_blank"><img src="http://mipana.unipanamericana.edu.co/typo3temp/pics/220x78xf9794a1b1a.jpg.pagespeed.ic.LeMKOzgbkd.webp" width="220" height="78" alt=""></a>
                    </div>
                  </div>

                  <div class="csc-textpic-clear">
                    <!-- -->
                  </div><!--  Image block: [end] -->
                </div><!--  CONTENT ELEMENT, uid:865/image [end] -->
                <!--  CONTENT ELEMENT, uid:1168/image [begin] -->

                <div id="c1168" class="csc-default">
                  <!--  Image block: [begin] -->

                  <div class="csc-textpic csc-textpic-center csc-textpic-above">
                    <div class="csc-textpic-imagewrap csc-textpic-single-image" style="width:220px;">
                      <a href="fileadmin/Imagenes/calendario_academ_I-_2013.pdf" target="_blank" onclick="pageTracker._trackEvent('Download','pdf','fileadmin/Imagenes/calendario_academ_I-_2013.pdf');"><img src="http://mipana.unipanamericana.edu.co/uploads/pics/220x70xboton_calendario1_18_01_2013.jpg.pagespeed.ic.mzvLUh83wO.webp" width="220" height="70" alt=""></a>
                    </div>
                  </div>

                  <div class="csc-textpic-clear">
                    <!-- -->
                  </div><!--  Image block: [end] -->
                </div><!--  CONTENT ELEMENT, uid:1168/image [end] -->
                <!--  CONTENT ELEMENT, uid:1349/image [begin] -->

                <div id="c1349" class="csc-default">
                  <!--  Image block: [begin] -->

                  <div class="csc-textpic csc-textpic-center csc-textpic-above">
                    <div class="csc-textpic-imagewrap csc-textpic-single-image" style="width:217px;">
                      <a href="http://siafbogota.unipanamericana.edu.co:8091/academusoft/academico/horarios/on_line/ind_hor_pub_seguro.jsp" target="_blank"><img src="http://mipana.unipanamericana.edu.co/uploads/pics/217x70xboton_horarios_02.png.pagespeed.ic.qf7ZX98jlg.png" width="217" height="70" alt=""></a>
                    </div>
                  </div>

                  <div class="csc-textpic-clear">
                    <!-- -->
                  </div><!--  Image block: [end] -->
                </div><!--  CONTENT ELEMENT, uid:1349/image [end] -->
                <!--  CONTENT ELEMENT, uid:1444/image [begin] -->

                <div id="c1444" class="csc-default">
                  <!--  Image block: [begin] -->

                  <div class="csc-textpic csc-textpic-center csc-textpic-above csc-textpic-equalheight">
                    <div class="csc-textpic-imagewrap csc-textpic-single-image" style="width:234px;">
                      <a href="noticias-y-eventos/comite-de-becas/" target="_blank"><img src="http://mipana.unipanamericana.edu.co/typo3temp/pics/234x30x79306def40.jpg.pagespeed.ic.1mndF58nFh.webp" width="234" height="30" alt=""></a>
                    </div>
                  </div>

                  <div class="csc-textpic-clear">
                    <!-- -->
                  </div><!--  Image block: [end] -->
                </div><!--  CONTENT ELEMENT, uid:1444/image [end] -->
                <!--  CONTENT ELEMENT, uid:1153/image [begin] -->

                <div id="c1153" class="csc-default">
                  <!--  Image block: [begin] -->

                  <div class="csc-textpic csc-textpic-center csc-textpic-above">
                    <div class="csc-textpic-imagewrap csc-textpic-single-image" style="width:218px;">
                      <a href="http://www.unipanamericana.edu.co/index.php?contact_form" target="_blank"><img src="data:image/webp;base64,UklGRuQGAABXRUJQVlA4INgGAAByIQCdASraABwAPok2lUeioY0lH5kUBEJR3D0Bv+Gf7f99Uu1dutykE7hAGklQ/6AJC7ngOfP3VX1QJSH/MdbP7f9e/fvy1+dX2tw7/idP98d7Y/3bpgPQP/mX+J9qp7e4C9XPl//C9kv4f/Eeh/0x/vP5RfA7+Uf5Pk8KAv8v/tf+09tL/A/7H+J/JX2lfT//P9wP+Zf1f/n9if0iv2PMF/09/E98Fy68bJ4H/lTUVSMGNdHDOyr4K11diMvUU7bH+gCcmG12BAheU9skuDIykMWOktzi8NIpSjdi1T+mOYu/1k9csNxV43QzjGoIG74KaqxrosWo0a1IZoZAfLIJaQGI4+j47sh74i89KqIbXYK+cgAA/v4yV8j1x6zTkRvUKZoBe5/kbQOttEHZh6mmRkXEn9I7jie1n7q6pqhXsz2KL1JoIweIoxFGwfvaB0n1wM6Q8JjQNhxYFAjQlMD8w0fESA4n0yKsP0cerppioP7E2pad3QmX6rl2FAXJ2t1J7hd7XZRqMECyTFdhXzBmjPfLT1ao4CdhOijPgPcNBi7W72mTVyd3cuQNi75jVx2JcLp6wEgqVj3QhTrfr5rE2a0fjCnY2UmxFXXs8DQXP3D8QXg+xK6DB9Gt5NIB/H4n70FQOUunlL8bWww9UY3HN9AZhtDIpWvb24mUU78KF3ifx0bYRh2AmpzaexzK6vzBzoqa8FgPjbm+03W5c5W2/Ccss2FghUE/syUNfA9u7VElpMmsMHNWoJnIFUkjexKF+dsHlMoXnYoRV9fyqjNhIHd/Q/UGAmiOUPg5cWAgWbsaSnW9IBtIn4F8DkyiivFYLPiiuzRAovfAGnd69yQ3AHXLDSnXpdomp7+/uYJW5cZH5m0ny49Gbr5ZLvYnfpDrDB+MXIxdnLnvKNicduW9C5gQoik7I6c18wQFSinRHGE2X/VkiOaVa0ZIlBQKTdkkgmRIw3VMe/csYQbHe3yGmQzUXcQoU3pDai7uDJqnNjGLRbut5ZZ/w8X5mpy3wLfS/Na9zX+6jV+oymI7QG2Yjtts9CtuCH8q+D4Xp279c6QVVBaBWesdmLdwMMHR1woLveeFL/6YKmBKohx14F7cLjKeYagtxnqkmtkGe2vSv7WWEWs5giDNreFqVsFjj/j6iL0nAnJWTkwtmPFYSQTMEaMinxmznfDelwgWvfzKkMxM7gcTvJxm/W/IkSCuwEC1T1mfPYMMouEgbfyVvVEpR+d7SvT0ZEvjDdvbdm7uPjCXsDUPpmK1/fQFMdpDJls/rvEz+ZqVWnKfe8nbnLx6NX2Wld8YBd+TXQQeqPoCuBYLLSJ5FaCREfiPBK/R0HoABH9s8HJLNmqRuH+aY+n8nr5vIEL3xPfTcbEBxB9hv8eD4mPhiUUp/QRayezx0Ilzt4BLpUezZ4GikGUnYJFp2w6MvcRQnOaBsibmvXLtnetcoBN8HwRxoV3et9M0ojKMVhkpasLDC45Fic7QfrmFN8PBZZ6Uv+PO/OId+lWImEfjUiVrbUQywH1eOAKFhNhIBw6hFhBhlNAkxBk7YuAx60rqzZYEdHKHp8CSXfaL/Gd/VXa+7T7XvOrE5m+RgI9rWKxJJMQ/g0dMCQ/t+SUNZaPsAA8t87geloCyC+owKDUBF9912tE9RxGecQLEia9UZijKm5z5DBWA2mZAgdMfx7/SP98p4pv4ySua0gxIXip8rcSjb+sx7xxEJun1khx2QqudgcjzXWtBCogPt+sI/zA7xX0Gql3v7GIfV/5DrI9pf4WWwgiSuuzX5PV+b0ZP80phceIOkFl4R9QqHizYajQ3u86VW36f2XHFzEdsotVXd/nYP4bjWkZm40/jLPlAQmjZCA8app6hJTk+hb3+6aL+rVjwbnuRKYyrdOHe494nujxF2/0jJ9GPubmqiWrPr9VUFoj+jWT2Xn3n2BjNQ29AxHfw/T0B5luWRiNcygh2YNqXG32+IQVMNse98/LwYuzXUQUdWWXOeIxxAc+gsnqU3zXZ4FG1XHDe+1DKZGxDlL5H+6dGbFAlxp5Y42nMDoXwafHH/uc28cLNB52OZD0JR/Wm/1L2JPgK5rJSlJNHbpVvy1kQB3K0zV8Wiyj0yi94Ayv06nEUroIb9SEG1bF2X1VCLTSd45xi6thCTfyRH/thoOHR5pgXcuYAokMM49pGumahkrj/B7s3iRhZhSAKXilmxCPsCoYiYCXmigNgumU2XHpaOrO0/ZDmtKAY60ERkOx9HfXX0rwJOvb2W9V0SCcZw8dsQBXcyvcfI8Z5oc3g30YJW4GHMLuXgDnMkic3AUK2TMjD0ItRghFV1ERyFhKAAAA=" alt=""></a>
                    </div>
                  </div>

                  <div class="csc-textpic-clear">
                    <!-- -->
                  </div><!--  Image block: [end] -->
                </div><!--  CONTENT ELEMENT, uid:1153/image [end] -->
                <!--  CONTENT ELEMENT, uid:687/html [begin] -->

                <div id="c687" class="csc-default">
                  <!--  Raw HTML content: [begin] -->
                  <script src="http://widgets.twimg.com/j/2/widget.js" type="text/javascript"></script> <script type="text/javascript">//<![CDATA[
new TWTR.Widget({version:2,type:'search',search:'Unipanamericana',interval:6000,title:'Unipanamericana en Twitter',subject:'Últimos mensajes',width:'auto',height:300,theme:{shell:{background:'#d8d8d8',color:'#e85e0f'},tweets:{background:'#ffffff',color:'#444444',links:'#e85e0f'}},features:{scrollbar:false,loop:true,live:true,hashtags:true,timestamp:true,avatars:true,toptweets:true,behavior:'default'}}).render().start();
//]]></script><div class="twtr-widget" id="twtr-widget-1"><div class="twtr-doc" style="width: 100%;">            <div class="twtr-hd"><h3><a target="_blank" style="color:#e85e0f" href="https://twitter.com/search/Unipanamericana">Unipanamericana en Twitter</a></h3>                      <h4><a target="_blank" style="color:#e85e0f" href="https://twitter.com/search/Unipanamericana">Últimos mensajes</a></h4>             </div>            <div class="twtr-bd">              <div class="twtr-timeline" style="height: 300px;">                <div class="twtr-tweets">                  <div class="twtr-reference-tweet"></div><div id="tweet-id-159" class="twtr-tweet"><div class="twtr-tweet-wrap">         <div class="twtr-avatar">           <div class="twtr-img"><a target="_blank" href="https://twitter.com/intent/user?screen_name=unipanamericana"><img alt="unipanamericana profile" src="http://a0.twimg.com/profile_images/3604275124/45a78d2031c0bd48c54506ae7bdbade7_normal.jpeg"></a></div>         </div>         <div class="twtr-tweet-text">           <p>             <a target="_blank" href="https://twitter.com/intent/user?screen_name=unipanamericana" class="twtr-user">unipanamericana</a> <a class="tweet-url username" data-screen-name="andres_orjuela" href="http://twitter.com/andres_orjuela" target="_blank">@andres_orjuela</a> Hola esa información la puedes encontrar en <a href="http://t.co/qEcGuojCGC" target="_blank" urlentities="[object Object]" rel="nofollow">soyunipanamericana.com</a>. Saludos             <em>            <a target="_blank" class="twtr-timestamp" time="Wed, 15 May 2013 18:25:02 +0000" href="https://twitter.com/unipanamericana/status/334736192883023872">2 hours ago</a> ·            <a target="_blank" class="twtr-reply" href="https://twitter.com/intent/tweet?in_reply_to=334736192883023872">reply</a> ·             <a target="_blank" class="twtr-rt" href="https://twitter.com/intent/retweet?tweet_id=334736192883023872">retweet</a> ·             <a target="_blank" class="twtr-fav" href="https://twitter.com/intent/favorite?tweet_id=334736192883023872">favorite</a>             </em>           </p>         </div>       </div></div><div id="tweet-id-158" class="twtr-tweet"><div class="twtr-tweet-wrap">         <div class="twtr-avatar">           <div class="twtr-img"><a target="_blank" href="https://twitter.com/intent/user?screen_name=unipanamericana"><img alt="unipanamericana profile" src="http://a0.twimg.com/profile_images/3604275124/45a78d2031c0bd48c54506ae7bdbade7_normal.jpeg"></a></div>         </div>         <div class="twtr-tweet-text">           <p>             <a target="_blank" href="https://twitter.com/intent/user?screen_name=unipanamericana" class="twtr-user">unipanamericana</a> <a class="tweet-url username" data-screen-name="jainabejarano" href="http://twitter.com/jainabejarano" target="_blank">@jainabejarano</a> para todos los estudiantes hay clase en la jornada diurna y nocturna excepto para los estudiantes de la facultad de educación             <em>            <a target="_blank" class="twtr-timestamp" time="Wed, 15 May 2013 20:13:13 +0000" href="https://twitter.com/unipanamericana/status/334763418420641792">about 1 hour ago</a> ·            <a target="_blank" class="twtr-reply" href="https://twitter.com/intent/tweet?in_reply_to=334763418420641792">reply</a> ·             <a target="_blank" class="twtr-rt" href="https://twitter.com/intent/retweet?tweet_id=334763418420641792">retweet</a> ·             <a target="_blank" class="twtr-fav" href="https://twitter.com/intent/favorite?tweet_id=334763418420641792">favorite</a>             </em>           </p>         </div>       </div></div><div id="tweet-id-157" class="twtr-tweet"><div class="twtr-tweet-wrap">         <div class="twtr-avatar">           <div class="twtr-img"><a target="_blank" href="https://twitter.com/intent/user?screen_name=unipanamericana"><img alt="unipanamericana profile" src="http://a0.twimg.com/profile_images/3604275124/45a78d2031c0bd48c54506ae7bdbade7_normal.jpeg"></a></div>         </div>         <div class="twtr-tweet-text">           <p>             <a target="_blank" href="https://twitter.com/intent/user?screen_name=unipanamericana" class="twtr-user">unipanamericana</a> ¡Deja tu huella! danos a conocer tu punto de vista sobre el reglamento.
<a href="http://t.co/up12ri4yGj" target="_blank" urlentities="[object Object]" rel="nofollow">goo.gl/DBCxS</a>             <em>            <a target="_blank" class="twtr-timestamp" time="Tue, 14 May 2013 14:24:24 +0000" href="https://twitter.com/unipanamericana/status/334313248897769472">yesterday</a> ·            <a target="_blank" class="twtr-reply" href="https://twitter.com/intent/tweet?in_reply_to=334313248897769472">reply</a> ·             <a target="_blank" class="twtr-rt" href="https://twitter.com/intent/retweet?tweet_id=334313248897769472">retweet</a> ·             <a target="_blank" class="twtr-fav" href="https://twitter.com/intent/favorite?tweet_id=334313248897769472">favorite</a>             </em>           </p>         </div>       </div></div><div id="tweet-id-156" class="twtr-tweet"><div class="twtr-tweet-wrap">         <div class="twtr-avatar">           <div class="twtr-img"><a target="_blank" href="https://twitter.com/intent/user?screen_name=unipanamericana"><img alt="unipanamericana profile" src="http://a0.twimg.com/profile_images/3604275124/45a78d2031c0bd48c54506ae7bdbade7_normal.jpeg"></a></div>         </div>         <div class="twtr-tweet-text">           <p>             <a target="_blank" href="https://twitter.com/intent/user?screen_name=unipanamericana" class="twtr-user">unipanamericana</a> Buenos días Unipanamericanos!!!... Recuerden que aún estan a tiempo para realizar la evaluación docente: <a href="http://t.co/JYjaaQIwBN" target="_blank" urlentities="[object Object]" rel="nofollow">goo.gl/BZnJV</a>             <em>            <a target="_blank" class="twtr-timestamp" time="Thu, 09 May 2013 13:25:42 +0000" href="https://twitter.com/unipanamericana/status/332486537776345088">6 days ago</a> ·            <a target="_blank" class="twtr-reply" href="https://twitter.com/intent/tweet?in_reply_to=332486537776345088">reply</a> ·             <a target="_blank" class="twtr-rt" href="https://twitter.com/intent/retweet?tweet_id=332486537776345088">retweet</a> ·             <a target="_blank" class="twtr-fav" href="https://twitter.com/intent/favorite?tweet_id=332486537776345088">favorite</a>             </em>           </p>         </div>       </div></div>                  <!-- tweets show here -->                </div>              </div>            </div>            <div class="twtr-ft">              <div><a target="_blank" href="https://twitter.com"><img alt="" src="http://widgets.twimg.com/i/widget-bird.png"></a>                <span><a target="_blank" class="twtr-join-conv" style="color:#e85e0f" href="https://twitter.com/search/Unipanamericana">Join the conversation</a></span>              </div>            </div>          </div></div> <!--  Raw HTML content: [end] -->
                </div><!--  CONTENT ELEMENT, uid:687/html [end] -->
              </div>
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