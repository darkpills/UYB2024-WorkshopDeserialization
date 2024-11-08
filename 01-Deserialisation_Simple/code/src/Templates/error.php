<?php 
$title="Shareplay";
?>

<?php ob_start(); ?>
<h1><?= $title ?></h1>
<p>An error occured : <?= $errorMessage ?></p>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php' ?>
