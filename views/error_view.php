<?php ob_start() ?>
    <title>Erreur</title>
    <meta name="description" content="Bibliothéque en ligne" />
<?php $css = ob_get_clean() ?>

<?php ob_start() ?>
<?= $msg; ?>
<?php $content = ob_get_clean() ?>

<?php include_once "layout.php" ?>
