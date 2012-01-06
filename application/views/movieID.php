<div id="<?php echo $movie->id; ?>" class="add-info">
	<img src="<?php echo $movie->images->image[4]['url'];?>" width="400px">
	<div class="info">
		<h3 class="modal-title"><?php echo $movie->name; ?></h3>
		<div class="separator"></div>
		<p class="duree">Durée : <?php echo $movie->runtime; ?> minutes</p>
		<p class="date">Date de sortie : <?php echo $movie->released; ?></p>
		<div class="separator"></div>
		<p class="genres">Genres : <?php foreach($movie->categories->category as $genre) { echo '<span class="label success">'.$genre['name']. '</span> '; }?></p>
		<div class="separator"></div>
		<h5>Description :</h5>
		<p class="description"><?php echo $movie->overview; ?></p>
		<div class="separator"></div>
		<form onsubmit="return add_movie();">
		<div class="clearfix add-form" id="add-form-lien">
	    	<label for="add-lien">Lien Megaupload : </label>
	        <input class="xlarge" id="add-lien" name="add-lien" size="30" type="text">
        </div>
        </form>
</div>