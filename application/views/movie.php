			<div class="poster" rel="<?php echo $id; ?>" data-controls-modal="modal-movie-<?php echo $id; ?>" data-backdrop="yes">
				<img src="<?php echo $img; ?>" width="230px">
				<div class="tape"></div>
				<div id="modal-movie-<?php echo $id; ?>" class="modal hide fade" style="display: none; ">
		            <div class="modal-body">
		              <img src="<?php echo $img; ?>" width="400px">
		              <div class="info">
			          	<h3 class="modal-title"><?php echo stripslashes($title); ?></h3>
			            <div class="separator"></div>
			            <p class="duree">Durée : <?php echo $duree; ?> minutes</p>
			            <p class="date">Date de sortie : <?php echo $date; ?></p>
			            <div class="separator"></div>
			            <p class="genres">Genres : <?php foreach(explode(',', $genres) as $genre) { echo '<span class="label success">'.$genre. '</span> '; }?></p>
			            <div class="separator"></div>
			            <p>Nombre de visionnages : <?php echo $vu; ?> </p>
			            <div class="separator"></div>
			            <h5>Description :</h5>
			            <p class="description"><?php echo stripslashes($description); ?></p>
		              </div>
		              <div class="download">
		             	<img class="loader" src="<?php echo base_url();?>img/ajax-loader.gif" style="display:none;">
		              	<a class="btn primary large" onclick="telecharger(<?php echo $id; ?>);" id="download_<?php echo $id; ?>" href="#">Télécharger</a>
		              	<a class="btn primary large" onclick="lire(<?php echo $id; ?>);" id="play_<?php echo $id; ?>" href="#">Lire</a>
		              </div>
		            </div>
		          </div>
				</div>
