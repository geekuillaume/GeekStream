<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Lecteur de vidéos - Geekuillau.me</title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $baseurl; ?>css/style.css" />
</head>
<body onload="openNewMovie()" class="lecteur">
<div class="video_conteneur">
<object classid="clsid:67DABFBF-D0AB-41fa-9C46-CC0F21721616" width="100%" height="100%" codebase="http://go.divx.com/plugin/DivXBrowserPlugin.cab">

 <param name="custommode" value="none" />

  <param name="mode" value="zero" />
  <param name="src" value="<?php echo $lien; ?>" />

<embed type="video/divx" src="<?php echo $_GET['lien']; ?>" custommode="none" width="100%" height="100%" mode="zero"  pluginspage="http://go.divx.com/plugin/download/">
</embed>
</object>
<div class="alert-message info"><p>Pas de vidéos ? <a href="http://www.divx.com/software/divx-plus/web-player" target="_blank">Télécharger</a> DivX Plus Web Player.</p></div>
</div>
</body>
</html>