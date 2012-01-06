<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Geekstream</title>
  <meta name="description" content="Service de streaming de film hébergés sur Megaupload">
  <meta name="author" content="Geekuillaume">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
  <script> var baseurl = '<?php echo base_url(); ?>';</script>
  <meta property="og:title" content="Geekstream" />
  <meta property="og:type" content="movie" />
  <meta property="og:url" content="http://geekuillau.me/stream/" />
  <meta property="og:image" content="" />
  <meta property="og:site_name" content="geekuillau.me" />
  
</head>

<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<div id="container">
    <header>
		<h1>Geekstream</h1>
		<div class="plus" data-controls-modal="modal-plus" data-backdrop="yes">
			<button class="btn large">Ajouter un film</button>
		</div>
		<div class="options_btn_conteneur">
			<a onclick="toggle_options();" id="options_btn" class="btn large">Options</a>
		</div>
		<div id="social"><div class="fb-like" data-href="<?php echo base_url(); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div></div>
    </header>
    <div id="options" style="display:none;">
    	<div id="order">
    		<h3>Ordonner par :</h3>
    		<li><a href="#" onclick="order_by(0);">Nom croissant (de A à Z)</a></li>
    		<li><a href="#" onclick="order_by(1);">Nom décroissant (de Z à A)</a></li>
    		<li><a href="#" onclick="order_by(2);">Vues croissant (du plus petit au plus grand)</a></li>
    		<li><a href="#" onclick="order_by(3);">Vues décroissant (du plus grand au plus petit)</a></li>
    		<li><a href="#" onclick="order_by(4);">Date d'ajout (plus récent au plus ancien)</a></li>
			<li><a href="#" onclick="order_by(5);">Date d'ajout (plus ancien au plus récent)</a></li>
    		<li><a href="#" onclick="order_by(6);">Date de sortie (plus récent au plus ancien)</a></li>
    		<li><a href="#" onclick="order_by(7);">Date de sortie (plus ancien au plus récent)</a></li>
    	</div>
    	<div class="separator_v"></div>
    	<div class="info-general">
    		<h3>Infos :</h3>
    		<p>Geekstream est un service de référencement de liens Megaupload de films en qualité DVD.</p>
    		<p>Tout les liens sont automatiquement débridés pour offrir le meilleur confort de visionnage.</p>
    		<p>Pour visionner les films en streaming et ne pas avoir à attendre la fin du téléchargement, vous aurez besoin du plugin <a href="http://www.divx.com/fr/software/divx-plus/web-player">Divx Web Player</a>.</p>
    	</div>
    </div>
    <div id="main" role="main">
    	<!--<div id="movies">-->
