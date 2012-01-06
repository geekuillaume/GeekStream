<?php foreach ($movies as $movie) {
?>
	<input type="radio" name="ID" value="<?php echo $movie->id; ?>" id="<?php echo $movie->id; ?>" /> <label class="add-choice-title" for="<?php echo $movie->id; ?>"><?php echo $movie->name; ?> - <?php echo substr($movie->released, 0, 4);?></label><br />
<?php
}?>
