<?php 
$title="Shareplay";
$subtitle="Easily share your game saves!";
require 'layout.php'; 
?>

<h1><?= $title ?></h1>
<h2 class="blinking"><?= $subtitle ?></h2>
<p><a href="index.php">Back to index</a></p>

<div class="container">
    <h3>Game save n°<?= $local_game_id ?></h3>
    <div class="retro-container">
            <pre>
<?php
ini_set('zend.exception_string_param_max_len', 100);
debug_print_backtrace();
unserialize($local_game);
debug_print_backtrace();
?>
            </pre>
    </div>
</div>