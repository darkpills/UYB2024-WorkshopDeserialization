<?php 
$title="Shareplay";
$subtitle="Easily share your game saves!";
$saves_count = count($saves);
?>

<?php ob_start(); ?>
<h1><?= $title ?></h1>
<h2 class="blinking"><?= $subtitle ?></h2>
<p class="blinking">You've got <?= $saves_count; ?> save(s).</p>

<div class="container">
	<div class="retro-container">
		<form action="index.php?action=addSave" method="post">
			<section>
				<!--<label for="add-save-input">Import saved game</label>-->
				<textarea class="form-control" id="add-save-input" name="save_b64" rows="3" cols="40" placeholder="Paste your save"></textarea>
			</section>
			<section>
				<button type="submit" class="btn btn-submit">Import save</button>
			</section>
		</form>
	</div>
<?php
if ($saves_count > 0) {
?>
	<div class="retro-container">
	<form action="index.php" id="select-save-form">
		<label for="select-save-select">ID:</label>
		<select id="select-save-select" form="select-save-form" name="save_id">
			<option value="">--- Choose an ID ---</option>
<?php
foreach ($saves as $id => $save) {
?>
			<option value="<?= $id ?>"><?= $id ?></option>
<?php
}
?>
		</select>
		<section>
			<button type="submit" class="btn btn-submit">Select your save</button>
			<input type="hidden" name="action" value="selectSave"/>
		</section>
	</form>
	</div>

	<div class="retro-container">
		<form action="index.php" id="delete-save-form">
			<label for="delete-save-select">ID:</label>
			<select id="delete-save-select" form="delete-save-form" name="save_id">
				<option value="">--- Choose an ID ---</option>
	<?php
	foreach ($saves as $id => $save) {
	?>
				<option value="<?= $id ?>"><?= $id ?></option>
	<?php
	}
	?>
			</select>
			<section>
				<button type="submit" class="btn btn-submit">Delete save</button>
				<input type="hidden" name="action" value="deleteSave"/>
			</section>
		</form>
	</div>
</div>

<?php
} // end if saves_count > 0
?>

<audio controls autoplay style="display: none">
  <source src="audio/intro-cut.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio> 

<?php
if (isset($_COOKIE['debug']) && $_COOKIE['debug'] == 1) {
	echo "<pre class='blur debug'>";
	var_dump($saves);
	echo "</pre>";
}
?>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>