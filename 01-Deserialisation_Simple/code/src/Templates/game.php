<?php 
$title="Shareplay";
$subtitle="Easily share your game saves!";

$p = unserialize($save);
$challenge_complete = false;
?>

<?php ob_start(); ?>
<h1><?= $title ?></h1>
<h2 class="blinking"><?= $subtitle ?></h2>
<p><a href="index.php">Back to index</a></p>

<div class="container">
    <div class="retro-container">
    <h3>Player <?= $p->pseudo ?></h3>
        <pre>
<?php 
echo "Player life: " . $p->getLife() . "\n";
echo "Player magic: " . $p->getMagic() . "\n";
$p->getEquipment();
?>
        </pre>
    </div>
    <div class="retro-container">
        <h3>Boss fight</h3>
        <pre>
<?php
for ($i=0; $i < 10; $i++) { 
    $attack_dmg = random_int(11, 25);
    echo "The boss launch an attack for $attack_dmg damage!\n";
    $p->damage($attack_dmg);
    if ($p->isDead()) {
        echo "You're dead. Try harder!\n";
        $challenge_complete = !$challenge_complete;
        break;
    }
}
$challenge_complete = !$challenge_complete;
?>
        </pre>
<?php
if ($challenge_complete){
?>
<p><b>Congratulation</b>, you beat the mighty boss !</p>
<p>UYB2024PHP{Nothing_Is_Impossible}</p>
<?php
}
unset($p);
?>
    </div>
</div>
<audio controls autoplay style="display: none">
  <source src="audio/boss_battle.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio> 
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>